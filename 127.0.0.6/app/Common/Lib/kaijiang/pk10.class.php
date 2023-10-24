<?php
namespace Lib\kaijiang;
class pk10{
	/*
	** 二维数组
	** $params 二维数组
	** 字段列表 必须包含
	** typeid 彩票种类（ssc,k3,Game,kl10f,pk10,keno,xy28）
	** playid 玩法标识
	** opencode 开奖号码
	** tzcode 投注号码
	*/
	function __construct($params = []){
		$this->params = $params;
	}
	function check(){
		$params = $this->params;
		foreach($params as $pk=>$param){
			$playid = '';
			$playid = $param['playid'];
			$zjcount = 0;
			if(method_exists($this,$playid)){
				$zjcount = self::$playid($param['opencode'],$param['tzcode']);
			}
			$param['zjcount'] = $zjcount;
			$params[$pk] = $param;
		}
		return $params;
	}
	//前一复式
	 function bjpk10qian1($opencode,$tzcode){
		$opencodes = array_slice(explode(',',$opencode),0,1);
		$tzcodes   = explode(',',$tzcode);
		$zjcount   = 0;
		if(in_array($opencodes[0],$tzcodes)){
			$zjcount++;
		}
		return $zjcount;
	}
	/*
    ** 前二复式
    */
	 function bjpk10qian2($opencode,$tzcode){
		$opencodes = array_slice(explode(',',$opencode),0,2);
		$tzcodes   = explode('|',$tzcode);
		$as        = explode(',',$tzcodes[0]);
		$bs        = explode(',',$tzcodes[1]);
		$zjcount   = 0;
		if(in_array($opencodes[0],$as) && in_array($opencodes[1],$bs)){
			$zjcount++;
		}
		return $zjcount;
	}
	/*
    ** 前二单式
    */
	 function bjpk10qian2ds($opencode,$tzcode){
		$opencode = implode(',',array_slice(explode(',',$opencode),0,2));
		$zjcount   = 0;
		$zjcount   = substr_count($tzcode,$opencode);
		return $zjcount;
	}
	/*
    ** 前三复式
    */
	 function bjpk10qian3($opencode,$tzcode){
		$opencodes = array_slice(explode(',',$opencode),0,3);
		$tzcodes   = explode('|',$tzcode);
		$zjcount   = 0;
		if(in_array($opencodes[0],explode(',',$tzcodes[0])) && in_array($opencodes[1],explode(',',$tzcodes[1])) && in_array($opencodes[2],explode(',',$tzcodes[2]))){
			$zjcount++;
		}
		return $zjcount;
	}
	/*
    ** 前三单式
     *  $opencode="10,1,4,8,6,3,9,5,2,7
     * $tzcode="10,01,04|10,04,01|06,04,09"
    */
	 function bjpk10qian3ds($opencode,$tzcode){
		$opencode = implode(',',array_slice(explode(',',$opencode),0,3));
		$zjcount   = 0;
		$zjcount   = substr_count($tzcode,$opencode);
		return $zjcount;
	}


	/*
    ** 前四复式
    */
	 function bjpk10qian4($opencode,$tzcode){
		$opencodes = array_slice(explode(',',$opencode),0,4);
		$tzcodes   = explode('|',$tzcode);
		$zjcount   = 0;
		if(in_array($opencodes[0],explode(',',$tzcodes[0])) && in_array($opencodes[1],explode(',',$tzcodes[1])) && in_array($opencodes[2],explode(',',$tzcodes[2])) && in_array($opencodes[3],explode(',',$tzcodes[3]))){
			$zjcount++;
		}
		return $zjcount;
	}
	/*
    ** 前四单式
     *  $opencode="10,1,4,8,6,3,9,5,2,7
     * $tzcode="10,01,04,06|10,04,01,08|06,04,09,07"
    */
	 function bjpk10qian4ds($opencode,$tzcode){
		$opencode = implode(',',array_slice(explode(',',$opencode),0,4));
		$zjcount   = 0;
		$zjcount   = substr_count($tzcode,$opencode);
		return $zjcount;
	}


	/*
	** 前五复式
	*/
	 function bjpk10qian5($opencode,$tzcode){
		$opencodes = array_slice(explode(',',$opencode),0,5);
		$tzcodes   = explode('|',$tzcode);
		$zjcount   = 0;
		if(in_array($opencodes[0],explode(',',$tzcodes[0])) && in_array($opencodes[1],explode(',',$tzcodes[1])) && in_array($opencodes[2],explode(',',$tzcodes[2])) && in_array($opencodes[3],explode(',',$tzcodes[3])) && in_array($opencodes[4],explode(',',$tzcodes[4]))){
			$zjcount++;
		}
		return $zjcount;
	}
	/*
    ** 前五单式
     *  $opencode="01,06,04,10,05,08,09,03,07,02
     * $tzcode="10,01,04,06|10,04,01,08|06,04,09,07"
    */
	 function bjpk10qian5ds($opencode,$tzcode){
		$opencode = implode(',',array_slice(explode(',',$opencode),0,5));
		$zjcount   = 0;
		$zjcount   = substr_count($tzcode,$opencode);
		return $zjcount;
	}
	/*
	** 定位胆
	*/
	 function bjpk10dwd($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = explode('|',$tzcode);
		$zjcount   = 0;
		if(in_array($opencodes[0],explode(',',$tzcodes[0]))){
			$zjcount++;
		}
		if(in_array($opencodes[1],explode(',',$tzcodes[1]))){
			$zjcount++;
		}
		if(in_array($opencodes[2],explode(',',$tzcodes[2]))){
			$zjcount++;
		}
		if(in_array($opencodes[3],explode(',',$tzcodes[3]))){
			$zjcount++;
		}
		if(in_array($opencodes[4],explode(',',$tzcodes[4]))){
			$zjcount++;
		}
		if(in_array($opencodes[5],explode(',',$tzcodes[5]))){
			$zjcount++;
		}
		if(in_array($opencodes[6],explode(',',$tzcodes[6]))){
			$zjcount++;
		}
		if(in_array($opencodes[7],explode(',',$tzcodes[7]))){
			$zjcount++;
		}
		if(in_array($opencodes[8],explode(',',$tzcodes[8]))){
			$zjcount++;
		}
		if(in_array($opencodes[9],explode(',',$tzcodes[9]))){
			$zjcount++;
		}
		return $zjcount;
	}
	// 大小第一名
	 function bjpk10dxdy($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[0]>=6){
			$bigsmall = '大';
		}else{
			$bigsmall = '小';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 大小第二名
	 function bjpk10dxde($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[1]>=6){
			$bigsmall = '大';
		}else{
			$bigsmall = '小';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 大小第三名
	 function bjpk10dxds($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[2]>=6){
			$bigsmall = '大';
		}else{
			$bigsmall = '小';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 单双第一名
	 function bjpk10dsdy($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[0]%2==0){
			$bigsmall = '双';
		}else{
			$bigsmall = '单';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 单双第二名
	 function bjpk10dsde($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[1]%2==0){
			$bigsmall = '双';
		}else{
			$bigsmall = '单';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 单双第三名
	 function bjpk10dsds($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[2]%2==0){
			$bigsmall = '双';
		}else{
			$bigsmall = '单';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 龙虎第一名
	 function bjpk10lhdy($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[0]>$opencodes[9]){
			$bigsmall = '龙';
		}else{
			$bigsmall = '虎';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 龙虎第二名
	 function bjpk10lhde($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[1]>$opencodes[8]){
			$bigsmall = '龙';
		}else{
			$bigsmall = '虎';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}
	// 龙虎第三名
	 function bjpk10lhds($opencode,$tzcode){
		$opencodes = explode(',',$opencode);
		$tzcodes   = array_unique(explode(',',$tzcode));
		$bigsmall = '';
		$zjcount = 0;
		if($opencodes[2]>$opencodes[7]){
			$bigsmall = '龙';
		}else{
			$bigsmall = '虎';
		}
		if(in_array($bigsmall,$tzcodes)){
			$zjcount = 1;
		}
		return $zjcount;
	}

	// 阶乘
	function factorial($n) {
		return array_product(range(1, $n));
	}

	// 排列数
	function A($n, $m) {
		return self::factorial($n)/self::factorial($n-$m);
	}

	// 组合数
	function C($n, $m) {
		return self::A($n, $m)/self::factorial($m);
	}
	// 排列
	function arrangement($a, $m) {
		$r = array();

		$n = count($a);
		if ($m <= 0 || $m > $n) {
			return $r;
		}

		for ($i=0; $i<$n; $i++) {
			$b = $a;
			$t = array_splice($b, $i, 1);
			if ($m == 1) {
				$r[] = $t;
			} else {
				$c = self::arrangement($b, $m-1);
				foreach ($c as $v) {
					$r[] = array_merge($t, $v);
				}
			}
		}

		return $r;
	}
	// 组合
	function combination($a, $m) {
		$r = array();

		$n = count($a);
		if ($m <= 0 || $m > $n) {
			return $r;
		}

		for ($i=0; $i<$n; $i++) {
			$t = array($a[$i]);
			if ($m == 1) {
				$r[] = $t;
			} else {
				$b = array_slice($a, $i+1);
				$c = self::combination($b, $m-1);
				foreach ($c as $v) {
					$r[] = array_merge($t, $v);
				}
			}
		}

		return $r;
	}

    /**
     * 两面盘玩法 大
     * @param $opencodes 开奖号码
     * @param $tzcode 投注号码
     * @param $key 投注的第几球
     * @return int 中奖注数
     */
    function da($opencodes,$tzcode,$key){
        $zjcount = 0;
        if($tzcode!="大")return $zjcount;
        if(intval($opencodes[$key-1])>=6){
            $zjcount++;
        }
        return $zjcount;
    }

    /**
     * 两面盘玩法 小
     * @param $opencodes 开奖号码
     * @param $tzcode 投注号码
     * @param $key 投注的第几球
     * @return int 中奖注数
     */
    function xiao($opencodes,$tzcode,$key){
        $zjcount = 0;
        if($tzcode!="小")return $zjcount;
        if(intval($opencodes[$key-1])<=5){
            $zjcount++;
        }
        return $zjcount;
    }

    /**
     * 两面盘玩法 单
     * @param $opencodes 开奖号码
     * @param $tzcode 投注号码
     * @param $key 投注的第几球
     * @return int 中奖注数
     */
    function dan($opencodes,$tzcode,$key){
        $zjcount = 0;
        if($tzcode!="单")return $zjcount;
        if(intval($opencodes[$key-1])%2==1){
            $zjcount++;
        }
        return $zjcount;
    }

    /**
     * 两面盘玩法 双
     * @param $opencodes 开奖号码
     * @param $tzcode 投注号码
     * @param $key 投注的第几球
     * @return int 中奖注数
     */
    function shuang($opencodes,$tzcode,$key){
        $zjcount = 0;
        if($tzcode!="双")return $zjcount;
        if(intval($opencodes[$key-1])%2==0){
            $zjcount++;
        }
        return $zjcount;
    }

    /**
     * 两面盘玩法 龙
     * @param $opencodes 开奖号码
     * @param $tzcode 投注号码
     * @param $key 投注的第几球
     * @return int 中奖注数
     */
    function long($opencodes,$tzcode,$key){
        $zjcount = 0;
        if($tzcode!="龙")return $zjcount;
        if(intval($opencodes[$key-1]) > intval($opencodes[10-$key])) $zjcount++;
        return $zjcount;
    }

    /**
     * 两面盘玩法 双
     * @param $opencodes 开奖号码
     * @param $tzcode 投注号码
     * @param $key 投注的第几球
     * @return int 中奖注数
     */
    function hu($opencodes,$tzcode,$key){
        $zjcount = 0;
        if($tzcode!="虎")return $zjcount;
        if(intval($opencodes[$key-1]) < intval($opencodes[10-$key])) $zjcount++;
        return $zjcount;
    }

    /**
     * 冠亚和玩法
     * @param $opencodes 开奖号码数组
     * @param $tzcode 投注号码
     * @param $sum 总和
     * @return int 中奖注数
     */
    function gyh($opencodes,$tzcode,$sum){
        $zjcount = 0;
        if($tzcode != $sum) return $zjcount;
        $gyh_sum = intval($opencodes[0]) + intval($opencodes[1]);
        if($gyh_sum == $sum){
            $zjcount++;
        }
        return $zjcount;
    }

    /**
     * 一 至 十 玩法
     * @param $opencode
     * @param $tzcode
     * @param $num
     * @return int
     */
    function yzwm($opencode,$tzcode,$num){
        $zjcount = 0;
        if($tzcode != $num) return $zjcount;
        if(intval($opencode) == $tzcode) $zjcount++;
        return $zjcount;
    }

    /**
     * 冠亚和 大 玩法
     * @param $opencodes
     * @param $tzcode
     * @return int
     */
    function gyh_da($opencodes,$tzcode){
        $zjcount = 0;
        if($tzcode != '大') return $zjcount;
        $sum = intval($opencodes[0]) + intval($opencodes[1]);
        if($sum > 11) $zjcount++;
        return $zjcount;
    }

    /**
     * 冠亚和 小 玩法
     * @param $opencodes
     * @param $tzcode
     * @return int
     */
    function gyh_xiao($opencodes,$tzcode){
        $zjcount = 0;
        if($tzcode != '小') return $zjcount;
        $sum = intval($opencodes[0]) + intval($opencodes[1]);
        if($sum <= 11) $zjcount++;
        return $zjcount;
    }

    /**
     * 冠亚和 单 玩法
     * @param $opencodes
     * @param $tzcode
     * @return int
     */
    function gyh_dan($opencodes,$tzcode){
        $zjcount = 0;
        if($tzcode != '单') return $zjcount;
        $sum = intval($opencodes[0]) + intval($opencodes[1]);
        if($sum%2 == 1) $zjcount++;
        return $zjcount;
    }

    /**
     * 冠亚和 双 玩法
     * @param $opencodes
     * @param $tzcode
     * @return int
     */
    function gyh_shuang($opencodes,$tzcode){
        $zjcount = 0;
        if($tzcode != '双') return $zjcount;
        $sum = intval($opencodes[0]) + intval($opencodes[1]);
        if($sum%2 == 0) $zjcount++;
        return $zjcount;
    }
}
?>