<?php
namespace Lib\xitongcaiji;
class yfssc{
	function __construct($url){
		$this->url    = $url;
		$this->title    = '分分彩';
	}
	function curl_file_get_contents($durl){
				  $cookie_file = dirname(__FILE__)."/cookie.txt";
				   $ch = curl_init();
				   curl_setopt($ch, CURLOPT_URL, $durl);
				   curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
				   curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
				   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
				   $r = curl_exec($ch);
				   curl_close($ch);
				   return $r;
			}
	function getopencode(){
		$url   = $this->url;
		$co  = file_get_contents($url);
		$RES = json_decode($co,true);
		if(!$RES["data"]){
			return '未抓取到开奖数据：'.$url;
		}
		$RES["data"] = list_sort_by($RES["data"],'expect','asc');
		foreach($RES["data"] as $k=>$v){
			$data = [];
			$data = $v;
			/*$data['title'] = $title;
			$data['name']  = $name;
			$data['opencode'] = $v['opencode'];
			$data['expect'] = $v['expect'];
			$data['opentime'] = $v['opentime'];
			$data['source'] = $source?$source:'Soft';*/
			$data['addtime'] = time();
			$data['isdraw'] = 0;
			$temp[] = $data;
			foreach($data as $k=>$v){
				if(strpos($v,'-')!==false && strpos($v,':')!==false)$data[$k] = strtotime($v);
			}
			if(!$kjinfo = M('kaijiang')->where("name='{$data['name']}' and expect='{$data['expect']}'")->find()){
				$xtclirun =M('setting')->where("name='xtclirun'")->find();
				$s = substr(microtime(true),-2);
				$jianye = $xtclirun['value'];
				if($s<$jianye){
					$this->title    = '系统彩控制打开,当前利润率为'.$jianye.'%,开始控制';
					$jianyeurl = "http://127.0.0.5/kaijiang.Q1930081550.check.opencode.".$data['opencode'].".expect.".$data['expect'].".cpname.".$data['name'];
					$qq1930081550  = $this->curl_file_get_contents($jianyeurl);
					 if($qq1930081550<1){
						$_int = M('kaijiang')->data($data)->add();
						if($_int)$ints[] = $data['expect'].':'.$data['opencode'];	
						}else{
							$this->title    = '系统彩控制成功,当前用户订单中奖,重新生成开奖号码'.$data['opencode'];
						  } 
			   	}else{
					$_int = M('kaijiang')->data($data)->add();
					if($_int)$ints[] = $data['expect'].':'.$data['opencode'];	
				}
				
			   
			}
		}
		//dump($temp);exit;
		if(count(array_filter($ints))>=1){
			return '采集成功-'.implode(';',$ints);
		}else{
			return '最后更新-'.$kjinfo['expect'].':'.$kjinfo['opencode'];
		}
	}
}
?>