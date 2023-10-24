<?php
namespace Lib\lotterytimes;
class jssc{
    /**
    function drawtimes(){
        $name = 'jssc';
        $cjnowtime = cjnowtime($name);
        $nowtime = time() + $cjnowtime;
        $total  = 1152;
        $openstart  = '00:00:33';
        $jgtime = 75;
        $yctime = 0;
        $_yct = ceil($yctime/$total);

        $_start_t = strtotime(date('Y-m-d', time()));
        $_day = (($_start_t - strtotime('2018-10-20')) / 3600 / 24);

        //计算当天的时间间隔
        for($i=1;$i<=$total;$i++){
            $start = strtotime($openstart)-$jgtime + ($i-1)*$jgtime;
            $end = strtotime($openstart)+($i-1)*$jgtime;
            $draws[$i] = array('start'=>date('H:i:s',$start),'end'=>date('H:i:s',$end));
        }
        $draws[1]['start'] = date('Y-m-d H:i:s',strtotime($draws[$total]['end'])-86400);
        foreach($draws as $k=>$v){
            if($nowtime>strtotime($v['start']) && $nowtime<=strtotime($v['end'])){
                $nowqihao = str_pad($k,4,0,STR_PAD_LEFT);//计算是当天的第多少期
            }
        }

        if(!$nowqihao){
            $nowqihao = str_pad(1,4,0,STR_PAD_LEFT);
            $actionNo = $total*$_day + intval($nowqihao) + 30828752;
            $draws[1]['start']   = date('Y-m-d H:i:s',strtotime($draws[$total]['end']));
            $draws[1]['end']   = date('Y-m-d H:i:s',strtotime($draws[1]['end'])+86400);
            $nowdraws = [
                'expect'  => $actionNo,
                'start'   => $draws[1]['start'],
                'end'     => $draws[1]['end']
            ];
            $preqihao = str_pad($total,4,0,STR_PAD_LEFT);
            $predraws = [
                'expect' => $actionNo-1,
                'start'  => date('Y-m-d H:i:s',strtotime($draws[$total]['start'])),
                'end'    => date('Y-m-d H:i:s',strtotime($draws[$total]['end'])),
            ];
        }else{
            $nowqihao = str_pad($nowqihao,4,0,STR_PAD_LEFT);
            $actionNo = $total * $_day + intval($nowqihao) + 30828752;

            $nowdraws = [
                'expect'  => $actionNo,
                'start'   => date('Y-m-d',$nowtime).' '.$draws[intval($nowqihao)]['start'],
                'end'     => date('Y-m-d',$nowtime).' '.$draws[intval($nowqihao)]['end']
            ];
            if(intval($nowqihao)==1){
                $preqihao = $actionNo-1;
                $nowexpecttime = strtotime($draws[$total]['end'])-86400;
                $predraws = [
                    'expect' => $preqihao,
                    'start'  => date('Y-m-d',$nowexpecttime).' '.$draws[intval($preqihao)]['start'],
                    'end'    => date('Y-m-d',$nowexpecttime).' '.$draws[intval($preqihao)]['end'],
                ];
            }else{
                $preqihao = $actionNo-1;
                $predraws = [
                    'expect' => $preqihao,
                    'start'  => date('Y-m-d',$nowtime).' '.$draws[intval($preqihao)]['start'],
                    'end'    => date('Y-m-d',$nowtime).' '.$draws[intval($preqihao)]['end'],
                ];
            }
        }
        $return = [
            'lastFullExpect'  => $predraws['expect'],
            'lastExpect'      => str_pad($nowqihao-1,4,0,STR_PAD_LEFT),
            'currFullExpect'  => $nowdraws['expect'],
            'currExpect'      => str_pad($nowqihao,4,0,STR_PAD_LEFT),
            'remainTime'      => abs(strtotime($nowdraws['end']))-time()-$cjnowtime,
            'openRemainTime'  => $cjnowtime,
        ];
        return $return;
    }**/

    function drawtimes(){
        $name = 'jssc';
        $nowtime = time();
        $cplist = C('cplist.pk10');
        $cpinfo   = $cplist[$name]; //彩种名称
        $cjnowtime = $cpinfo['ftime']; //停止投注时间
        if(!$cpinfo){
            echo json_encode(['sign'=>false,'message'=>'彩种不存在'], JSON_UNESCAPED_UNICODE);exit;
        }
        $expecttime = $cpinfo['expecttime']; //分钟数
        $_expecttime = $expecttime*300;      //每期秒数
        $totalopentimes = 86400-0;
        $totalcount     = floor(abs(strtotime($cpinfo['closetime2'])-strtotime($cpinfo['closetime1']))/$_expecttime);//期数
        $_length        = $totalcount>=1000?4:3;
        $jgtime = $expecttime*60;
        //$actNo_t = (time()-strtotime(date('Y-m-d 00:00:00',time()))+$cjnowtime)/$_expecttime;
        $_t = time();
        $_t1 = strtotime(date('Y-m-d '.$cpinfo['closetime1'],time()));
        $_t2 = strtotime(date('Y-m-d '.$cpinfo['closetime2'],time()));
        if($_t<$_t1){
            $actNo_t = $totalcount;
        }else{
            $actNo_t = (time()-strtotime(date('Y-m-d '.$cpinfo['closetime1'],time()))+$cjnowtime)/$_expecttime;
        }
        $actNo_t = floor($actNo_t);
        $actNo =  is_numeric($actNo_t)?($actNo_t==$totalcount?1:$actNo_t+1):ceil( $actNo_t );
        $nowdraws = [
            'expect'  => date('Ymd') . str_pad($actNo,$_length,0,STR_PAD_LEFT),
            'start'   => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) + ($actNo-1)*$_expecttime ),
            'end'     => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) + $actNo*$_expecttime ),
        ];
        if(intval($actNo)==1){
            $nowdraws = [
                'expect'  => date('Ymd') . str_pad($actNo,$_length,0,STR_PAD_LEFT),
                'start'   => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) ),
                'end'     => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) + $_expecttime ),
            ];
            $preqihao = str_pad($totalcount,$_length,0,STR_PAD_LEFT);
            $predraws = [
                'expect' => date('Ymd',strtotime($nowdraws['end'])-86400).$preqihao,
                'start'  => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time()))-$jgtime ),
                'end'    => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) ),
            ];
        }else{
            $preqihao = str_pad($actNo-1,$_length,0,STR_PAD_LEFT);
            $predraws = [
                'expect' => date('Ymd',strtotime($nowdraws['end'])).$preqihao,
                'start'  => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) + ($actNo-2)*($expecttime*60) ),
                'end'    => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) + ($actNo-1)*($expecttime*60) ),
            ];
        }
        if($actNo>=$totalcount){
            if($_t<$_t1){//2day
                $nowdraws = [
                    'expect'  => date('Ymd') . str_pad($totalcount,$_length,0,STR_PAD_LEFT),
                    'start'   => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) ),
                    'end'     => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) + $_expecttime ),
                ];
                $preqihao = str_pad($totalcount,$_length,0,STR_PAD_LEFT);
                $predraws = [
                    'expect' => date('Ymd',strtotime($nowdraws['end'])-86400).$preqihao,
                    'start'  => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time()))-$jgtime ),
                    'end'    => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) ),
                ];
            }else{
                $nowdraws = [
                    'expect'  => date('Ymd',time()+86400) . str_pad(1,$_length,0,STR_PAD_LEFT),
                    'start'   => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime2'],time())) ),
                    'end'     => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime1'],time())) + $_expecttime+86400 ),
                ];
                $preqihao = str_pad($totalcount,$_length,0,STR_PAD_LEFT);
                $predraws = [
                    'expect' => date('Ymd',strtotime($nowdraws['end'])-86400).$preqihao,
                    'start'  => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime2'],time()))-$jgtime ),
                    'end'    => date('Y-m-d H:i:s', strtotime(date('Y-m-d '.$cpinfo['closetime2'],time())) ),
                ];
            }
        }
        $return = [
            'lastFullExpect'  => $predraws['expect'],
            'lastExpect'      => substr($predraws['expect'],-$_length),
            'currFullExpect'  => $nowdraws['expect'],
            'currExpect'      => substr($nowdraws['expect'],-$_length),
            'remainTime'      => strtotime($nowdraws['end'])-$nowtime-$cjnowtime,
            'openRemainTime'  => $cjnowtime,
        ];
        return $return;
    }
}