<?php
namespace Lib\apicaiji;
class lhc{
	function __construct($url){
		$this->source = 'Soft';
		$this->name   = 'lhc' ;
		$this->title  = '香港六合彩' ;
		$this->url    = $url ;
	}
	function getopencode(){
		$name  = $this->name;
		$title = $this->title;
		$source= $this->source;
		$url   = $this->url;
		$co  = file_get_contents($url);
		$RES = json_decode($co,true);
		if(!$RES["data"]){
			return '未抓取到开奖数据：'.$url;
		}
		$RES["data"] = list_sort_by($RES["data"],'expect','asc');
		foreach($RES["data"] as $k=>$v){
			$data = [];
			$data['title'] = $title;
			$data['name']  = $name;
			$data['opencode'] = $v['opencode'];
			$data['drawtime'] = $v['drawTime'];
			$data['expect'] = $v['expect'];
			$data['opentime'] = $v['opentime'];
			$data['source'] = $source?$source:'Soft';
			$data['addtime'] = time();
			$data['isdraw'] = 0;
			$temp[] = $data;
			foreach($data as $k=>$v){
				if(strpos($v,'-')!==false && strpos($v,':')!==false)$data[$k] = strtotime($v);
			}
			$_int = '';
			/**
			if(!M('kaijiang')->where("name='{$name}' and expect='{$data['expect']}' and opencode='{$data['opencode']}'")->find()){
				$_int = M('kaijiang')->data($data)->add();
				if($_int)$ints[] = $data['expect'].':'.$data['opencode'];
			}
			**/
			if($data['opencode']) $data['opencode'] = $this->addZero($data['opencode']);
			$lhc = M('kaijiang')->where("name='{$name}' and expect='{$data['expect']}' ")->find();
			if(!$lhc&&count(explode(',',$data['opencode']))==7){ // && $data['opencode'] !=''

				/**
				$arr = split(',', $data['opencode']);
				foreach ($arr as $key => $value) {
					if(strlen($value) == 1){
						$arr[$key] = "0".$value;
					}
				}
				$data['opencode'] = join(',', $arr);
				**/
				file_put_contents('lll.txt', json_encode($data));
				if($yushe_opencode = M('yukaijiang')->where("name='{$name}' and expect='{$data['expect']}'")->find()){
					$data['opencode'] = $yushe_opencode['opencode'];
					$_int = M('kaijiang')->data($data)->add();
				}else{
					$_int = M('kaijiang')->data($data)->add();
				}

				
				if($_int)$ints[] = $data['expect'].':'.$data['opencode'];
			}else if ($lhc&&$data['drawtime'] != $lhc['drawtime'] &&count(explode(',',$data['opencode']))==7) {
				
				//$lhc->save($lhc);
			
				M('kaijiang')->where('id = '.$lhc['id'])->field('drawtime')->save($data);
			}
			//echo $lhc['source'];
			//print_r($lhc);
			
		}
		//dump($temp);exit;
		if(count(array_filter($ints))>=1){
			return '采集成功-'.implode(';',$ints);
		}else{
			return '最后更新-'.$data['expect'].':'.$data['opencode'];
		}
	}


	/**
		如果开奖结果前面没有0则补零
	*/
	function addZero($str){
		$arr = split(',', $str);
		foreach ($arr as $key => $value) {
			if(strlen($value) == 1){
				$arr[$key] = "0".$value;
			}
		}
		return join(',', $arr);
	}

}
?>