<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/4
 * Time: 0:22
 */
namespace Home\Controller;
use admin\model\Members;
use Think\Controller;
use Think\Request;
use Think\Cache;
use Think\Db;
class ChatController extends Home
{
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
        $user = Db::name('member')->where(['id' => session('member_info.uid')])->find();
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

    /**获取聊天记录
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getChatList(){
        $list=Db::name('chat_list')->alias('c')->order('id desc')->limit(10)->select();
        foreach ($list as $k=>&$v){
            //设置样式class和等级标签
            $v['style']='background: linear-gradient(to right, rgb(25, 158, 216), rgb(25, 158, 216)); border-left-color: rgb(25, 158, 216); border-right-color: rgb(25, 158, 216); color: rgb(255, 255, 255);';
            switch ((int)$v['level']){
                case 1:
                    $v['level_img']='/static/home/chat1/image/icon_member01.gif';
                    break;
                case 2:
                    $v['level_img']='/static/home/chat1/image/icon_member02.gif';
                    break;
                case 3:
                    $v['level_img']='/static/home/chat1/image/icon_member03.png';
                    break;
                case 4:
                    $v['level_img']='/static/home/chat1/image/icon_member04.png';
                    break;
                default:
                    $v['style']='background: linear-gradient(to right, rgb(0, 255, 212), rgb(198, 119, 119)); border-left-color: rgb(198, 119, 119); border-right-color: rgb(0, 255, 212); color: rgb(18, 18, 18);';
                    $v['level_img']='/static/home/chat1/image/icon_member06.gif';
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
            if($v['uid']==$this->uid){
                $v['class']='type-right';
            }else{
                $v['class']='type-left';
            }


        }
        return  array_reverse($list);
    }
    /** 获取用户等级和是否能聊天
     * @param $money
     */
    public  function getlevel($money){
        $user_back_set=Db::name('user_back_set')->limit(5)->select();
        $data['level']=1;
        $data['chat']=1;
        return $data;
        foreach ($user_back_set as $k=>$v1){
            if($money<$v1['level_start']){
                $data['level']=$k;
                break;
            }
            $data['level']=5;
        }
        /*var_dump( $data['level']);

        if($money<1000){
            if($money<500){
                $data['chat']=0;
            }
        }elseif ($money>=1000&&$money<10000){
            $data['level']=2;
        }elseif($money>=10000&&$money<100000){
            $data['level']=3;
        }elseif($money>=100000&&$money<1000000){
            $data['level']=4;
        }else{
            $data['level']=5;
        }*/
        return $data;
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
    public function add_chat(Request $request){
        if($request->isPost()){
            $returnData['code'] = 0;
            $returnData['msg'] = '数据格式错误';

            $data=$request->post();
            $inster['content']=(string)trim($data['content']);
            $inster['type']=(int)$data['type'];
            $inster['uid']=$this->uid;
            $inster['create_at']=time();
            if($inster['content']==''){
                return json($returnData);
            };
            if($inster['type']!=1&&$inster['type']!=2){
                return json($returnData);
            }
            $user = Db::name('member')->where(['id' => session('member_info.uid')])->find();
            $level=$this->getlevel($user['total_recharge']);

            $inster['name']=$user['gm_name'];
            $inster['level']=$level['level'];
            $inster['head']=$user['head'];
            Db::name('chat_list')->insert($inster);

            $returnData['code'] = 1;
            $returnData['msg'] = '成功';
            return json($returnData);
        }else{
            $this->error('你要访问的页面不存在');
        }
    }
}