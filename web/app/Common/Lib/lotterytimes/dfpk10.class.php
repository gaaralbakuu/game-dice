<?php
namespace Lib\lotterytimes;
class dfpk10 {
	function drawtimes(){
		$name = 'dfpk10';
		$cjnowtime = 0;
		$nowtime = time() + $cjnowtime;
		$total  = 180;
		$openstart  = '13:04:30';
		$jgtime = 300;
		$yctime = 0;
		$_yct = ceil($yctime/$total);
		$draws = array(
			'1'=>array('start'=>'13:03:30','end'=>'13:08:30'),
			'2'=>array('start'=>'13:08:30','end'=>'13:13:30'),
			'3'=>array('start'=>'13:13:30','end'=>'13:18:30'),
			'4'=>array('start'=>'13:18:30','end'=>'13:23:30'),
			'5'=>array('start'=>'13:23:30','end'=>'13:28:30'),
			'6'=>array('start'=>'13:28:30','end'=>'13:33:30'),
			'7'=>array('start'=>'13:33:30','end'=>'13:38:30'),
			'8'=>array('start'=>'13:38:30','end'=>'13:43:30'),
			'9'=>array('start'=>'13:43:30','end'=>'13:48:30'),
			'10'=>array('start'=>'13:48:30','end'=>'13:53:30'),
			'11'=>array('start'=>'13:53:30','end'=>'13:58:30'),

			'12'=>array('start'=>'13:58:30','end'=>'14:03:30'),
			'13'=>array('start'=>'14:03:30','end'=>'14:08:30'),
			'14'=>array('start'=>'14:08:30','end'=>'14:13:30'),
			'15'=>array('start'=>'14:13:30','end'=>'14:18:30'),
			'16'=>array('start'=>'14:18:30','end'=>'14:23:30'),
			'17'=>array('start'=>'14:23:30','end'=>'14:28:30'),
			'18'=>array('start'=>'14:28:30','end'=>'14:33:30'),
			'19'=>array('start'=>'14:33:30','end'=>'14:38:30'),
			'20'=>array('start'=>'14:38:30','end'=>'14:43:30'),
			'21'=>array('start'=>'14:43:30','end'=>'14:48:30'),
			'22'=>array('start'=>'14:48:30','end'=>'14:53:30'),
			'23'=>array('start'=>'14:53:30','end'=>'14:58:30'),
			'24'=>array('start'=>'14:58:30','end'=>'15:03:30'),
			'25'=>array('start'=>'15:03:30','end'=>'15:08:30'),
			'26'=>array('start'=>'15:08:30','end'=>'15:13:30'),
			'27'=>array('start'=>'15:13:30','end'=>'15:18:30'),
			'28'=>array('start'=>'15:18:30','end'=>'15:23:30'),
			'29'=>array('start'=>'15:23:30','end'=>'15:28:30'),
			'30'=>array('start'=>'15:28:30','end'=>'15:33:30'),
			'31'=>array('start'=>'15:33:30','end'=>'15:38:30'),
			'32'=>array('start'=>'15:38:30','end'=>'15:43:30'),
			'33'=>array('start'=>'15:43:30','end'=>'15:48:30'),
			'34'=>array('start'=>'15:48:30','end'=>'15:53:30'),
			'35'=>array('start'=>'15:53:30','end'=>'15:58:30'),
			'36'=>array('start'=>'15:58:30','end'=>'16:03:30'),
			'37'=>array('start'=>'16:03:30','end'=>'16:08:30'),
			'38'=>array('start'=>'16:08:30','end'=>'16:13:30'),
			'39'=>array('start'=>'16:13:30','end'=>'16:18:30'),
			'40'=>array('start'=>'16:18:30','end'=>'16:23:30'),
			'41'=>array('start'=>'16:23:30','end'=>'16:28:30'),
			'42'=>array('start'=>'16:28:30','end'=>'16:33:30'),
			'43'=>array('start'=>'16:33:30','end'=>'16:38:30'),
			'44'=>array('start'=>'16:38:30','end'=>'16:43:30'),
			'45'=>array('start'=>'16:43:30','end'=>'16:48:30'),
			'46'=>array('start'=>'16:48:30','end'=>'16:53:30'),
			'47'=>array('start'=>'16:53:30','end'=>'16:58:30'),
			'48'=>array('start'=>'16:58:30','end'=>'17:03:30'),
			'49'=>array('start'=>'17:03:30','end'=>'17:08:30'),
			'50'=>array('start'=>'17:08:30','end'=>'17:13:30'),
			'51'=>array('start'=>'17:13:30','end'=>'17:18:30'),
			'52'=>array('start'=>'17:18:30','end'=>'17:23:30'),
			'53'=>array('start'=>'17:23:30','end'=>'17:28:30'),
			'54'=>array('start'=>'17:28:30','end'=>'17:33:30'),
			'55'=>array('start'=>'17:33:30','end'=>'17:38:30'),
			'56'=>array('start'=>'17:38:30','end'=>'17:43:30'),
			'57'=>array('start'=>'17:43:30','end'=>'17:48:30'),
			'58'=>array('start'=>'17:48:30','end'=>'17:53:30'),
			'59'=>array('start'=>'17:53:30','end'=>'17:58:30'),
			'60'=>array('start'=>'17:58:30','end'=>'18:03:30'),
			'61'=>array('start'=>'18:03:30','end'=>'18:08:30'),
			'62'=>array('start'=>'18:08:30','end'=>'18:13:30'),
			'63'=>array('start'=>'18:13:30','end'=>'18:18:30'),
			'64'=>array('start'=>'18:18:30','end'=>'18:23:30'),
			'65'=>array('start'=>'18:23:30','end'=>'18:28:30'),
			'66'=>array('start'=>'18:28:30','end'=>'18:33:30'),
			'67'=>array('start'=>'18:33:30','end'=>'18:38:30'),
			'68'=>array('start'=>'18:38:30','end'=>'18:43:30'),
			'69'=>array('start'=>'18:43:30','end'=>'18:48:30'),
			'70'=>array('start'=>'18:48:30','end'=>'18:53:30'),
			'71'=>array('start'=>'18:53:30','end'=>'18:58:30'),
			'72'=>array('start'=>'18:58:30','end'=>'19:03:30'),
			'73'=>array('start'=>'19:03:30','end'=>'19:08:30'),
			'74'=>array('start'=>'19:08:30','end'=>'19:13:30'),
			'75'=>array('start'=>'19:13:30','end'=>'19:18:30'),
			'76'=>array('start'=>'19:18:30','end'=>'19:23:30'),
			'77'=>array('start'=>'19:23:30','end'=>'19:28:30'),
			'78'=>array('start'=>'19:28:30','end'=>'19:33:30'),
			'79'=>array('start'=>'19:33:30','end'=>'19:38:30'),
			'80'=>array('start'=>'19:38:30','end'=>'19:43:30'),
			'81'=>array('start'=>'19:43:30','end'=>'19:48:30'),
			'82'=>array('start'=>'19:48:30','end'=>'19:53:30'),
			'83'=>array('start'=>'19:53:30','end'=>'19:58:30'),

			'84'=>array('start'=>'19:58:30','end'=>'20:03:30'),
			'85'=>array('start'=>'20:03:30','end'=>'20:08:30'),
			'86'=>array('start'=>'20:08:30','end'=>'20:13:30'),
			'87'=>array('start'=>'20:13:30','end'=>'20:18:30'),
			'88'=>array('start'=>'20:18:30','end'=>'20:23:30'),
			'89'=>array('start'=>'20:23:30','end'=>'20:28:30'),
			'90'=>array('start'=>'20:28:30','end'=>'20:33:30'),
			'91'=>array('start'=>'20:33:30','end'=>'20:38:30'),
			'92'=>array('start'=>'20:38:30','end'=>'20:43:30'),
			'93'=>array('start'=>'20:43:30','end'=>'20:48:30'),
			'94'=>array('start'=>'20:48:30','end'=>'20:53:30'),
			'95'=>array('start'=>'20:53:30','end'=>'20:58:30'),
			'96'=>array('start'=>'20:58:30','end'=>'21:03:30'),
			'97'=>array('start'=>'21:03:30','end'=>'21:08:30'),
			'98'=>array('start'=>'21:08:30','end'=>'21:13:30'),
			'99'=>array('start'=>'21:13:30','end'=>'21:18:30'),
			'100'=>array('start'=>'21:18:30','end'=>'21:23:30'),
			'101'=>array('start'=>'21:23:30','end'=>'21:28:30'),
			'102'=>array('start'=>'21:28:30','end'=>'21:33:30'),
			'103'=>array('start'=>'21:33:30','end'=>'21:38:30'),
			'104'=>array('start'=>'21:38:30','end'=>'21:43:30'),
			'105'=>array('start'=>'21:43:30','end'=>'21:48:30'),
			'106'=>array('start'=>'21:48:30','end'=>'21:53:30'),
			'107'=>array('start'=>'21:53:30','end'=>'21:58:30'),
			'108'=>array('start'=>'21:58:30','end'=>'22:03:30'),
			'109'=>array('start'=>'22:03:30','end'=>'22:08:30'),
			'110'=>array('start'=>'22:08:30','end'=>'22:13:30'),
			'111'=>array('start'=>'22:13:30','end'=>'22:18:30'),
			'112'=>array('start'=>'22:18:30','end'=>'22:23:30'),
			'113'=>array('start'=>'22:23:30','end'=>'22:28:30'),
			'114'=>array('start'=>'22:28:30','end'=>'22:33:30'),
			'115'=>array('start'=>'22:33:30','end'=>'22:38:30'),
			'116'=>array('start'=>'22:38:30','end'=>'22:43:30'),
			'117'=>array('start'=>'22:43:30','end'=>'22:48:30'),
			'118'=>array('start'=>'22:48:30','end'=>'22:53:30'),
			'119'=>array('start'=>'22:53:30','end'=>'22:58:30'),
			'120'=>array('start'=>'22:58:30','end'=>'23:03:30'),
			'121'=>array('start'=>'23:03:30','end'=>'23:08:30'),
			'122'=>array('start'=>'23:08:30','end'=>'23:13:30'),
			'123'=>array('start'=>'23:13:30','end'=>'23:18:30'),
			'124'=>array('start'=>'23:18:30','end'=>'23:23:30'),
			'125'=>array('start'=>'23:23:30','end'=>'23:28:30'),
			'126'=>array('start'=>'23:28:30','end'=>'23:33:30'),
			'127'=>array('start'=>'23:33:30','end'=>'23:38:30'),
			'128'=>array('start'=>'23:38:30','end'=>'23:43:30'),
			'129'=>array('start'=>'23:43:30','end'=>'23:48:30'),
			'130'=>array('start'=>'23:48:30','end'=>'23:53:30'),
			'131'=>array('start'=>'23:53:30','end'=>'23:58:30'),
			'132'=>array('start'=>'23:58:30','end'=>'00:03:30'),
			'133'=>array('start'=>'00:03:30','end'=>'00:08:30'),
			'134'=>array('start'=>'00:08:30','end'=>'00:13:30'),
			'135'=>array('start'=>'00:13:30','end'=>'00:18:30'),
			'136'=>array('start'=>'00:18:30','end'=>'00:23:30'),
			'137'=>array('start'=>'00:23:30','end'=>'00:28:30'),
			'138'=>array('start'=>'00:28:30','end'=>'00:33:30'),
			'139'=>array('start'=>'00:33:30','end'=>'00:38:30'),
			'140'=>array('start'=>'00:38:30','end'=>'00:43:30'),
			'141'=>array('start'=>'00:43:30','end'=>'00:48:30'),
			'142'=>array('start'=>'00:48:30','end'=>'00:53:30'),
			'143'=>array('start'=>'00:53:30','end'=>'00:58:30'),
			'144'=>array('start'=>'00:58:30','end'=>'01:03:30'),
			'145'=>array('start'=>'01:03:30','end'=>'01:08:30'),
			'146'=>array('start'=>'01:08:30','end'=>'01:13:30'),
			'147'=>array('start'=>'01:13:30','end'=>'01:18:30'),
			'148'=>array('start'=>'01:18:30','end'=>'01:23:30'),
			'149'=>array('start'=>'01:23:30','end'=>'01:28:30'),
			'150'=>array('start'=>'01:28:30','end'=>'01:33:30'),
			'151'=>array('start'=>'01:33:30','end'=>'01:38:30'),
			'152'=>array('start'=>'01:38:30','end'=>'01:43:30'),
			'153'=>array('start'=>'01:43:30','end'=>'01:48:30'),
			'154'=>array('start'=>'01:48:30','end'=>'01:53:30'),
			'155'=>array('start'=>'01:53:30','end'=>'01:58:30'),
			'156'=>array('start'=>'01:58:30','end'=>'02:03:30'),
			'157'=>array('start'=>'02:03:30','end'=>'02:08:30'),
			'158'=>array('start'=>'02:08:30','end'=>'02:13:30'),
			'159'=>array('start'=>'02:13:30','end'=>'02:18:30'),
			'160'=>array('start'=>'02:18:30','end'=>'02:23:30'),
			'161'=>array('start'=>'02:23:30','end'=>'02:28:30'),
			'162'=>array('start'=>'02:28:30','end'=>'02:33:30'),
			'163'=>array('start'=>'02:33:30','end'=>'02:38:30'),
			'164'=>array('start'=>'02:38:30','end'=>'02:43:30'),
			'165'=>array('start'=>'02:43:30','end'=>'02:48:30'),
			'166'=>array('start'=>'02:48:30','end'=>'02:53:30'),
			'167'=>array('start'=>'02:53:30','end'=>'02:58:30'),
			'168'=>array('start'=>'02:58:30','end'=>'03:03:30'),
			'169'=>array('start'=>'03:03:30','end'=>'03:08:30'),
			'170'=>array('start'=>'03:08:30','end'=>'03:13:30'),
			'171'=>array('start'=>'03:13:30','end'=>'03:18:30'),
			'172'=>array('start'=>'03:18:30','end'=>'03:23:30'),
			'173'=>array('start'=>'03:23:30','end'=>'03:28:30'),
			'174'=>array('start'=>'03:28:30','end'=>'03:33:30'),
			'175'=>array('start'=>'03:33:30','end'=>'03:38:30'),
			'176'=>array('start'=>'03:38:30','end'=>'03:43:30'),
			'177'=>array('start'=>'03:43:30','end'=>'03:48:30'),
			'178'=>array('start'=>'03:48:30','end'=>'03:53:30'),
			'179'=>array('start'=>'03:53:30','end'=>'03:58:30'),
			'180'=>array('start'=>'03:58:30','end'=>'04:03:30'),
		);
		ksort($draws);
		foreach($draws as $k=>$v){
			if($nowtime>strtotime($v['start']) && $nowtime<=strtotime($v['end'])){
				$nowqihao = str_pad($k,3,0,STR_PAD_LEFT);
			}
		}
		if(time()<strtotime("00:03:30")){
				$nowqihao = "132";
		}
		
		//时间数据
			if(!$nowqihao){
				if(false){
				$nowqihao = str_pad(132,3,0,STR_PAD_LEFT);
				$preqihao = str_pad(131,3,0,STR_PAD_LEFT);
				}else{
				$nowqihao = str_pad(001,3,0,STR_PAD_LEFT);
				$preqihao = str_pad(180,3,0,STR_PAD_LEFT);
				}

				if($nowtime > strtotime("00:00:00")){
					$qtime = $nowtime;
				}else{
					$qtime = $nowtime;
				}
				$gtime1 = $nowtime;
				$gtime2 = $nowtime + 86400;
				if(false){
				$nowdraws = [
					'expect'  => date('Ymd',$qtime).$nowqihao,
					'start'   => date('Y-m-d',$gtime1).' '.$draws[132]['start'],
					'end'     => date('Y-m-d',$gtime2).' '.$draws[132]['end']
				];
				
				$predraws = [
					'expect'  => date('ymd',$qtime).$preqihao,
					'start'   => date('Y-m-d',$gtime1).' '.$draws[131]['start'],
					'end'     => date('Y-m-d',$gtime1).' '.$draws[131]['end'],
				];
				}else{
					$nowdraws = [
					'expect'  => date('Ymd',$qtime).$nowqihao,
					'start'   => date('Y-m-d',$gtime1).' '.$draws[1]['start'],
					'end'     => date('Y-m-d',$gtime2).' '.$draws[1]['end']
				];
				
				$predraws = [
					// 'expect'  => date('ymd',$qtime - 86400).$preqihao,
					'expect' => date('Ymd',$qtime - 86400).$preqihao,
					'start'   => date('Y-m-d',$gtime1).' '.$draws[1]['start'],
					'end'     => date('Y-m-d',$gtime1).' '.$draws[180]['end'],
				];
				}


				


			}else{
				$nowqihao = str_pad($nowqihao,3,0,STR_PAD_LEFT);
				$preqihao = str_pad($nowqihao-1,3,0,STR_PAD_LEFT);;
				
				if($nowtime < strtotime("04:05:00")){
					$gtime = date('Y-m-d',$nowtime - 86400);
				}else{
					$gtime = date('Y-m-d',$nowtime);
				}
				
				$nowdraws = [
					'expect'  => date('Ymd',strtotime($gtime)).$nowqihao,
					'start'   => date('Y-m-d',$nowtime).' '.$draws[intval($nowqihao)]['start'],
					'end'     => date('Y-m-d',$nowtime).' '.$draws[intval($nowqihao)]['end']
				];
				
				$predraws = [
					'expect' => date('Ymd',strtotime($gtime)).$preqihao,
					'start'  => date('Y-m-d',$nowtime).' '.$draws[intval($preqihao)]['start'],
					'end'    => date('Y-m-d',$nowtime).' '.$draws[intval($preqihao)]['end'],
				];
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