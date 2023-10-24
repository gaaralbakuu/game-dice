<?php
namespace Lib\apicaiji;
class fc3d{
	function __construct($url){
		$this->source = 'Soft';
		$this->name   = 'fc3d' ;
		$this->title  = '福彩3D' ;
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
			if(!$data['expect']) return;
			$temp = M('kaijiang')->where("name='{$name}' and expect='{$data['expect']}'")->find();
			if(!$temp){
				$_int = M('kaijiang')->data($data)->add();
				if($_int)$ints[] = $data['expect'].':'.$data['opencode'];
			}else if ($temp && $temp->opencode != $data['opencode'] && $temp->source == 'Soft') {
				$temp['opencode'] = $data['opencode'];
				//$lhc->save($lhc);
				M('kaijiang')->where('id = '.$temp['id'])->field('opencode')->save($data);
			}
		}
		//dump($temp);exit;
		if(count(array_filter($ints))>=1){
			return '采集成功-'.implode(';',$ints);
		}else{
			return '最后更新-'.$data['expect'].':'.$data['opencode'];
		}
	}
}
?>