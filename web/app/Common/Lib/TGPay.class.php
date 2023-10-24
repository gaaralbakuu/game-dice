<?php
/**
 * Created by PhpStorm.
 * Date: 2018/11/8
 * Time: 21:10
 */
namespace Lib;
class TGPay{

    public $Key;// = 'B4073DF595ED2B';
    public $account_id;// = '10360';

    public $callback_url ;//异步通知地址
    public $success_url;//支付成功后跳转的网页
    public $error_url;
    public $request_url = 'http://www.tggpay.com/gateway/index/checkpoint.do';
    public $service_url = 'http://www.tggpay.com/gateway/pay/service.do';


    public function __construct($data,$success_url = ''){

        $this->success_url = $success_url?$success_url:'http://'.$_SERVER['SERVER_NAME'].U('Home/Account/dealRecord2');
        $this->callback_url = 'http://'.$_SERVER['SERVER_NAME'].U('OutApi/tgpay_callback');
        $this->error_url = 'http://'.$_SERVER['SERVER_NAME'].U('OutApi/tgpay_error');

        $this->Key = $data['third_userkey'];
        $this->account_id = $data['third_userid'];
    }

    public function test(){
        echo 'http://'.U('Home/Account/tgpay_callback');
    }

    //准备请求数据
    public function prepareRequest($data){
        $request_data = [
            'account_id' => $this->account_id,
            'content_type' => 'json',
            'thoroughfare' => 'service_auto',
            'type' => $data['type'],
            'out_trade_no' => $data['trano'],
            'robin' => 2,//开启轮询
            'amount' => $data['amount'],
            'callback_url' => $this->callback_url,
            'success_url' => $this->success_url,
            'error_url' => $this->error_url,
            'sign' => $this->prepareSign($data)
        ];
        $json = $this->request($request_data,$this->request_url);
        $result = json_decode($json,true);
        if($result['code'] == '200'){
            return $this->service_url.'?id='.$result['data']['order_id'];
        }
    }

    //准备签名
    public function prepareSign($data){
        $arr = [
            'amount' => $data['amount'],
            'out_trade_no' => $data['trano']
        ];
        return $this->sign($this->Key,$arr);
    }

    //生成签名算法
    public function sign($key_id,$array){
        $data = md5(sprintf("%.2f", $array['amount']) . $array['out_trade_no']);
        $key[] ="";
        $box[] ="";
        $cipher = '';
        $pwd_length = strlen($key_id);
        $data_length = strlen($data);
        for ($i = 0; $i < 256; $i++)
        {
            $key[$i] = ord($key_id[$i % $pwd_length]);
            $box[$i] = $i;
        }
        for ($j = $i = 0; $i < 256; $i++)
        {
            $j = ($j + $box[$i] + $key[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        for ($a = $j = $i = 0; $i < $data_length; $i++)
        {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;

            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;

            $k = $box[(($box[$a] + $box[$j]) % 256)];
            $cipher .= chr(ord($data[$i]) ^ $k);
        }
        return md5($cipher);
    }

    /*
     * @name	请求接口
     * @desc	request api
     * @param	curl,sock
     */
    public function request($data, $url) {
        # TODO:	当前只有curl方式，以后支持fsocket等方式
        $curl = curl_init();
        $curlData = array();
        $curlData[CURLOPT_POST] = true;
        $curlData[CURLOPT_URL] = $url;
        $curlData[CURLOPT_RETURNTRANSFER] = true;
        $curlData[CURLOPT_TIMEOUT] = 120;
        #CURLOPT_FOLLOWLOCATION
        $curlData[CURLOPT_POSTFIELDS] = $data;
        curl_setopt_array($curl, $curlData);

        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $result = curl_exec($curl);

        if (!$result)
        {
            var_dump(curl_error($curl));
        }
        curl_close($curl);
        //echo $result;
        return $result;
    }
}