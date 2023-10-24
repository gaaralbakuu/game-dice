<?php 
$val = microtime(true);
echo substr($val,11,1).'='.substr($val,14,1)."==".$val; ?>