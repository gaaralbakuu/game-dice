<?php
namespace Mobile\Controller;
use Think\Controller;
class GameController extends CommonController {
	// ------------------------------------------chat start

     public function index()
    {
        //获取聊天室公告
        // $chat_notice = Cache::get('chat_notice');
        // if (!$chat_notice) {
        //     $chat_notice = Db::name('notice')->where(['type' => 3])->limit(3)->order('id desc')->select();
        //     if ($chat_notice) {
        //         Cache::set('chat_notice', $chat_notice, 600);
        //     }
        // }
        // $user = Db::name('member')->where(['id' => session('member_info.uid')])->find();
     
        $user['chat']=1;
        //获取聊天记录
        $chatList=$this->getChatList();
        //获取用户vio等级
        return view('', [
            'chat_list'=>$chatList,
            'info' => $user,
            'chat_notice' => $chat_notice
        ]);
    }

   //获取聊天消息
     public function getChatList(){
        $list=M('chat_list')->alias('c')->order('id desc')->limit(5)->select();
        sort($list);
        foreach ($list as $k=>&$v){
            //设置样式class和等级标签
            $v['style']='background: linear-gradient(to right, rgb(25, 158, 216), rgb(25, 158, 216)); border-left-color: rgb(25, 158, 216); border-right-color: rgb(25, 158, 216); color: rgb(255, 255, 255);';
            switch ((int)$v['level']){
                case 1:
                    $v['level_img']='/resources/images/chat/vip1.png';
                    break;
                case 2:
                    $v['level_img']='/resources/images/chat/vip2.png';
                    break;
                case 3:
                    $v['level_img']='/resources/images/chat/vip3.png';
                    break;
                case 4:
                    $v['level_img']='/resources/images/chat/vip4.png';
                    break;
                    case 5:
                    $v['level_img']='/resources/images/chat/vip5.png';
                    break;
                default:
                    $v['level_img']='/resources/images/chat/vip6.png';
                   
            }
            //替换时间
            $v['create_at']=date('H:i:s',$v['create_at']);
            //替换内容
            if($v['type']==1){
                $v['content']=preg_replace('/\[(\w+)\]/','<i class="Emoji emoji-$1"></i>',$v['content']);
            }
            if($v['type']==2){
                $v['content']=preg_replace('/\{img\}(.*?)\{\/img\}/','<img src="$1">',$v['content']);
            }
            //设置左右位置class
            if($v['name']==$this->userinfo['username']){
                $v['class']='type-right';
            }else{
                $v['class']='type-left';
            }


        }
            $this->assign('chat_list', $list);
        // return  array_reverse($list);
    }
    /** 获取用户等级和是否能聊天
     * @param $money
     */

    /**
     * @param Request $request
     */
    public function uploadImg(Request $request)
    {
        if ($request->isPost()) {
            $returnData['code'] = 0;
            //1表示上传头像只要不是游客都可以上传
            //2表示是聊天图片要判断用户是否又上传权力

            if (!isset($_FILES['file'])) {

                $returnData['msg'] = '错误的数据格式';
                return json($returnData);
            }
            $type = $request->post('type') == '1' ? 1 : 2;
            $checkauth = $this->checkauth($type);
            if ($checkauth['type'] == false) {
                $returnData['msg'] = $checkauth['msg'];
                return json($returnData);
            }
            //验证图片格式
            $checkimg = $this->checkimg($_FILES['file']);
            if(!$checkimg['type']){
                $returnData['msg'] = $checkimg['msg'];
                return json($returnData);
            }

            if($type==2){
                $patype='chat';
            }else{
                $patype='head';
            }
            $path ="../public/uploads/".$patype;
            if(!is_dir($path)) mkdir($path,0777);
            if(!is_dir($path)){
                $returnData['msg'] = '创建文件失败，请联系管理员设置权限';
                return json($returnData);
            }
            $path.='/'.date('Ymd');
            if(!is_dir($path)) mkdir($path,0777);
            if(!is_dir($path)){
                $returnData['msg'] = '创建文件失败，请联系管理员设置权限';
                return json($returnData);
            }
            $returnPase='/uploads/'.$patype.'/'.date('Ymd');

            $filename='/'.time().rand(10,99).'.'.$checkimg['img'];
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            $removeInfo=$path.$filename;
            $add= move_uploaded_file($_FILES['file']["tmp_name"],$removeInfo);
            if(!$add){
                $returnData['msg'] = '图片上传失败请刷新重试';
                return json($returnData);
            }
            //修改用户图片
            $update=Db::name('member')->where(['id'=>$this->uid])->update(['head'=>$returnPase.$filename]);
            if($update!==false){
                $returnData['code'] = 1;
                $returnData['msg'] = '修改成功';
                $returnData['data']=$returnPase.$filename;
                return json($returnData);
            }else {
                $returnData['msg'] = '图片上传失败请刷新重试';
                return json($returnData);
            }
        };
        $this->error('你要的页面不存在', url('Index/index'));
    }

    /**验证用户是否有权利上传图片
     * @param $type
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    private function checkauth($type)
    {
        $return['type'] = false;
        $return['msg'] = '';
        $uid = $this->uid;
        $user = Db::name('member')->where(['id' => $uid])->find();
        if (!$user) {
            $return['msg'] = '用户不存在异常';
            return $return;
        }
        //游客
        if ($user['is_temporary'] == 1) {
            $return['msg'] = '游客不能上传图片，请注册用户';
            return $return;
        }
        /*//判断如果是上传聊天记录判断用户充值是否大于500
        if ($user['total_recharge'] < 500 && $type == 2) {
            $return['msg'] = '充值少于500不上';
            return $return;
        }*/
        $return['type'] = true;
        return $return;
    }
    //验证图片格式
    private function checkimg($info)
    {
        $return['type'] = false;
        $return['msg'] = '';
        $type=$this->getImagetype($info['tmp_name']);
        if(!$type){
            $return['msg']='图片格式不正确';
            return $return;
        }
        $return['type']=true;
        $return['img']=$type;
        return $return;

        //getimagesize
    }

    //*判断图片上传格式是否为图片 return返回文件后缀
    public function getImagetype($filename)
    {
        $file = fopen($filename, 'rb');
        $bin = fread($file, 2); //只读2字节
        fclose($file);
        $strInfo = @unpack('C2chars', $bin);
        $typeCode = intval($strInfo['chars1'] . $strInfo['chars2']);
        // dd($typeCode);
        $fileType = '';
        switch ($typeCode) {
            case 255216:
                $fileType = 'jpg';
                break;
            case 7173:
                $fileType = 'gif';
                break;
            case 6677:
                $fileType = 'bmp';
                break;
            case 13780:
                $fileType = 'png';
                break;
            default:
                $fileType = 'false';
        }
        return $fileType;
    }

    /**
     * 添加聊天记录
     */
    public function add_chat(){

        if(IS_POST){
            $returnData['code'] = 0;
            $returnData['msg'] = '数据格式错误';

            $data=$_POST;
            $inster['content']=htmlentities((string)trim($data['content']));
            $inster['type']=(int)$data['type'];
            $inster['uid']="1";
            $inster['create_at']=time();
            if($inster['content']==''){
                return json_encode($returnData);
            };
            if($inster['type']!=1&&$inster['type']!=2){
                return json_encode($returnData);
            }


            $inster['name']=$this->userinfo['username'];
            $inster['level']=$this->userinfo['groupid'];
            $inster['head']=$this->userinfo['face'];

            $res = M('chat_list')->data($inster)->add();
            $returnData['code'] = 1;
            $returnData['msg'] = '成功';
            return json_encode($returnData);
        }else{
            $this->error('你要访问的页面不存在');
        }
    }
// ------------------------------------------chat end    
	public function __construct(){
		parent::__construct();
		if(!$this->userinfo){

/*			if(IS_AJAX){
				$apiparam['sign'] = 'fase';
				$apiparam['message'] = '请登录';
				$this->ajaxReturn($apiparam);
			}else{*/
				redirect(U("Public/login"));
//			}
		};
         $is_chat = M('setting')->where(['name'=>"is_chat"])->find();
        $this->assign('is_chat',$is_chat['value']);
        $is_chat = M('setting')->where(['name'=>"is_video"])->find();
        $this->assign('is_video',$is_chat['value']);

         $chat_filter = M('setting')->where(['name'=>"chat_filter"])->find();
        $this->assign('chat_filter',$chat_filter['value']);
        
		$this->assign('username',$this->userinfo['username']);
		$this->assign('face',$this->userinfo['face']);
        $this->assign('level',$this->userinfo['groupid']);
        $res = M('gonggao')->find();
        $this->assign('notice',$res['title']);
		$chatList=$this->getChatList();
	}
//k3
	function k3(){
		$lotteryname = I('code');
		$this->assign('lotteryname',$lotteryname);
		$_k3list = C('cplist.k3');
		foreach($_k3list as $k=>$v){
			if($v['isopen']==0)unset($_k3list[$k]);
		}
		$this->assign('k3list',$_k3list);
		if($lotteryname && $_k3list[$lotteryname]){
			$nowcpinfo = $_k3list[$lotteryname];
		}else{
			$nowcpinfo = current($_k3list);
		}
		$this->assign('nowcpinfo',$nowcpinfo);
		//赔率
		$rates = C('rates_k3');

		$peilv = [];
		foreach($rates as $k=>$v){
			$peilv[$v['playid']] = $v['rate'];
		}
		 $max = array_search(max($peilv),$peilv);
		 $mix = array_search(min($peilv),$peilv);

		$this->assign('maxPeilv',$peilv[$max]);
		$this->assign('minPeilv',$peilv[$mix]);
		$this->assign('peilv',$peilv);


		$typeid = 'k3';
		$Result = S('lotteryrates_'.$typeid);
		if(!$Result){
			$apiparam=array();
			$apiparam['typeid'] = $typeid;
			$_api = new \Lib\api;
			$Result = $_api->sendHttpClient('Api/Lottery/lotteryrates',$apiparam);
			$sid = S('lotteryrates_'.$typeid,$Result,300);
		}
        $open = C('agent_commission_open');
		if($Result['data']){
			$sessionid     = session('member_sessionid');
			$auth_id       = session('member_auth_id');
			$userinfo=session('userinfo');
			if($sessionid && $auth_id && $userinfo && $userinfo['groupid']){//未登陆以玩法设置
				$membergroups = C('membergroups');
				$groupinfo = $membergroups[$userinfo['groupid']];
				if($groupinfo)foreach($Result['data'] as $k0=>$v0){
					$Result['data'][$v0['playid']]['minxf'] = $groupinfo['min_'.$v0['playid']]?$groupinfo['min_'.$v0['playid']]:($Result['data'][$v0['playid']]['minxf']?$Result['data'][$v0['playid']]['minxf']:0);
					$Result['data'][$v0['playid']]['maxxf'] = $groupinfo['max_'.$v0['playid']]?$groupinfo['max_'.$v0['playid']]:($Result['data'][$v0['playid']]['maxxf']?$Result['data'][$v0['playid']]['maxxf']:0);
                    if($open){
                        $rate =$v0['rate'] - $v0['rate']*(GetVar('fanDianMax')-$userinfo['fandian'])/100;
                        $Result['data'][$v0['playid']]['rate'] = sprintf("%.2f",$rate);
                    }
				}
			}
			$Result['rates'] = $Result['data'];
			unset($Result['data']);
		}
		$this->assign('cptitle',$_k3list[$lotteryname]['title']);
		$this->assign('rates',$Result);
		$this->display();
	}
//SSC
	function ssc(){
		$lotteryname = I('code');
		$this->assign('lotteryname',$lotteryname);
		$_ssclist = C('cplist.ssc');
		foreach($_ssclist as $k=>$v){
			if($v['isopen']==0)unset($_ssclist[$k]);
		}
		$this->assign('ssclist',$_ssclist);
		$this->assign('nowcpinfo',$_ssclist[$lotteryname]);

		$typeid = 'ssc';
		$Result = S('lotteryrates_'.$typeid);
		if(!$Result){
			$apiparam=array();
			$apiparam['typeid'] = $typeid;
			$_api = new \Lib\api;
			$Result = $_api->sendHttpClient('Api/Lottery/lotteryrates',$apiparam);
			$sid = S('lotteryrates_'.$typeid,$Result,300);
		}
		$Result = $this->userjj($Result);
		$this->assign('cptitle',$_ssclist[$lotteryname]['title']);
		$this->assign('rates',$Result);
		$this->display("Game_ssc");
	}
	//pk10
	function pk10(){
		$lotteryname = I('code');
		$this->assign('lotteryname',$lotteryname);
		$_ssclist = C('cplist.pk10');
		foreach($_ssclist as $k=>$v){
			if($v['isopen']==0)unset($_ssclist[$k]);
		}
		$this->assign('ssclist',$_ssclist);
		$this->assign('nowcpinfo',$_ssclist[$lotteryname]);

		$typeid = 'pk10';
		$Result = S('lotteryrates_'.$typeid);
		if(!$Result){
			$apiparam=array();
			$apiparam['typeid'] = $typeid;
			$_api = new \Lib\api;
			$Result = $_api->sendHttpClient('Api/Lottery/lotteryrates',$apiparam);
			$sid = S('lotteryrates_'.$typeid,$Result,300);
		}
		$Result = $this->userjj($Result);
		$this->assign('cptitle',$_ssclist[$lotteryname]['title']);
		$this->assign('rates',$Result);
		$this->display("Game_pk10");
	}
	//kl8
	function keno(){
		$lotteryname = I('code');
		$this->assign('lotteryname',$lotteryname);
		$_ssclist = C('cplist.keno');
		foreach($_ssclist as $k=>$v){
			if($v['isopen']==0)unset($_ssclist[$k]);
		}
		$this->assign('ssclist',$_ssclist);
		$this->assign('nowcpinfo',$_ssclist[$lotteryname]);
		$typeid = 'keno';
		$Result = S('lotteryrates_'.$typeid);
		if(!$Result){
			$apiparam=array();
			$apiparam['typeid'] = $typeid;
			$_api = new \Lib\api;
			$Result = $_api->sendHttpClient('Api/Lottery/lotteryrates',$apiparam);
			$sid = S('lotteryrates_'.$typeid,$Result,300);
		}
		$Result = $this->userjj($Result);
		$this->assign('cptitle',$_ssclist[$lotteryname]['title']);
		$this->assign('rates',$Result);
		$this->display("Game_keno");
	}
	//x5
	function x5(){
		$lotteryname = I('code');
		$this->assign('lotteryname');
		$_ssclist = C('cplist.x5');
		foreach($_ssclist as $k=>$v){
			if($v['isopen']==0)unset($_ssclist[$k]);
		}
		$this->assign('ssclist',$_ssclist);
		$this->assign('nowcpinfo',$_ssclist[$lotteryname]);

		$typeid = 'x5';
		$Result = S('lotteryrates_'.$typeid);
		if(!$Result){
			$apiparam=array();
			$apiparam['typeid'] = $typeid;
			$_api = new \Lib\api;
			$Result = $_api->sendHttpClient('Api/Lottery/lotteryrates',$apiparam);
			$sid = S('lotteryrates_'.$typeid,$Result,300);
		}
		$Result = $this->userjj($Result);
		$this->assign('cptitle',$_ssclist[$lotteryname]['title']);
		$this->assign('rates',$Result);
		$this->display("Game_x5");
	}
	//fc3d/pl3
	function dpc(){
		$lotteryname = I('code');
		$this->assign('lotteryname',$lotteryname);
		$_ssclist = C('cplist.dpc');
		foreach($_ssclist as $k=>$v){
			if($v['isopen']==0)unset($_ssclist[$k]);
		}
		$this->assign('ssclist',$_ssclist);
		$this->assign('nowcpinfo',$_ssclist[$lotteryname]);

		$typeid = 'dpc';
		$Result = S('lotteryrates_'.$typeid);
		if(!$Result){
			$apiparam=array();
			$apiparam['typeid'] = $typeid;
			$_api = new \Lib\api;
			$Result = $_api->sendHttpClient('Api/Lottery/lotteryrates',$apiparam);
			$sid = S('lotteryrates_'.$typeid,$Result,300);
		}
		$Result = $this->userjj($Result);
		$this->assign('rates',$Result);
		$this->assign('cptitle',$_ssclist[$lotteryname]['title']);
		$this->display("Game_fc3d");
	}


	//六合彩
	function lhc(){
		$lotteryname = I('code');
		$this->assign('lotteryname',$lotteryname);
		$_lhclist = C('cplist.lhc');
		foreach($_lhclist as $k=>$v){
			if($v['isopen']==0)unset($_lhclist[$k]);
		}
		$this->assign('ssclist',$_lhclist);
		if($lotteryname && $_lhclist[$lotteryname]){
			$nowcpinfo = $_lhclist[$lotteryname];
		}else{
			$nowcpinfo = current($_lhclist);
		}
		$this->assign('nowcpinfo',$nowcpinfo);
		//赔率
		$rates = C('rates_lhc');

		$peilv = [];
		foreach($rates as $k=>$v){
			$peilv[$v['playid']] = $v['rate'];
		}
		$max = array_search(max($peilv),$peilv);
		$mix = array_search(min($peilv),$peilv);

		$this->assign('maxPeilv',$peilv[$max]);
		$this->assign('minPeilv',$peilv[$mix]);
		$this->assign('peilv',$peilv);


		$typeid = 'lhc';
		$Result = S('lotteryrates_'.$typeid);
		if(!$Result){
			$apiparam=array();
			$apiparam['typeid'] = $typeid;
			$_api = new \Lib\api;
			$Result = $_api->sendHttpClient('Api/Lottery/lotteryrates',$apiparam);
			$sid = S('lotteryrates_'.$typeid,$Result,300);
		}
        $open = C('agent_commission_open');
		if($Result['data']){
			$sessionid     = session('member_sessionid');
			$auth_id       = session('member_auth_id');
			$userinfo=session('userinfo');
			if($sessionid && $auth_id && $userinfo && $userinfo['groupid']){//未登陆以玩法设置
				$membergroups = C('membergroups');
				$groupinfo = $membergroups[$userinfo['groupid']];
				if($groupinfo)foreach($Result['data'] as $k0=>$v0){
					$Result['data'][$v0['playid']]['minxf'] = $groupinfo['min_'.$v0['playid']]?$groupinfo['min_'.$v0['playid']]:($Result['data'][$v0['playid']]['minxf']?$Result['data'][$v0['playid']]['minxf']:0);
					$Result['data'][$v0['playid']]['maxxf'] = $groupinfo['max_'.$v0['playid']]?$groupinfo['max_'.$v0['playid']]:($Result['data'][$v0['playid']]['maxxf']?$Result['data'][$v0['playid']]['maxxf']:0);
                    if($open){
                        $rate =$v0['rate'] - $v0['rate']*(GetVar('fanDianMax')-$userinfo['fandian'])/100;
                        $Result['data'][$v0['playid']]['rate'] = sprintf("%.2f",$rate);
                    }
				}
			}
			$Result['rates'] = $Result['data'];
			unset($Result['data']);
		}
		$this->assign('rates',$Result);
		$this->assign('cptitle',$_lhclist[$lotteryname]['title']);
		$this->display();
	}
	// 计算用户奖金
	function userjj($Result){
		if($Result){
			$sessionid     = session('member_sessionid');
			$auth_id       = session('member_auth_id');
			$userinfo=session('userinfo');
			if($sessionid && $auth_id && $userinfo && $userinfo['groupid']){//未登陆以玩法设置
				$membergroups = C('membergroups');
				$groupinfo = $membergroups[$userinfo['groupid']];
				if($groupinfo)
					foreach($Result['data'] as $k0=>$v0){
						//	(最高奖金-最低奖金)/(最高返点)  X  (会员返点)+最低奖金
						if($userinfo['fandian']){
							if(strstr($v0['maxjj'],'|')){
								$v01 = explode('|',$v0['maxjj']);
								$v02 = explode('|',$v0['minjj']);
								$maxjjstr="";
								foreach($v01 as $j=>$v){
									$maxstr = ((($v01[$j]-$v02[$j])/GetVar('fanDianMax'))* $userinfo['fandian']+$v02[$j]).'|';
									$maxjjstr .= sprintf("%.2f", filter_money($maxstr,2)).'|';
								}
								$Result['data'][$v0['playid']]['maxjj'] = substr($maxjjstr,0,-1) ;
							}else{
								$maxjj = ($Result['data'][$v0['playid']]['maxjj']-$Result['data'][$v0['playid']]['minjj'])/(GetVar('fanDianMax'))*($userinfo['fandian'])+$Result['data'][$v0['playid']]['minjj'];
								if(substr(explode('.',$maxjj)[1],0,2)=='99'){
									$Result['data'][$v0['playid']]['maxjj']=sprintf("%.2f", ceil($maxjj));
								}else{
									$Result['data'][$v0['playid']]['maxjj'] =sprintf("%.2f", filter_money($maxjj,2));
								}
							}
						}
						$Result['data'][$v0['playid']]['minxf'] = $groupinfo['min_'.$v0['playid']]?$groupinfo['min_'.$v0['playid']]:($Result['data'][$v0['playid']]['minxf']?$Result['data'][$v0['playid']]['minxf']:0);
						$Result['data'][$v0['playid']]['maxxf'] = $groupinfo['max_'.$v0['playid']]?$groupinfo['max_'.$v0['playid']]:($Result['data'][$v0['playid']]['maxxf']?$Result['data'][$v0['playid']]['maxxf']:0);
					}
			}
			$Result['rates'] = $Result['data'];

			unset($Result['data']);
			return $Result;
		}
	}

	function trend(){
		$lotteryname = I('code','jsk3');
		$this->assign('lotteryname',$lotteryname);
		$num = I('num',30,'intval');
		$_api = new \Lib\api;
		$apiparam['lotteryname'] = $lotteryname;
		$apiparam['num'] = $num;
		$Result = $_api->sendHttpClient('Api/Lottery/lotteryopencodes',$apiparam);
		$html = '';$allballs = [1,2,3,4,5,6];
		if($Result['sign'] && count($Result['data'])>=1){
			foreach($Result['data'] as $k=>$v){
				$balls = explode(',',$v['opencode']);
				$countarray = array_count_values($balls);
				$sum   = 0;$sum = array_sum($balls);
				$bigsmall = $sum>10?'大':'小';
				$oddeven  = $sum%2==0?'双':'单';
				$html .= '<tr class="text-c">';
				$html .= '<td height="40">'.$v['expect'].'</td>';
				$html .= '<td class="c_ba2636"><b>'.$balls[0].'</b></td>';
				$html .= '<td class="c_ba2636"><b>'.$balls[1].'</b></td>';
				$html .= '<td class="c_ba2636"><b>'.$balls[2].'</b></td>';
				if(in_array(1,$balls)){
					if($countarray[1]==2)
						$html .= '<td class="ball_red"><div class="s_ball">2</div><i>1</i></td>';
					else
						$html .= '<td class="ball_red">1</td>';
				}else{
					$html .= '<td class="f_green">1</td>';
				}
				if(in_array(2,$balls)){
					if($countarray[1]==2)
						$html .= '<td class="ball_red"><div class="s_ball">2</div><i>2</i></td>';
					else
						$html .= '<td class="ball_red">2</td>';
				}else{
					$html .= '<td class="f_green">2</td>';
				}
				if(in_array(3,$balls)){
					if($countarray[1]==2)
						$html .= '<td class="ball_red"><div class="s_ball">2</div><i>3</i></td>';
					else
						$html .= '<td class="ball_red">3</td>';
				}else{
					$html .= '<td class="f_green">3</td>';
				}
				if(in_array(4,$balls)){
					if($countarray[1]==2)
						$html .= '<td class="ball_red"><div class="s_ball">2</div><i>4</i></td>';
					else
						$html .= '<td class="ball_red">4</td>';
				}else{
					$html .= '<td class="f_green">4</td>';
				}
				if(in_array(5,$balls)){
					if($countarray[1]==2)
						$html .= '<td class="ball_red"><div class="s_ball">2</div><i>5</i></td>';
					else
						$html .= '<td class="ball_red">5</td>';
				}else{
					$html .= '<td class="f_green">5</td>';
				}
				if(in_array(6,$balls)){
					if($countarray[1]==2)
						$html .= '<td class="ball_red"><div class="s_ball">2</div><i>6</i></td>';
					else
						$html .= '<td class="ball_red">6</td>';
				}else{
					$html .= '<td class="f_green">6</td>';
				}
				/*$html .= '<td class="f_green">1</td>';
				$html .= '<td class="ball_red"><div class="s_ball">2</div><i>5</i></td>';
				$html .= '<td class="bg_green js-fold">3</td>';
				$html .= '<td class="f_green">4</td>';
				$html .= '<td class="f_green">5</td>';
				$html .= '<td class="f_green">6</td>';*/
				if($bigsmall=='大'){
					$html .= '<td class="bg_orange js-fold">大</td>';
					$html .= '<td class="f_brown">小</td>';
				}else{
					$html .= '<td class="f_brown">大</td>';
					$html .= '<td class="bg_orange js-fold">小</td>';
				}
				if($oddeven=='双'){
					$html .= '<td class="bg_orange js-fold">双</td>';
					$html .= '<td class="f_brown">单</td>';
				}else{
					$html .= '<td class="f_brown">双</td>';
					$html .= '<td class="bg_orange js-fold">单</td>';
				}
				$class = 'f_green js-omit-m';
				$class = 'f_green js-omit-m';
				if($sum==3){$class3 = 'bg_green js-fold';}else{$class3 = $class;}
				if($sum==4){$class4 = 'bg_green js-fold';}else{$class4 = $class;}
				if($sum==5){$class5 = 'bg_green js-fold';}else{$class5 = $class;}
				if($sum==6){$class6 = 'bg_green js-fold';}else{$class6 = $class;}
				if($sum==7){$class7 = 'bg_green js-fold';}else{$class7 = $class;}
				if($sum==8){$class8 = 'bg_green js-fold';}else{$class8 = $class;}
				if($sum==9){$class9 = 'bg_green js-fold';}else{$class9 = $class;}
				if($sum==10){$class10 = 'bg_green js-fold';}else{$class10 = $class;}
				if($sum==11){$class11 = 'bg_green js-fold';}else{$class11 = $class;}
				if($sum==12){$class12 = 'bg_green js-fold';}else{$class12 = $class;}
				if($sum==13){$class13 = 'bg_green js-fold';}else{$class13 = $class;}
				if($sum==14){$class14 = 'bg_green js-fold';}else{$class14 = $class;}
				if($sum==15){$class15 = 'bg_green js-fold';}else{$class15 = $class;}
				if($sum==16){$class16 = 'bg_green js-fold';}else{$class16 = $class;}
				if($sum==17){$class17 = 'bg_green js-fold';}else{$class17 = $class;}
				if($sum==18){$class18 = 'bg_green js-fold';}else{$class18 = $class;}
					
				$html .= '<td class="'.$class3.'">3</td>';
				$html .= '<td class="'.$class4.'">4</td>';
				$html .= '<td class="'.$class5.'">5</td>';
				$html .= '<td class="'.$class6.'">6</td>';
				$html .= '<td class="'.$class7.'">7</td>';
				$html .= '<td class="'.$class8.'">8</td>';
				$html .= '<td class="'.$class9.'">9</td>';
				$html .= '<td class="'.$class10.'">10</td>';
				$html .= '<td class="'.$class11.'">11</td>';
				$html .= '<td class="'.$class12.'">12</td>';
				$html .= '<td class="'.$class13.'">13</td>';
				$html .= '<td class="'.$class14.'">14</td>';
				$html .= '<td class="'.$class15.'">15</td>';
				$html .= '<td class="'.$class16.'">16</td>';
				$html .= '<td class="'.$class17.'">17</td>';
				$html .= '<td class="'.$class18.'">18</td>';
				$html .= '</tr>';
			}
		}
		$this->assign('trendhtml',$html);
		$this->display();
	}

	public function oldssc(){

        $lotteryname = I('code');
        $this->assign('lotteryname',$lotteryname);
        $_ssclist = C('cplist.ssc');
        foreach($_ssclist as $k=>$v){
            if($v['isopen']==0)unset($_ssclist[$k]);
        }
        $this->assign('ssclist',$_ssclist);
        $this->assign('nowcpinfo',$_ssclist[$lotteryname]);

        $this->assign('cptitle',$_ssclist[$lotteryname]['title']);
        $this->display();
    }


    //pk10
    public function oldpk10(){
        $lotteryname = I('code');
        $this->assign('lotteryname',$lotteryname);
        $_ssclist = C('cplist.pk10');
        foreach($_ssclist as $k=>$v){
            if($v['isopen']==0)unset($_ssclist[$k]);
        }
        $this->assign('ssclist',$_ssclist);
        $this->assign('nowcpinfo',$_ssclist[$lotteryname]);

        $this->assign('cptitle',$_ssclist[$lotteryname]['title']);
        $this->display();
    }
    //kl8
}
?>