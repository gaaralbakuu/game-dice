<?php
namespace Lib\lotterytimes;
class lhc {
  function drawtimes(){
    $name = 'lhc';
    $cjnowtime = cjnowtime($name);
    $res = M('kaijiang')->where(array('name'=>'lhc'))->order('expect desc')->find();
      
// {"lastFullExpect":2019122,"lastExpect":"122","currFullExpect":2019123,"currExpect":"123","remainTime":297257,"openRemainTime":300}
    $return = [
      'lastFullExpect'  => $res['expect'],
      'lastExpect'      => substr($res['expect'],-3),
      'currFullExpect'  => $res['expect']+1,
      'currExpect'      => substr($res['expect']+1+"",-3),
      'remainTime'      => $res['drawtime']-time()-$cjnowtime,
      'openRemainTime'  => $cjnowtime,
    ];
    file_put_contents("rr.txt", json_encode($return));
    return $return;
  }
}
?>