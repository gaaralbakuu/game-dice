<?php

namespace Home\Controller;

use Think\Controller;
use admin\model\Members;
use Think\Request;
use Think\Cache;
use Think\Db;
class GameController extends CommonController
{

// ------------------------------------------chat start

     public function index()
    {
        //获取聊天室公告
        $chat_notice = Cache::get('chat_notice');
        if (!$chat_notice) {
            $chat_notice = Db::name('notice')->where(['type' => 3])->limit(3)->order('id desc')->select();
            if ($chat_notice) {
                Cache::set('chat_notice', $chat_notice, 600);
            }
        }
        // $user = Db::name('member')->where(['id' => session('member_info.uid')])->find();
        $user['level']=1;
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
                    break;
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



            $inster['name']=$data['username'];
            $inster['level']=$this->userinfo['groupid'];
            $inster['head']=htmlentities($data['head']);

            $res = M('chat_list')->data($inster)->add();
            $returnData['code'] = 1;
            $returnData['msg'] = '成功';
            return json_encode($returnData);
        }else{
            $this->error('你要访问的页面不存在');
        }
    }
// ------------------------------------------chat end    


    public function __construct()
    {
        parent::__construct();
        if (!$this->userinfo) {
            redirect(U("Public/login"));
        };
        $this->assign('level', $this->userinfo['groupid']);
    }
    //公用
    public function gameHeader()
    {
        $gamecplist = S('gamecplist');
        if (!$gamecplist) {
            $_allcp = M('Caipiao')->cache('gamecplist', 300)->field('id,title,typeid,name')->where("isopen='1' AND iswh='0'")->order('listorder ASC')->select();
        } else {
            $_allcp = $gamecplist;
        }
        $this->assign('Allcp', $_allcp);
        $is_chat = M('setting')->where(['name'=>"is_chat"])->find();
        $this->assign('is_chat',$is_chat['value']);
        $is_chat = M('setting')->where(['name'=>"is_video"])->find();
        $this->assign('is_video',$is_chat['value']);
    }

    //K3
    function k3()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_k3list = C('cplist.k3');
        foreach ($_k3list as $k => $v) {
            if ($v['isopen'] == 0) unset($_k3list[$k]);
        }
        $this->assign('k3list', $_k3list);
        $this->assign('nowcpinfo', $_k3list[$lotteryname]);

        $typeid = 'k3';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        if ($Result['data']) {
            $sessionid = session('member_sessionid');
            $auth_id = session('member_auth_id');
            $userinfo = session('userinfo');
            if ($sessionid && $auth_id && $userinfo && $userinfo['groupid']) {//未登陆以玩法设置
                $membergroups = C('membergroups');
                $groupinfo = $membergroups[$userinfo['groupid']];
                if ($groupinfo) foreach ($Result['data'] as $k0 => $v0) {
                    $Result['data'][$v0['playid']]['minxf'] = $groupinfo['min_' . $v0['playid']] ? $groupinfo['min_' . $v0['playid']] : ($Result['data'][$v0['playid']]['minxf'] ? $Result['data'][$v0['playid']]['minxf'] : 0);
                    $Result['data'][$v0['playid']]['maxxf'] = $groupinfo['max_' . $v0['playid']] ? $groupinfo['max_' . $v0['playid']] : ($Result['data'][$v0['playid']]['maxxf'] ? $Result['data'][$v0['playid']]['maxxf'] : 0);
                }
            }
            $Result['rates'] = $Result['data'];
            unset($Result['data']);
        }
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        $this->display();
    }

    //SSC
    function ssc()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.ssc');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);

        $typeid = 'ssc';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        $Result = $this->userjj($Result);
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        $this->display();
    }

    //SSC
    function ssc2()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.ssc');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);

        $typeid = 'ssc';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        $Result = $this->userjj($Result);
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        $this->display();
    }

    //pk10
    function pk10()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.pk10');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);

        $typeid = 'pk10';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        $Result = $this->userjj($Result);
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        $this->display();
    }

    function pk102()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.pk10');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);

        $typeid = 'pk10';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        $Result = $this->userjj($Result);
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        $this->display();
    }

    //快乐8
    function keno()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.keno');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);

        $typeid = 'keno';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        $Result = $this->userjj($Result);
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        $this->display();
    }

    function x5()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.x5');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);

        $typeid = 'x5';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        $Result = $this->userjj($Result);
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        $this->display();
    }

    function dpc()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.dpc');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);

        $typeid = 'dpc';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 300);
        }
        $Result = $this->userjj($Result);
        $this->assign('rates', $Result);
        $this->assign('info', $info);
        $this->assign('cptypes', $cptypes);
        $this->userkjmsg();
        if ($lotteryname == 'fc3d') {
            $this->display("Game_fc3d");
        }
        if ($lotteryname == 'pl3') {
            $this->display("Game_pl3");
        }
        if ($lotteryname == 'df3d') {
            $this->display("Game_df3d");
        }
    }

    //六合彩
    function lhc()
    {
        $this->gameHeader();
        $lotteryname = I('code');
        $this->assign('lotteryname', $lotteryname);
        $_ssclist = C('cplist.lhc');
        foreach ($_ssclist as $k => $v) {
            if ($v['isopen'] == 0) unset($_ssclist[$k]);
        }
        $this->assign('ssclist', $_ssclist);
        $this->assign('nowcpinfo', $_ssclist[$lotteryname]);
        $typeid = 'lhc';
        $Result = S('lotteryrates_' . $typeid);
        if (!$Result) {
            $apiparam = array();
            $apiparam['typeid'] = $typeid;
            $_api = new \Lib\api;
            $Result = $_api->sendHttpClient('Api/Lottery/lotteryrates', $apiparam);
            $sid = S('lotteryrates_' . $typeid, $Result, 1);
        }
        if ($Result['data']) {
            $sessionid = session('member_sessionid');
            $auth_id = session('member_auth_id');
            $userinfo = session('userinfo');
            if ($sessionid && $auth_id && $userinfo && $userinfo['groupid']) {//未登陆以玩法设置
                $membergroups = C('membergroups');
                $groupinfo = $membergroups[$userinfo['groupid']];
                if ($groupinfo) foreach ($Result['data'] as $k0 => $v0) {
                    $Result['data'][$v0['playid']]['minxf'] = $groupinfo['min_' . $v0['playid']] ? $groupinfo['min_' . $v0['playid']] : ($Result['data'][$v0['playid']]['minxf'] ? $Result['data'][$v0['playid']]['minxf'] : 0);
                    $Result['data'][$v0['playid']]['maxxf'] = $groupinfo['max_' . $v0['playid']] ? $groupinfo['max_' . $v0['playid']] : ($Result['data'][$v0['playid']]['maxxf'] ? $Result['data'][$v0['playid']]['maxxf'] : 0);
                }
            }
            $Result['rates'] = $Result['data'];
            unset($Result['data']);
        }
        $this->assign('rates', $Result);
        $this->userkjmsg();
        $this->display();
    }

    function userkjmsg()
    {
        $this->getChatList();
        $_usergrouplist = M('membergroup')->cache(60)->select();
        foreach ($_usergrouplist as $k => $v) {
            $usergrouplist[$v['groupid']] = $v;
        }
        $testuids = [];
        $testusers = M('member')->where(['isnb' => 1])->field('id')->select();
        foreach ($testusers as $k => $v) {
            $testuids[] = $v['id'];
        }
        $map = [];
        $map['oddtime'][] = array('egt', strtotime($StartTime));
        $map['oddtime'][] = array('elt', strtotime($EndTime));
        $map['isdraw'] = array('eq', 1);
        //$map['uid']=array('not in',$testuids);
        $list = M('touzhu')->field("cpname as k3name,uid,username,sum(okamount) as okamount")->where($map)->group("uid")->limit(30)->order("okamount desc")->select();
        foreach ($list as $k => $v) {
            $userinfo = [];
            $userinfo = M('member')->where(['id' => $v['uid']])->field('groupid,sex,face')->cache(300)->find();
            $v['sex'] = $userinfo['sex'];
            $v['face'] = is_file($userinfo['face']) ? $userinfo['face'] : '/resources/images/face/' . rand(1, 25) . '.jpg';
            $v['groupname'] = $usergrouplist[$userinfo['groupid']]['groupname'];
            $v['touhan'] = $usergrouplist[$userinfo['groupid']]['touhan'];
            $v['amountcount'] = $v['okamount'];
            $v['okamountcount'] = M('touzhu')->where("isdraw=1 AND uid='{$v['uid']}'")->SUM('okamount');
            $v["k3names"] = M('touzhu')->distinct(true)->where("uid='{$v['uid']}'")->field('cpname as name,cptitle as title')->cache(300)->limit(8)->select();
            $list[$k] = $v;
        }
        $group = M('Membergroup')->field('groupid,groupname,touhan')->where('isagent <> 1')->order('groupid ASC')->select();
        if (count($list) < 3) {
            $list = $this->randking(1, $group);
        }
        $list = list_sort_by($list, 'amountcount', 'desc');
        $this->assign('list', $list);
        $this->assign('list2', $list);
    }



    //随机资金榜
    public function randking($nocookie = null, $group)
    {
        $nocookie ? $no = 50 : $no = 10;
        $allk3 = M('caipiao')->field("name,title")->where("status=1")->select();
        for ($i = 0; $i < $no; $i++) {
            $count = rand(1, 6);
            $num = rand(4, 6);
            $num2 = rand(2, 3);
            $num3 = rand(1, 2);
            $user[$i]['username'] = rand_strings($num, $count);
            $user[$i]['okamount'] = rand_strings(1, 7) . rand_strings($num3, 0);
            $user[$i]['face'] = '/resources/images/face/' . rand(1, 25) . '.jpg';
            $user[$i]['sex'] = rand(0, 2);
            $user[$i]['groupname'] = $group[rand(0, 8)]["groupname"];
            $user[$i]['k3name'] = $allk3[rand(0, 14)]['title'];

            $user[$i]["amountcount"] = rand_strings(1, 7) . rand_strings($num2, 0);
            $user[$i]["okamountcount"] = ceil($user[$i]['amountcount'] * (rand(6, 9) . '.' . rand(1, 9)));
        }
        $sedcon = strtotime(date("Y-m-d ") . "23:59:59") - time();
        $user = list_sort_by($user, 'amountcount', 'desc');
        $list = json_encode($user);
        if ($nocookie) {
            foreach ($user as $key => $value) {
                $user[$key]['k3names'] = M('caipiao')->field("name,title")->limit(rand(0, 3), 6)->select();
                switch ($user[$key]['groupname']) {
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
            return $user;
            exit();
        } else {
            cookie('list', $list, $sedcon);
        }
    }

    // 计算用户奖金
    function userjj($Result)
    {
        if ($Result) {
            $sessionid = session('member_sessionid');
            $auth_id = session('member_auth_id');
            $userinfo = session('userinfo');
            if ($sessionid && $auth_id && $userinfo && $userinfo['groupid']) {//未登陆以玩法设置
                $membergroups = C('membergroups');
                $groupinfo = $membergroups[$userinfo['groupid']];
                if ($groupinfo)
                    foreach ($Result['data'] as $k0 => $v0) {
                        //	(最高奖金-最低奖金)/(最高返点)  X  (会员返点)+最低奖金
                        if ($userinfo['fandian']) {
                            if (strstr($v0['maxjj'], '|')) {
                                $v01 = explode('|', $v0['maxjj']);
                                $v02 = explode('|', $v0['minjj']);
                                $maxjjstr = "";
                                foreach ($v01 as $j => $v) {
                                    $maxstr = ((($v01[$j] - $v02[$j]) / GetVar('fanDianMax')) * $userinfo['fandian'] + $v02[$j]) . '|';
                                    $maxjjstr .= sprintf("%.2f", filter_money($maxstr, 2)) . '|';
                                }
                                $Result['data'][$v0['playid']]['maxjj'] = substr($maxjjstr, 0, -1);
                            } else {
                                $maxjj = ($Result['data'][$v0['playid']]['maxjj'] - $Result['data'][$v0['playid']]['minjj']) / (GetVar('fanDianMax')) * ($userinfo['fandian']) + $Result['data'][$v0['playid']]['minjj'];
                                if (substr(explode('.', $maxjj)[1], 0, 2) == '99') {
                                    $Result['data'][$v0['playid']]['maxjj'] = sprintf("%.2f", ceil($maxjj));
                                } else {
                                    $Result['data'][$v0['playid']]['maxjj'] = sprintf("%.2f", filter_money($maxjj, 2));
                                }
                            }

                            if(isset($v0['maxrate']) && isset($v0['minrate'])){
                                $maxrate = ($Result['data'][$v0['playid']]['maxrate'] - $Result['data'][$v0['playid']]['minrate']) / (GetVar('fanDianMax')) * ($userinfo['fandian']) + $Result['data'][$v0['playid']]['minrate'];
                                if (substr(explode('.', $maxrate)[1], 0, 2) == '99') {
                                    $Result['data'][$v0['playid']]['maxrate'] = sprintf("%.2f", ceil($maxrate));
                                } else {
                                    $Result['data'][$v0['playid']]['maxrate'] = sprintf("%.2f", filter_money($maxrate, 2));
                                }
                            }
                        }
                        $Result['data'][$v0['playid']]['minxf'] = $groupinfo['min_' . $v0['playid']] ? $groupinfo['min_' . $v0['playid']] : ($Result['data'][$v0['playid']]['minxf'] ? $Result['data'][$v0['playid']]['minxf'] : 0);
                        $Result['data'][$v0['playid']]['maxxf'] = $groupinfo['max_' . $v0['playid']] ? $groupinfo['max_' . $v0['playid']] : ($Result['data'][$v0['playid']]['maxxf'] ? $Result['data'][$v0['playid']]['maxxf'] : 0);
                    }
            }
            $Result['rates'] = $Result['data'];
            unset($Result['data']);
            return $Result;
        }
    }

    //玩法说明
    function howtoplay()
    {
        $caipiao = M('caipiao')->field('typeid,title,firsttime,endtime,qishu')->where("typeid='{$_GET['cz']}' AND name='{$_GET['name']}'")->find();
        $this->assign('caipiao', $caipiao);

        switch ($_GET['cz']) {
            case "k3" :
                $tpl = 'howtoplayk3';
                break;
            case "ssc" :
                $tpl = 'howtoplayssc';
                break;
            case "keno" :
                $tpl = 'howtoplaykeno';
                break;
            case "pk10" :
                $tpl = 'howtoplaypk10';
                break;
            case "x5" :
                $tpl = 'howtoplayx5';
                break;
            case "dpc" :
                $tpl = 'howtoplaydpc';
                break;
            case "lhc" :
                $tpl = 'howtoplaylhc';
                break;

        }
        $this->display($tpl);
    }
}

?>