<?php
namespace Lib\lotterytimes;
class cqssc {
	function drawtimes(){
		$name = 'cqssc';
		$cjnowtime = 0;
		$nowtime = time() + $cjnowtime;
		$total  = 59;
		$openstart  = '00:30:20';
		$jgtime = 1200;
		$yctime = 0;
		$_yct = ceil($yctime/$total);
		/*		$array = array();
                for($i=1;$i<=$total;$i++){
                    $start = strtotime($openstart)-$jgtime + ($i-1)*$jgtime + ($i-1)*$_yct;
                    $end = strtotime($openstart)+($i-1)*$jgtime + ($_yct*$i);
                    $draws[$i] = array('start'=>date('H:i:s',$start),'end'=>date('H:i:s',$end));
                }
                $draws[1]['start'] = date('Y-m-d H:i:s',strtotime($draws[$total]['end'])-86400);*/
		$draws = array(
			'1'=>array('start'=>'00:08:00','end'=>'00:28:00'),
			'2'=>array('start'=>'00:28:00','end'=>'00:48:00'),
			'3'=>array('start'=>'00:48:00','end'=>'01:08:00'),
			'4'=>array('start'=>'01:08:00','end'=>'01:28:00'),
			'5'=>array('start'=>'01:28:00','end'=>'01:48:00'),
			'6'=>array('start'=>'01:48:00','end'=>'02:08:00'),
			'7'=>array('start'=>'02:08:00','end'=>'02:28:00'),
			'8'=>array('start'=>'02:28:00','end'=>'02:48:00'),
			'9'=>array('start'=>'02:48:00','end'=>'03:08:00'),

			'10'=>array('start'=>'07:08:25','end'=>'07:28:25'),
			'11'=>array('start'=>'07:28:25','end'=>'07:48:25'),
			'12'=>array('start'=>'07:48:25','end'=>'08:08:25'),
			'13'=>array('start'=>'08:08:25','end'=>'08:28:25'),
			'14'=>array('start'=>'08:28:25','end'=>'08:48:25'),
			'15'=>array('start'=>'08:48:25','end'=>'09:08:25'),
			'16'=>array('start'=>'09:08:25','end'=>'09:28:25'),
			'17'=>array('start'=>'09:28:25','end'=>'09:48:25'),
			'18'=>array('start'=>'09:48:25','end'=>'10:08:25'),
			'19'=>array('start'=>'10:08:25','end'=>'10:28:25'),
			'20'=>array('start'=>'10:28:25','end'=>'10:48:25'),
			'21'=>array('start'=>'10:48:25','end'=>'11:08:25'),
			'22'=>array('start'=>'11:08:25','end'=>'11:28:25'),
			'23'=>array('start'=>'11:28:25','end'=>'11:48:25'),
			'24'=>array('start'=>'11:48:25','end'=>'12:08:25'),
			'25'=>array('start'=>'12:08:25','end'=>'12:28:25'),
			'26'=>array('start'=>'12:28:25','end'=>'12:48:25'),
			'27'=>array('start'=>'12:48:25','end'=>'13:08:25'),
			'28'=>array('start'=>'13:08:25','end'=>'13:28:25'),
			'29'=>array('start'=>'13:28:25','end'=>'13:48:25'),
			'30'=>array('start'=>'13:48:25','end'=>'14:08:25'),
			'31'=>array('start'=>'14:08:25','end'=>'14:28:25'),
			'32'=>array('start'=>'14:28:25','end'=>'14:48:25'),
			'33'=>array('start'=>'14:48:25','end'=>'15:08:25'),
			'34'=>array('start'=>'15:08:25','end'=>'15:28:25'),
			'35'=>array('start'=>'15:28:25','end'=>'15:48:25'),
			'36'=>array('start'=>'15:48:25','end'=>'16:08:25'),
			'37'=>array('start'=>'16:08:25','end'=>'16:28:25'),
			'38'=>array('start'=>'16:28:25','end'=>'16:48:25'),
			'39'=>array('start'=>'16:48:25','end'=>'17:08:25'),
			'40'=>array('start'=>'17:08:25','end'=>'17:28:25'),
			'41'=>array('start'=>'17:28:25','end'=>'17:48:25'),
			'42'=>array('start'=>'17:48:25','end'=>'18:08:25'),
			'43'=>array('start'=>'18:08:25','end'=>'18:28:25'),
			'44'=>array('start'=>'18:28:25','end'=>'18:48:25'),
			'45'=>array('start'=>'18:48:25','end'=>'19:08:25'),
			'46'=>array('start'=>'19:08:25','end'=>'19:28:25'),
			'47'=>array('start'=>'19:28:25','end'=>'19:48:25'),
			'48'=>array('start'=>'19:48:25','end'=>'20:08:25'),
			'49'=>array('start'=>'20:08:25','end'=>'20:28:25'),
			'50'=>array('start'=>'20:28:25','end'=>'20:48:25'),
			'51'=>array('start'=>'20:48:25','end'=>'21:08:25'),
			'52'=>array('start'=>'21:08:25','end'=>'21:28:25'),
			'53'=>array('start'=>'21:28:25','end'=>'21:48:25'),
			'54'=>array('start'=>'21:48:25','end'=>'22:08:25'),
			'55'=>array('start'=>'22:08:25','end'=>'22:28:25'),
			'56'=>array('start'=>'22:28:25','end'=>'22:48:25'),
			'57'=>array('start'=>'22:48:25','end'=>'23:08:25'),
			'58'=>array('start'=>'23:08:25','end'=>'23:28:25'),
			'59'=>array('start'=>'23:28:25','end'=>'23:48:25'),
		);
		ksort($draws);
		foreach($draws as $k=>$v){
			if($nowtime>strtotime($v['start']) && $nowtime<=strtotime($v['end'])){
				$nowqihao = str_pad($k,3,0,STR_PAD_LEFT);
			}
		}
		if(!$nowqihao){
			$nowqihao = str_pad(1,3,0,STR_PAD_LEFT);
			$draws[1]['start']   = date('Y-m-d H:i:s',strtotime($draws[$total]['end']));
			$draws[1]['end']   = date('Y-m-d H:i:s',strtotime($draws[1]['end'])+86400);
			$nowdraws = [
				'expect'  => date('Ymd',strtotime($draws[1]['end'])).$nowqihao,
				'start'   => $draws[1]['start'],
				'end'     => $draws[1]['end']
			];
			$preqihao = str_pad($total,3,0,STR_PAD_LEFT);
			$predraws = [
				'expect' => date('Ymd',strtotime($draws[1]['start'])).$preqihao,
				'start'  => date('Y-m-d H:i:s',strtotime($draws[$total]['start'])),
				'end'    => date('Y-m-d H:i:s',strtotime($draws[$total]['end'])),
			];
		}else{
			$nowqihao = str_pad($nowqihao,3,0,STR_PAD_LEFT);
			$nowdraws = [
				'expect'  => date('Ymd',$nowtime).$nowqihao,
				'start'   => date('Y-m-d',$nowtime).' '.$draws[intval($nowqihao)]['start'],
				'end'     => date('Y-m-d',$nowtime).' '.$draws[intval($nowqihao)]['end']
			];
			if(intval($nowqihao)==1){
				$preqihao = str_pad($total,3,0,STR_PAD_LEFT);
				$nowexpecttime = strtotime($draws[$total]['end'])-86400;
				$predraws = [
					'expect' => date('Ymd',$nowexpecttime).$preqihao,
					'start'  => date('Y-m-d',$nowexpecttime).' '.$draws[intval($preqihao)]['start'],
					'end'    => date('Y-m-d',$nowexpecttime).' '.$draws[intval($preqihao)]['end'],
				];
			}else{
				$preqihao = str_pad($nowqihao-1,3,0,STR_PAD_LEFT);;
				$predraws = [
					'expect' => date('Ymd',$nowtime).$preqihao,
					'start'  => date('Y-m-d',$nowtime).' '.$draws[intval($preqihao)]['start'],
					'end'    => date('Y-m-d',$nowtime).' '.$draws[intval($preqihao)]['end'],
				];
			}
		}
		$return = [
			'lastFullExpect'  => $predraws['expect'],
			'lastExpect'      => substr($predraws['expect'],-3),
			'currFullExpect'  => $nowdraws['expect'],
			'currExpect'      => substr($nowdraws['expect'],-3),
			'remainTime'      => strtotime($nowdraws['end'])-time()-$cjnowtime,
			'openRemainTime'  => $cjnowtime,
		];
		return $return;
	}
}
?>