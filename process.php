<?php
/**
 * Process data from ajax.
 *
 * PHP version 5
 * @category  SortText
 * @package   SortText
 * @author    Dzung Nguyen <thayfet@gmail.com>
 * @copyright 2015 Dzung
 */
$value = $_POST['value'];
if($value > 25) {
    $value = 25;
}
$result = array();
for($i=0; $i<$value;$i++) {
	$result[$i] = '';
    for ($j = $i+1; $j <= 26; $j+=$value) {
        $result[$i] .= chr(64+$j).',';
    }
}
if($value > 13) {
    $array1 = array_slice($result,26-$value-1,$value-1);
    $array2 = array_slice($result,0,26-$value-1);
} else {
    $array2 = array_slice($result,0,$value-2);
    $array1 = array_slice($result,$value-2,$value);
}
echo trim(implode('',array_merge($array1,$array2)),',');