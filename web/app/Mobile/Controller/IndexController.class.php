<?php
namespace Mobile\Controller;
use Think\Controller;
class IndexController extends CommonController {
	public function __construct(){
		parent::__construct();
	}
	function index(){
		
$_usergrouplist = M('membergroup')->cache(60)->select();
//昨日资金榜和中奖信息
		$time=time ()- ( 1  *  24  *  60  *  60*7); //昨天时间截
		$day = date("Y-m-d",$time);
		$StartTime = date($day.' 00:00:00');      //昨天开始时间
		$EndTime   = date("Y-m-d H:i:s");     //昨天开始结束
		
		$map['oddtime'][]=array('egt',strtotime($StartTime));
		$map['oddtime'][]=array('elt',strtotime($EndTime));
		//查找昨日投注
		//$list  = M('')->table('__TOUZHU__ t,__MEMBER__ m,__MEMBERGROUP__ p')->field('t.cpname as k3name,t.uid,t.okamount,t.cpname,m.username,m.sex,m.face,p.groupname,p.touhan')->distinct(true)->where('t.isdraw=1 AND m.id=t.uid AND m.groupid=p.groupid')->select();
		//$list2 = M('')->table('__TOUZHU__ t,__MEMBER__ m,__MEMBERGROUP__ p')->field('t.cpname as k3name,t.uid,t.okamount,t.cpname,m.username,m.sex,m.face,p.groupname,p.touhan')->distinct(true)->where('t.isdraw=1 AND m.id=t.uid AND m.groupid=p.groupid')->order('t.okamount DESC')->select();


		//昨日投注中奖榜
		$_usergrouplist = M('membergroup')->cache(60)->select();
		foreach($_usergrouplist as $k=>$v){
			$usergrouplist[$v['groupid']] = $v;
		}
		$testuids = [];
		$testusers = M('member')->where(['isnb'=>1])->field('id')->select();
		foreach($testusers as $k=>$v){
			$testuids[] = $v['id'];
		}
		$map = [];
		$map['oddtime'][]=array('egt',strtotime($StartTime));
		$map['oddtime'][]=array('elt',strtotime($EndTime));
		$map['isdraw']=array('eq',1);
		//$map['uid']=array('not in',$testuids);
		$list = M('touzhu')->field("cptitle as k3name,uid,username,sum(okamount) as okamount")->where($map)->group("uid")->limit(50)->order("okamount desc")->select();
		foreach($list as $k=>$v){
			$userinfo  = [];
			$userinfo  = M('member')->where(['id'=>$v['uid']])->field('groupid,sex,face')->cache(600)->find();
			$v['sex']  = $userinfo['sex'];
			$v['face'] = is_file($userinfo['face'])?$userinfo['face']:'/resources/images/face/'.rand(1,25).'.jpg';
			$v['groupname'] = $usergrouplist[$userinfo['groupid']]['groupname'];
			$v['touhan'] = $usergrouplist[$userinfo['groupid']]['touhan'];
			$v['amountcount'] = $v['okamount'];
			$v['okamountcount'] = M('touzhu')->where("isdraw=1 AND uid='{$v['uid']}'")->SUM('okamount');
			$v["k3names"] = M('touzhu')->distinct ( true )->where ("uid='{$v['uid']}'")->field ( 'cpname as name,cptitle as title' )->cache(60)->limit(8)->select();
			$list[$k]    = $v;
		}

		$group = M('Membergroup')->field('groupid,groupname,touhan')->where('isagent <> 1')->order('groupid ASC')->select();
		if(true){
			$list = $this->randking(1,$group,$list);
		}
		$list=list_sort_by($list,'amountcount','desc');
		file_put_contents("ttt.txt", json_encode($list));
		$mylist = array();
		for ($i=0;$i<count($list);$i++) {
			// if($list[$i]['okamount'] >= 100){
			array_push($mylist,$list[$i]);
			// }
		}
		$this->assign('list',$list);
		// $this->assign('list2',$list);
		// $this->display();

		$_t = time();
		// $cplist = M('caipiao')->where(array('isopen'=>1))->cache(300)->order('allsort asc')->limit(11)->select();
		$cplist = M('caipiao')->where(array('isopen'=>1))->order('allsort asc')->cache(300)->limit(14)->select();

		$gglist = M('Gonggao')->field('id,title,oddtime')->cache(300)->order("id DESC")->find();
		$this->assign('gglist',$gglist);
		$this->cplist  = $cplist;
		$this->display();


	}

	function lotteryHall()
	{
		$cplist = M('caipiao')->where(array('isopen'=>1))->order('allsort asc')->cache(300)->select();
		$cplist2 = M('caipiao')->where(array('isopen'=>1))->order('listorder asc')->cache(300)->select();
		$this->assign('cplist',$cplist);
		$this->assign('cplist2',$cplist2);
		$this->display();
	}
	//随机资金榜
	public function randking($nocookie=null,$group,$user_arr){
		$nocookie?$no = 30 : $no =10;


		$allk3 = M('caipiao')->field("name,title")->cache(300)->where("isopen=1")->select();
		for ($i=0;$i<$no;$i++) {
			$count = rand(1,6); $num = rand(4,6); $num2  = rand(2,3);$num3  = rand(1,4);
			$user[$i]['username']  = substr_replace(rand_strings($num,$count),'***',-3,3);
			$user[$i]['okamount']  =  rand_strings(1,7).rand_strings($num3,0);
			$user[$i]['face']      = is_file($user[$i]['face'])?$user[$i]['face']:'/resources/images/face/'.rand(1,25).'.jpg';
			$user[$i]['sex']       =  rand(0,2);
			$user[$i]['groupname'] =  $group[rand(0,8)]['groupname'];
			$user[$i]['k3name']    =  $allk3[rand(0,14)]['title'];
			$user[$i]["amountcount"]     =    rand_strings(1,7).rand_strings($num2,0);
			$user[$i]["okamountcount"]     =  ceil($user[$i]['amountcount'] * (rand(6,9).'.'.rand(1,9)));
		}
		$sedcon = strtotime(date("Y-m-d ")."23:59:59")-time();
		$user = list_sort_by($user,'amountcount','desc');
		$list =json_encode($user);
		if($nocookie){
			foreach ($user as $key=> $value){
				$user[$key]['k3names']= M('caipiao')->field("name,title")->cache(300)->limit(rand(0,3),6)->select();
				switch ($user[$key]['groupname']){
					case $group[0]['groupname']:
						$user[$key]['touhan'] = $group[0]['touhan'];
						break;
					case $group[1]['groupname']:
						$user[$key]['touhan'] = $group[1]['touhan'];
						break;
					case $group[2]['groupname']:
						$user[$key]['touhan'] = $group[2]['touhan'];
						break;
					case $group[3]['groupname']:
						$user[$key]['touhan'] = $group[3]['touhan'];
						break;
					case $group[4]['groupname']:
						$user[$key]['touhan'] = $group[4]['touhan'];
						break;
					case $group[5]['groupname']:
						$user[$key]['touhan'] = $group[5]['touhan'];
						break;
					case $group[6]['groupname']:
						$user[$key]['touhan'] = $group[6]['touhan'];
						break;
					case $group[7]['groupname']:
						$user[$key]['touhan'] = $group[7]['touhan'];
						break;
					case $group[8]['groupname']:
						$user[$key]['touhan'] = $group[8]['touhan'];
						break;
					case $group[9]['groupname']:
						$user[$key]['touhan'] = $group[9]['touhan'];
						break;
				}
			}
			for ($i=0;$i<count($user_arr);$i++) {
				$user_arr[$i]['username']  = substr_replace($user_arr[$i]['username'],'***',-3,3);
				array_unshift($user,$user_arr[$i]);
			}
			
			return $user;
			exit();
		}else{
			cookie('list',$list,$sedcon);
		}
	}

}
?>