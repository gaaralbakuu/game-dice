<?php 
namespace Home\Controller;
use Think\Controller;

/**
	将本站作为接口程序和外部系统进行对接，通过POST方式进行访问
*/

class OutApiController extends CommonController{

	//构造方法
	function __construct(){
		//echo 'construct';
	}

	function api(){
		//echo "api";
		$return = $this->getReturn();
		header('Content-Type:application/json; charset=utf-8');

		//判断是否是POST请求
		if(!IS_POST){
			$return['status']['errorCode'] = -999;
			$return['status']['msg'] = '错误的请求方式';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

        if(!in_array(I("request_url"), C('ALLOWED_URL'))){
            $return['status']['errorCode'] = -998;
            $return['status']['msg'] = '该域名未被授权，请联系客服';
            echo json_encode($return,JSON_UNESCAPED_UNICODE);
            exit;
        }

        if(!in_array($_SERVER['REMOTE_ADDR'], C('ALLOWED_IP'))){
            $return['status']['errorCode'] = -998;
            $return['status']['msg'] = '该IP未被授权，请联系客服'.$_SERVER['REMOTE_ADDR'];
            echo json_encode($return,JSON_UNESCAPED_UNICODE);
            exit;
        }

		$post_data = $_POST;
		if($post_data['method'] == '' || $post_data['method'] == null){
			$return['status']['errorCode'] = -998;
			$return['status']['msg'] = '获取不到方法名';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		//$post_data['method'] = 'test';
		switch ($post_data['method']) {
			case 'register':
				$this->register($post_data);
				break;
			case 'login':
				$this->login($post_data);
				break;
			case 'balance':
				$this->balance($post_data);
				break;
			case 'deposit':
				$this->deposit($post_data);
				break;
			case 'withdrawal':
				$this->withdrawal($post_data);
				break;
			case 'betrecord':
				$this->betrecord($post_data);
				break;
			case 'test':
				$this->test($post_data);
				break;
			default:
				$return['status']['errorCode'] = -997;
				$return['status']['msg'] = '方法名不存在';
				echo json_encode($return,JSON_UNESCAPED_UNICODE);
				exit;
				break;
		}
	}

	//获取返回数组的格式
	function getReturn(){
		$return = array();
		$return['status']['errorCode'] = 0;
		$return['status']['msg'] = '';
		$return['data'] = '';
		return $return;
	}

	function login_get(){
		$username = I('username');
		$password = I('password');
		$isMobile = I('isMobile');
		$isMobile = ($isMobile == null || $isMobile == "")?"0":$isMobile;
        if(in_array($this->getUrlRoot($_SERVER['HTTP_REFERER']), C('ALLOWED_URL')))
            $this->login(array('username' => $username,'password' => $password,'isMobile' => $isMobile));
        else
            echo "该域名或IP未被授权，请联系客服!";
        exit;
    }

	//登录系统接口
	private function login($post_data){
		$return = $this->getReturn();	

		//获取登录参数
		$username = $post_data['username'];
		$password = $post_data['password'];
		$isMobile = $post_data['isMobile'];

		if($username == null || $password == null){
			$return['status']['errorCode'] = -1;
			$return['status']['msg'] = '帐号密码不能为空';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		$data = [];
		$data['username'] = $username;
		$data['password'] = $password;
		$data['loginip']  = get_client_ip();
		$data['source']   = 'ylc';

		
		$userinfo = M('Member')->field('id,loginip,logintime')->cache(300)->where("username='{$data['name']}'")->find();
		$apiparam=array();
		$apiparam['data'] = $data;
		$_api = new \Lib\api;
		$Result = [];
		$Result = $_api->sendHttpClient('Api/Member/signin',$apiparam);
        //$Result = $this->signin($apiparam);
		//登录成功
		if(is_array($Result) && $Result['sign']==true){


			if($Result['auth']['member_auth_id'] && $Result['auth']['member_sessionid']){
				session('member_sessionid',$Result['auth']['member_sessionid']);
				session('member_auth_id',$Result['auth']['member_auth_id']);
				$lastlogin['lastip'] = $userinfo['loginip'] ;
				$lastlogin['lasttime'] = date("Y-m-d H:i:s",$userinfo['logintime']) ;
				//$lastlogin['login_address'] =json_decode(getIpAddress($lastlogin['lastip']))->province.",".json_decode(getIpAddress($lastlogin['lastip']))->city;
				session('lastlogin',$lastlogin);


				if($isMobile == 0){
					$okamountcount = M('touzhu')->cache(300)->where("isdraw=1 AND uid='{$Result['auth']['member_auth_id']}' ")->SUM('okamount');
					$k3names = M('touzhu')->cache(300)->distinct ( true )->where ("uid='{$Result['auth']['member_auth_id']}' ")->field ( 'cptitle,cpname' )->limit(8)->select();
					session("okamountcount",$okamountcount);
					session("k3names",$k3names);
				}

			}

			$return['status']['errorCode'] = 0;
			$return['status']['msg'] = '登录成功';
			$return['data'] = 'http://'.$_SERVER['SERVER_NAME'].U('OutApi/login_get');
			echo json_encode($return,JSON_UNESCAPED_UNICODE);

			//print_r($post_data);exit;

			//跳转页面
			$this->redirect('Index/lottery');
			
			exit;
		}else{
			$return['status']['errorCode'] = -2;
			$return['status']['msg'] = '登录失败';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}
	}

	//注册
	private function register($post_data){
		$return =$this->getReturn();

		//检查参数
		$username = $post_data['username'];
		$password = $post_data['password'];
		if($username == null || $password == null){
			$return['status']['errorCode'] = -1;
			$return['status']['msg'] = '帐号密码不能为空';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		//检查用户名是否被注册过
		$apiparam=array();
		$Result=array();
		$apiparam['username'] = $username;
		$_api = new \Lib\api;
		$Result = $_api->sendHttpClient('Api/Member/checkuername',$apiparam);

		if($Result['data']['ishas']==1){
			$return['status']['errorCode'] = -2;
			$return['status']['msg'] = '用户名已经被注册，请联系管理员';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		$data = [];
		$data['username'] = $username;
		$data['password'] = $password;
		$data['regip']  = get_client_ip();
		$data['source']   = '接口注册';
		$data['face'] = "/resources/images/face/".rand(1,25).".jpg";
		$data['isnb'] = 0;
		$data['tradepassword'] = '123456';//资金密码默认123456
		$data['loginsource'] = 'ylc';
		$data['regtime'] = time();
		$apiparam=array();
		$apiparam['data'] = $data;
		$_api = new \Lib\api;
		$Result = $_api->sendHttpClient('Api/Member/registerapi',$apiparam);

		if(is_array($Result) && $Result['sign']==true && $Result['data']['regisok']==1){
			//保存登陆信息
			if($Result['auth']['member_auth_id'] && $Result['auth']['member_sessionid']){
				session('member_sessionid',$Result['auth']['member_sessionid']);
				session('member_auth_id',$Result['auth']['member_auth_id']);
				$return['islogin'] = '1';
			}

			//注册成功
			$return['status']['errorCode'] = 0;
			$return['status']['msg'] = '注册成功';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;

		}else{
			$return['status']['errorCode'] = -4;
			$return['status']['msg'] = $Result['message']?$Result['message']:'注册失败';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}
	}

	//余额查询接口
	private function balance($post_data){
		$return =$this->getReturn();

		//检查参数
		$username = $post_data['username'];
		$password = $post_data['password'];

		if($username == null || $password == null){
			$return['status']['errorCode'] = -1;
			$return['status']['msg'] = '请重新登录';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		$password = sys_md5($password);
		$userinfo = M('Member')->field('balance')->where("username='{$username}' and password='{$password}'")->find();

		if($userinfo == null){
			$return['status']['errorCode'] = -2;
			$return['status']['msg'] = '用户不存在';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		$return['status']['errorCode'] = 0;
		$return['status']['msg'] = '查询成功';
		$return['data']['Data'] = $userinfo['balance'];
		echo json_encode($return,JSON_UNESCAPED_UNICODE);
		exit;
	}

	//存款
	private function deposit($post_data){
		$return =$this->getReturn();

		$username = $post_data['username'];
		$password = $post_data['password'];
		$amount = $post_data['amount'];

		if(empty($username) || empty($password) || empty($amount) || !is_numeric($amount) || $amount < 0){
			$return['status']['errorCode'] = -1;
			$return['status']['msg'] = '参数错误';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		$password = sys_md5($password);
		$userInfo = M('Member')->field('id')->where("username='{$username}' and password='{$password}'")->find();
		if($userInfo == null){
			$return['status']['errorCode'] = -2;
			$return['status']['msg'] = '用户不存在';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		D("Transrecord")->startTrans();
		try{
			$data = array();
			$data['transType'] = "ylc";
			$data['transDes']= "娱乐城转入";
			$billno = time().mt_rand(1000,9999);
			$data['uid']=$userInfo['id'];
			$data['transBillno']=$billno;
			$data['tansAmount']=$amount;
			$data['state']=1;
			$data['transTime']=date("Y-m-d H:i:s");
			$flagA = D("Transrecord")->add($data);
			$flagB = D("Member")->where(array("id"=>$userInfo['id']))->setInc('balance',$amount);
			if($flagA && $flagB){
				D("Transrecord")->commit();
				$return['status']['errorCode'] = 0;
				$return['status']['msg'] = '转入游戏成功';
				echo json_encode($return,JSON_UNESCAPED_UNICODE);
			}else{
				D("Transrecord")->rollback();
				$return['status']['errorCode'] = -3;
				$return['status']['msg'] = '转入游戏失败';
				echo json_encode($return,JSON_UNESCAPED_UNICODE);
			}
			
		}catch(Exception $ex){
			D("Transrecord")->rollback();
			$return['status']['errorCode'] = -4;
			$return['status']['msg'] = '转入游戏失败';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}
	}

	//取款
	public function withdrawal($post_data){
		$return =$this->getReturn();

		$username = $post_data['username'];
		$password = $post_data['password'];
		$amount = $post_data['amount'];

		if(empty($username) || empty($password) || empty($amount) || !is_numeric($amount) || $amount < 0){
			$return['status']['errorCode'] = -1;
			$return['status']['msg'] = '参数错误';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		$password = sys_md5($password);
		$userInfo = M('Member')->field('id,balance')->where("username='{$username}' and password='{$password}'")->find();
		if($userInfo == null){
			$return['status']['errorCode'] = -2;
			$return['status']['msg'] = '用户不存在';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}

		if($userInfo['balance'] < $amount){
			$return['status']['errorCode'] = -5;
			$return['status']['msg'] = '余额不足';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}
		
		D("Transrecord")->startTrans();
		try{
			$data = array();
			$data['transType'] = "ylc";
			$data['transDes']= "娱乐城提款";
			$billno = time().mt_rand(1000,9999);
			$data['uid']=$userInfo['id'];
			$data['transBillno']=$billno;
			$data['tansAmount']=$amount;
			$data['state']=1;
			$data['transTime']=date("Y-m-d H:i:s");
			$flagA = D("Transrecord")->add($data);
			$flagB = D("Member")->where(array("id"=>$userInfo['id']))->setDec('balance',$amount);
			if($flagA && $flagB){
				D("Transrecord")->commit();
				$return['status']['errorCode'] = 0;
				$return['status']['msg'] = '转出游戏成功';
				echo json_encode($return,JSON_UNESCAPED_UNICODE);
			}else{
				D("Transrecord")->rollback();
				$return['status']['errorCode'] = -3;
				$return['status']['msg'] = '转出游戏失败';
				echo json_encode($return,JSON_UNESCAPED_UNICODE);
			}
			
		}catch(Exception $ex){
			D("Transrecord")->rollback();
			$return['status']['errorCode'] = -4;
			$return['status']['msg'] = '转出游戏失败';
			echo json_encode($return,JSON_UNESCAPED_UNICODE);
			exit;
		}
	}

	//游戏记录
	public function betrecord($post_data = null){
		$return =$this->getReturn();
		$return['data']['data'] = '';
		$return['data']["page"] = '';
		$return['data']["pageSize"] = '';//每页最多显示500条
		$return['data']["total_count"] = '';
		$return['data']["pageCount"] = '';
		
		
		//$post_data = $_GET;

		$StartTime = $post_data['start_at'];
		$EndTime = $post_data['end_at'];
		$atime = $post_data['atime']; //1:当天，2：昨天，3：一周
		$a_item = $post_data['a_item']; // 2：赢，3：输，4：未开奖
		$expect = $post_data['expert']; //期号
		$page = empty($post_data['page'])?1:$post_data['page'];
        $limit = 500;

		$map = array();
		if($expect) $map['expect']=array('eq',$expect);
		switch ($atime)
		{
			case '1' ;
				$StartTime = date('Y-m-d 00:00:00');
				$EndTime   = date('Y-m-d H:i:s') ;
				break;
			case '2' ;
				$time=time ()- ( 1  *  24  *  60  *  60 );
				$day = date("Y-m-d",$time);
				$StartTime = date($day.' 00:00:00');
				$EndTime   = date($day.' 23:59:59');
                $map['cpname'][] = array('in',['fc3d','pl3']);
				break;
			case '3' ;
				$time=time ()- ( 2  *  24  *  60  *  60 );
				$day = date("Y-m-d",$time);
				$StartTime = date($day.' 00:00:00');
				$EndTime   = date('Y-m-d H:i:s');
				$map['cpname'] = 'lhc';
				break;
		}
		if($StartTime && $EndTime)
		{
			$map['oddtime'][]=array('egt',strtotime($StartTime));
			$map['oddtime'][]=array('elt',strtotime($EndTime));

		}elseif(!$StartTime && $EndTime){
			$map['oddtime'][]=array('elt',strtotime($EndTime));
		}

		switch($a_item)
		{
			case'2';
				$map['isdraw']=array('eq',1);
				break;
			case'3';
				$map['isdraw']=array('eq',-1);
				break;
			case'4';
				$map['isdraw']=array('eq',0);
				break;
		}

		$touzhu = M('touzhu');

		$count      = $touzhu->where($map)->count();
		$tzlist     = $touzhu->where($map)->order("oddtime desc")->limit($limit)->page($page)->select();

		//print_r($touzhu);

		//header('Content-Type:application/json; charset=utf-8');
		//echo json_encode($tzlist,JSON_UNESCAPED_UNICODE);
		$return['data']['data'] = $tzlist;
		$return['data']['count'] = $count;
		$return['data']['start_at'] =$StartTime;
		$return['data']['end_at'] =$EndTime;
		echo json_encode($return,JSON_UNESCAPED_UNICODE);
	}

	function test($data = ''){
		$username = I('username');
		$password = I('password');
		$password = sys_md5($password);
		//$userinfo = M('Member')->field('balance')->where("username='{$username}' and password='{$password}'")->find();
		//echo U('Mobile/Index/');
		//print_r($userinfo);
		//print_r(C('APP_SUB_DOMAIN_RULES'));

		//$str ="0";
		//echo empty($str);
		//A('Member/testm');
		//$test = A("Member");
		//$test->testm();
		//echo $this->getMobileUrl();
		//$time = '1538644039';
		//echo date('Y-m-d H:i:s',$time);
		$str = "49,35,39,44,10,2,8";
		$arr = split(',', $str);
		//print_r($arr);
		foreach ($arr as $key => $value) {
			if(strlen($value) == 1){
				$arr[$key] = "0".$value;
			}
		}
		echo join(',', $arr);
	}

    /**
     * TGPAY支付成功的回调接口
     */
    function tgpay_callback(){
        header('Content-type: application/json');
        if(!IS_POST){
            echo 'error request';exit;
        }

        $data = $_POST;
        //print_r($data);
        if(count($data) == 0){
            echo 'error';exit;
        }

        //获取商户号配置信息
        //$sys = ['third_userkey' => 'B4073DF595ED2B','third_userid' => '10360'];
        $tgpay_config = $this->getTGPayConfig();
        //验证参数
        if($data['account_key'] != $tgpay_config['third_userkey']){
            echo 'error account key';
            exit;
        }

        $tgpay = new \Lib\TGPay($tgpay_config);

        //验证签名
        if($data['sign'] != $tgpay->sign($tgpay->Key,$data)){
            echo 'error sign';
            exit;
        }

        //验证通过后，修改数据库，返回success
        //$recharge = M('recharge')->where('trano="'.$data["out_trade_no"].'" and state = 0')->find();
        $recharge = M('recharge')->where([
            'trano' => $data['out_trade_no'],
            'state' => 0
        ])->find();
        if($recharge){
            if($data['status'] == 'success'){
                $returnint = userrechargepay($recharge);
                if($returnint==0){ echo 'error parameter';exit;}
                else if($returnint == 1){
                    echo 'success';
                }
            }else{
                //充值失败
                $recharge->setField([
                    'state' => '-1',
                ]);
                echo 'success';
            }
        }else{
            echo 'error trano';exit;
        }
    }

    function tgpay_error(){
        echo 'error';
    }

    //获取TGPay的配置信息
    private function getTGPayConfig(){
        $result = M('payset')->where([
            'paytype' => 'tg_pay',
            'state' => '1'
        ])->find();
        if($result){
            $return = unserialize($result['configs']);
            $return['third_userkey'] = $return['merchantkey1'];
            $return['third_userid'] = $return['merchantid'];
            return $return;
        }
    }

    //获取TGPay的支付类型
    private function getTGPayType(){
        $result = $this->getTGPayConfig();
        if($result) return $result['tgpay_type'];
    }

    public function ceshi(){
        header('Content-Type:application/json; charset=utf-8');
        $cplist = M('caipiao')->where("isopen=1")->cache('index_cplist',300)->order('allsort asc,id desc')->select();
        print_r($cplist);
    }

    public function getDownUser($arr = []){
        //echo 'paramter:'.json_encode($arr).'<br>';
        //header('Content-Type:application/json; charset=utf-8');
        $map['parentid'] = ['in',$arr['not_proxy']];
        $map['isnb'] = ['eq',0];
        $map['proxy'] = ['eq',0];//先获取会员的数量
        $down = M('member')->where($map)->order('id desc')->field('id')->select();
        //echo 'search option'.json_encode($map).',now proxy member:'.json_encode($down).'<br>';

        //如果当前 代理组 的下级会员存在，则添加到 arr['member']
        if(count($down) > 0){
            //将二位数组转换为一维数组
            $down_id = i_array_column($down, 'id');
            $arr['member'] = $this->array_add($arr['member'],$down_id);
        }

        $map['proxy'] = ['eq','1'];
        $proxy = M('member')->where($map)->order('id desc')->field('id')->select();
        //echo 'search option'.json_encode($map).',now proxy proxy:'.json_encode($proxy).'<br>';
        if(count($proxy) == 0){
            //echo 'only once'.json_encode($arr['not_proxy']);
            //目前 代理列表的下级 没有代理，结束递归
            $arr['have_proxy'] = $this->array_add($arr['have_proxy'],$arr['not_proxy']);

            $arr['not_proxy'] = [];
            return $arr;
        }else{
            //将二位数组转换为一维数组
            $proxy_id = i_array_column($proxy, 'id');
            //echo 'proxy id arr:'.json_encode($proxy_id).'<br>';
            //将 本次的代理列表数组放进已处理的数组中
            $arr['have_proxy'] = $this->array_add($arr['have_proxy'],$arr['not_proxy']);

            //将 本次的代理列表的下级代理 放进待处理的数组中
            $arr['not_proxy'] = $proxy_id;
            return $this->getDownUser($arr);//继续进行递归
        }
    }

    /**
     * 合并两个数组
     * @param array $arr 原数组，可能为空
     * @param $addarr 待添加的数组
     * @return array
     */
    public function array_add($arr = [],$addarr){
        if(is_array($addarr)){
            if(count($arr) == 0) $arr = $addarr;
            else $arr = array_merge($arr,$addarr);
        }else{
            array_push($arr,$addarr);
        }
        return $arr;
    }

    public function test2(){
        //echo '123';
        $arr = [
            'have_proxy' => [],
            'not_proxy' => ['9156'],
            'member' => []
        ];
        $down_arr = $this->getDownUser($arr);
        $down_id = $this->array_add($down_arr['have_proxy'],$down_arr['member']);
        print_r($down_id);
    }

    public $_ids;

    function getdlxxid($map){
        $list = M('Member')->where($map)->field('id,username')->order('id ASC')->select();
        foreach ($list as $k=>$v){
            $map['parentid'] = ['eq',$v['id']];
            $this->getdlxxid($map);
            $this->_ids[] = $v;
        }
    }

    public function test3(){
        header('Content-Type:application/json; charset=utf-8');
        $typeid = 'ssc';
        $_wfobj = new \Lib\wanfa;
        $rates = $_wfobj->getplayers($typeid);
        //print_r($rates);
        $this->writelog('测试log');
    }

    function writelog($str){
    $file = fopen(dirname(__FILE__)."/log.txt","a");
    fwrite($file,date('Y-m-d H:i:s')."   ".$str."\r\n");
    fclose($file);
    //print_r($str.'<br/><br/>');
}
}

 ?>