<?php

namespace Lib\yzwanfa;
class pk10
{
    /*
    ** 二维数组
    ** $params 二维数组
    ** 字段列表 必须包含
    ** typeid 彩票种类（ssc,k3,Game,kl10f,pk10,keno,xy28）
    ** playid 玩法标识
    ** tzcode 投注号码
    */

    public $balld = [];
    public $ballt = [];
    public $d_balls = array();
    public $t_balls = array();
    public $d_count;
    public $t_count;
    public $itemcount;
    public $ballF = null;
    public $ballS = null;
    public $ballT = null;
    public $ballSi = null;
    public $ballWu = null;
    public $selected_f_ball_array = [];
    public $selected_s_ball_array = [];
    public $selected_t_ball_array = [];
    public $selected_si_ball_array = [];
    public $selected_wu_ball_array = [];
    public $b;

    function __construct($params = [])
    {
        $this->params = $params;
    }

    function checkzhushu($playid, $tzcode)
    {
        $ds = ['bjpk10qian2ds', 'bjpk10qian3ds', 'bjpk10qian4ds', 'bjpk10qian5ds'];
        $xyp = [
            'lmp_d1m_da','lmp_d1m_xiao','lmp_d1m_dan','lmp_d1m_shuang','lmp_d1m_long','lmp_d1m_hu',
            'lmp_d2m_da','lmp_d2m_xiao','lmp_d2m_dan','lmp_d2m_shuang','lmp_d2m_long','lmp_d2m_hu',
            'lmp_d3m_da','lmp_d3m_xiao','lmp_d3m_dan','lmp_d3m_shuang','lmp_d3m_long','lmp_d3m_hu',
            'lmp_d4m_da','lmp_d4m_xiao','lmp_d4m_dan','lmp_d4m_shuang','lmp_d4m_long','lmp_d4m_hu',
            'lmp_d5m_da','lmp_d5m_xiao','lmp_d5m_dan','lmp_d5m_shuang','lmp_d5m_long','lmp_d5m_hu',
            'lmp_d6m_da','lmp_d6m_xiao','lmp_d6m_dan','lmp_d6m_shuang','lmp_d6m_long','lmp_d6m_hu',
            'lmp_d7m_da','lmp_d7m_xiao','lmp_d7m_dan','lmp_d7m_shuang','lmp_d7m_long','lmp_d7m_hu',
            'lmp_d8m_da','lmp_d8m_xiao','lmp_d8m_dan','lmp_d8m_shuang','lmp_d8m_long','lmp_d8m_hu',
            'lmp_d9m_da','lmp_d9m_xiao','lmp_d9m_dan','lmp_d9m_shuang','lmp_d9m_long','lmp_d9m_hu',
            'lmp_d10m_da','lmp_d10m_xiao','lmp_d10m_dan','lmp_d10m_shuang','lmp_d10m_long','lmp_d10m_hu',
            'gyh_hm3','gyh_hm10','gyh_hm17','gyh_hm4','gyh_hm11','gyh_hm18','gyh_hm5','gyh_hm12','gyh_hm19','gyh_hm6','gyh_hm13','gyh_da','gyh_hm7','gyh_hm14','gyh_xiao','gyh_hm8','gyh_hm15','gyh_dan','gyh_hm9','gyh_hm16','gyh_shuang',
            'yzwm_d1m_hm1','yzwm_d1m_hm2','yzwm_d1m_hm3','yzwm_d1m_hm4','yzwm_d1m_hm5','yzwm_d1m_hm6','yzwm_d1m_hm7','yzwm_d1m_hm8','yzwm_d1m_hm9','yzwm_d1m_hm10',
            'yzwm_d2m_hm1','yzwm_d2m_hm2','yzwm_d2m_hm3','yzwm_d2m_hm4','yzwm_d2m_hm5','yzwm_d2m_hm6','yzwm_d2m_hm7','yzwm_d2m_hm8','yzwm_d2m_hm9','yzwm_d2m_hm10',
            'yzwm_d3m_hm1','yzwm_d3m_hm2','yzwm_d3m_hm3','yzwm_d3m_hm4','yzwm_d3m_hm5','yzwm_d3m_hm6','yzwm_d3m_hm7','yzwm_d3m_hm8','yzwm_d3m_hm9','yzwm_d3m_hm10',
            'yzwm_d4m_hm1','yzwm_d4m_hm2','yzwm_d4m_hm3','yzwm_d4m_hm4','yzwm_d4m_hm5','yzwm_d4m_hm6','yzwm_d4m_hm7','yzwm_d4m_hm8','yzwm_d4m_hm9','yzwm_d4m_hm10',
            'yzwm_d5m_hm1','yzwm_d5m_hm2','yzwm_d5m_hm3','yzwm_d5m_hm4','yzwm_d5m_hm5','yzwm_d5m_hm6','yzwm_d5m_hm7','yzwm_d5m_hm8','yzwm_d5m_hm9','yzwm_d5m_hm10',
            'yzwm_d6m_hm1','yzwm_d6m_hm2','yzwm_d6m_hm3','yzwm_d6m_hm4','yzwm_d6m_hm5','yzwm_d6m_hm6','yzwm_d6m_hm7','yzwm_d6m_hm8','yzwm_d6m_hm9','yzwm_d6m_hm10',
            'yzwm_d7m_hm1','yzwm_d7m_hm2','yzwm_d7m_hm3','yzwm_d7m_hm4','yzwm_d7m_hm5','yzwm_d7m_hm6','yzwm_d7m_hm7','yzwm_d7m_hm8','yzwm_d7m_hm9','yzwm_d7m_hm10',
            'yzwm_d8m_hm1','yzwm_d8m_hm2','yzwm_d8m_hm3','yzwm_d8m_hm4','yzwm_d8m_hm5','yzwm_d8m_hm6','yzwm_d8m_hm7','yzwm_d8m_hm8','yzwm_d8m_hm9','yzwm_d8m_hm10',
            'yzwm_d9m_hm1','yzwm_d9m_hm2','yzwm_d9m_hm3','yzwm_d9m_hm4','yzwm_d9m_hm5','yzwm_d9m_hm6','yzwm_d9m_hm7','yzwm_d9m_hm8','yzwm_d9m_hm9','yzwm_d9m_hm10',
            'yzwm_d10m_hm1','yzwm_d10m_hm2','yzwm_d10m_hm3','yzwm_d10m_hm4','yzwm_d10m_hm5','yzwm_d10m_hm6','yzwm_d10m_hm7','yzwm_d10m_hm8','yzwm_d10m_hm9','yzwm_d10m_hm10',
        ];
        //单式
        if (in_array($playid, $ds)) return $this->ds($tzcode);
        if(in_array($playid,$xyp)) return 1;
        return $this->$playid($tzcode);
    }


    //定位胆复式
    function bjpk10dwd($tzcode)
    {
        $tzcodes = explode('|', $tzcode);
        $tzcount = 0;
        foreach ($tzcodes as $v) {
            if (!empty($v)) {
                $tzcount += count(explode(',', $v));
            }
        }
        return $tzcount;
    }

    //猜前五
    function bjpk10qian5($tzcode)
    {
        if (count(explode('|', $tzcode)) != 5) return 0;
        $currNumber = $this->two($tzcode);
        $this->combineArrUpdataWu($currNumber);
        $itemcount = 0;
        if ($this->ballF >= 1 && $this->ballS >= 1 && $this->ballT >= 1 && $this->ballSi >= 1 && $this->ballWu >= 1) {
            $opFlag = false;

            for ($i = 0; $i < end($this->selected_f_ball_array) + 1; $i++) {

                $current_f_ball = $this->selected_f_ball_array[$i];

                if ($current_f_ball != "") {

                    for ($s = 0; $s < end($this->selected_s_ball_array) + 1; $s++) {

                        $current_s_ball = $this->selected_s_ball_array[$s];

                        if ($current_s_ball != "") {

                            if ($current_f_ball != $current_s_ball) {

                                for ($t = 0; $t < end($this->selected_t_ball_array) + 1; $t++) {

                                    $current_t_ball = $this->selected_t_ball_array[$t];

                                    if ($current_t_ball != "") {

                                        if ($current_t_ball != $current_s_ball && $current_t_ball != $current_f_ball) {

                                            for ($si = 0; $si < end($this->selected_si_ball_array) + 1; $si++) {

                                                $current_si_ball = $this->selected_si_ball_array[$si];

                                                if ($current_si_ball != '') {

                                                    if ($current_si_ball != $current_s_ball && $current_si_ball != $current_f_ball && $current_si_ball != $current_t_ball) {

                                                        for ($wu = 0; $wu < end($this->selected_wu_ball_array) + 1; $wu++) {

                                                            $current_wu_ball = $this->selected_wu_ball_array[$wu];

                                                            if ($current_wu_ball != '') {

                                                                if ($current_wu_ball != $current_s_ball && $current_wu_ball != $current_f_ball && $current_wu_ball != $current_t_ball && $current_wu_ball != $current_si_ball) {

                                                                    $itemcount = $itemcount + 1;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }
            }
        }
        return $itemcount;
    }

    //猜前四
    function bjpk10qian4($tzcode)
    {
        if (count(explode('|', $tzcode)) != 4) return 0;
        $currNumber = $this->two($tzcode);
        $this->combineArrUpdataWu($currNumber);
        $itemcount = 0;
        if ($this->ballF >= 1 && $this->ballS >= 1 && $this->ballT >= 1 && $this->ballSi >= 1) {

            $opFlag = false;

            for ($i = 0; $i < end($this->selected_f_ball_array) + 1; $i++) {

                $current_f_ball = $this->selected_f_ball_array[$i];

                if ($current_f_ball != "") {

                    for ($s = 0; $s < end($this->selected_s_ball_array) + 1; $s++) {

                        $current_s_ball = $this->selected_s_ball_array[$s];

                        if ($current_s_ball != "") {

                            if ($current_f_ball != $current_s_ball) {

                                for ($t = 0; $t < end($this->selected_t_ball_array) + 1; $t++) {

                                    $current_t_ball = $this->selected_t_ball_array[$t];

                                    if ($current_t_ball != "") {

                                        if ($current_t_ball != $current_s_ball && $current_t_ball != $current_f_ball) {

                                            for ($si = 0; $si < end($this->selected_si_ball_array) + 1; $si++) {

                                                $current_si_ball = $this->selected_si_ball_array[$si];

                                                if ($current_si_ball != '') {

                                                    if ($current_si_ball != $current_s_ball && $current_si_ball != $current_f_ball && $current_si_ball != $current_t_ball) {

                                                        $itemcount = $itemcount + 1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }
            }
        }
        return $itemcount;
    }

    //猜前三
    function bjpk10qian3($tzcode)
    {
        if (count(explode('|', $tzcode)) != 3) return 0;
        $currNumber = $this->two($tzcode);
        $this->combineArrUpdata($currNumber);
        $itemcount = 0;
        if ($this->ballF >= 1 && $this->ballS >= 1 && $this->ballT >= 1) {

            $opFlag = false;

            for ($i = 0; $i < end($this->selected_f_ball_array) + 1; $i++) {

                $current_f_ball = $this->selected_f_ball_array[$i];

                if ($current_f_ball != "") {

                    for ($s = 0; $s < end($this->selected_s_ball_array) + 1; $s++) {

                        $current_s_ball = $this->selected_s_ball_array[$s];

                        if ($current_s_ball != "") {

                            if ($current_f_ball != $current_s_ball) {

                                for ($t = 0; $t < end($this->selected_t_ball_array) + 1; $t++) {

                                    $current_t_ball = $this->selected_t_ball_array[$t];

                                    if ($current_t_ball != "") {

                                        if ($current_t_ball != $current_s_ball && $current_t_ball != $current_f_ball) {

                                            $itemcount = $itemcount + 1;

                                        }
                                    }
                                }
                            }
                        }

                    }
                }
            }
        }

        return $itemcount;
    }

    //猜前二
    function bjpk10qian2($tzcode)
    {
        if (count(explode('|', $tzcode)) != 2) return 0;
        $currNumber = $this->two($tzcode);
        $this->combineArrUpdata($currNumber);
        $itemcount = 0;
        if ($this->ballF >= 1 && $this->ballS >= 1) {

            $opFlag = false;

            for ($i = 0; $i < end($this->selected_f_ball_array) + 1; $i++) {

                $current_f_ball = $this->selected_f_ball_array[$i];

                if ($current_f_ball != "") {

                    for ($s = 0; $s < end($this->selected_s_ball_array) + 1; $s++) {

                        $current_s_ball = $this->selected_s_ball_array[$s];

                        if ($current_s_ball != "") {

                            if ($current_f_ball != $current_s_ball) {
                                $itemcount = $itemcount + 1;
                            }
                        }
                    }
                }
            }
        }

        return $itemcount;
    }

    //猜前一
    function bjpk10qian1($tzcode)
    {
        return count($this->one($tzcode));
    }

    function combineArrUpdata($currNumber)
    {
        for ($i = 0; $i < count($currNumber); $i++) {
            for ($j = 0; $j < count($currNumber[$i]); $j++) {
                if ($i == 0) {
                    $this->selected_f_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                } else if ($i == 1) {
                    $this->selected_s_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                } else {
                    $this->selected_t_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                }
            }
            if ($i == 0) {
                $this->ballF = count($currNumber[$i]);
            } else if ($i == 1) {
                $this->ballS = count($currNumber[$i]);
            } else {
                $this->ballT = count($currNumber[$i]);
            }
        }
    }

    function combineArrUpdataWu($currNumber)
    {
        for ($i = 0; $i < count($currNumber); $i++) {
            for ($j = 0; $j < count($currNumber[$i]); $j++) {
                if ($i == 0) {
                    $this->selected_f_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                } else if ($i == 1) {
                    $this->selected_s_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                } else if ($i == 2) {
                    $this->selected_t_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                } else if ($i == 3) {
                    $this->selected_si_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                } else {
                    $this->selected_wu_ball_array[$currNumber[$i][$j]] = $currNumber[$i][$j];
                }
            }
            if ($i == 0) {
                $this->ballF = count($currNumber[$i]);
            } else if ($i == 1) {
                $this->ballS = count($currNumber[$i]);
            } else if ($i == 2) {
                $this->ballT = count($currNumber[$i]);
            } else if ($i == 3) {
                $this->ballSi = count($currNumber[$i]);
            } else {
                $this->ballWu = count($currNumber[$i]);
            }
        }
    }

    //单排号码过滤
    function one($tzcode)
    {
        $tzcode = str_replace(array('01', '02', '03', '04', '05', '06', '07', '08', '09'), array('1', '2', '3', '4', '5', '6', '7', '8', '9'), $tzcode);
        $tzcodes = explode(',', $tzcode);
        foreach ($tzcodes as $k => $v) {
            if ($v > 11 or $v < 1 or !is_numeric($v) or strpos($v, ".")) unset($tzcodes[$k]);
        }
        return $tzcodes;
    }

    //多排号码过滤
    function two($tzcode)
    {
        $tzcodes = explode('|', $tzcode);
        foreach ($tzcodes as $k => $v) {
            if (empty($v)) return 0;
            $val = str_replace(array('01', '02', '03', '04', '05', '06', '07', '08', '09'), array('1', '2', '3', '4', '5', '6', '7', '8', '9'), $v);
            $arr = explode(',', $val);
            if (count($arr) != count(array_unique($arr))) return 0;
            foreach ($arr as $key => $val) {
                if ($val > 11 or $val <= 0 or !is_numeric($val) or strpos($val, ".")) {
                    return 0;
                };
            }
            $result[] = $arr;
        }
        return $result;
    }

    //单式
    function ds($tzcode)
    {
        return count(explode('|', $tzcode));
    }

    // 一维数组组合
    function combination($a, $m)
    {
        $r = array();

        $n = count($a);
        if ($m <= 0 || $m > $n) {
            return $r;
        }

        for ($i = 0; $i < $n; $i++) {
            $t = array($a[$i]);
            if ($m == 1) {
                $r[] = $t;
            } else {
                $b = array_slice($a, $i + 1);
                $c = self::combination($b, $m - 1);
                foreach ($c as $v) {
                    $r[] = array_merge($t, $v);
                }
            }
        }

        return $r;
    }

    //多维数组组合
    function combination2($arr)
    {
        $sarr = [[]];
        for ($i = 0; $i < count($arr); $i++) {
            $sta = [];
            for ($j = 0; $j < count($sarr); $j++) {
                for ($k = 0; $k < count($arr[$i]); $k++) {
                    $sta[] = array_merge($sarr[$j], $arr[$i][$k]);
                }
            }
            $sarr = $sta;
        }
        return $sarr;
    }


}

?>