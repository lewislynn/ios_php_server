<?php
require_once 'dbTool.php';

$type = $_POST['type'];
$json = $_POST['trans_str'];
echo "type is ".$type.", json is ".$json."\n";
$obj = json_decode($json);
//{"start_time":"2015-09-11 12:00:00","end_time":"2015-09-11 12:00:00","start_mile":12345,"end_mile":45678}
if ($type == 1){
	$start_time = $obj->{'start_time'};
	$end_time = $obj->{'end_time'};
	$start_mile = $obj->{'start_mile'};
	$end_mile = $obj->{'end_mile'};
	$begin_address = $obj->{'begin_address'};
	$end_address = $obj->{'end_address'};
	
	echo "save MileModel begin..........\n";
	$insert = "insert into t_mile(start_mile, end_mile, start_time, end_time, begin_address, end_address)
			values (".$start_mile.",".$end_mile.",'".
					$start_time."','".$end_time."','".
					$begin_address."','".$end_address."')";
	echo $insert."\n";
	$result = mysqli_query($conn, $insert);
	echo "result is ".$result."\n";
	if ($result && mysqli_affected_rows($conn)>0){
		echo "mileModel insert success, last mile_id is ".mysqli_insert_id($conn);
	}else {
		echo "mileModel insert failure, error num:".mysqli_errno($conn).",error:".mysqli_error($conn);
	}
}else if ($type == 2){
	$currentMile = $obj->{'currentMile'};
	$leftMile = $obj->{'leftMile'};
	$oilPrice = $obj->{'oilPrice'};
	$oilTime = $obj->{'oilTime'};
	$oilMile = $obj->{'oilMile'};
	$oilPlace = $obj->{'oilPlace'};
	$sinceLastDay = $obj->{'sinceLastDay'};	
	
	echo "save OilModel begin..........\n";
	$insert = "insert into t_oil(currentMile, leftMile, oilPrice, oilTime, oilMile,
				oilPlace, sinceLastDay) values ('".$currentMile."','".$leftMile."','".
					$oilPrice."','".$oilTime."','".$oilMile."','".$oilPlace."','".$sinceLastDay."')";
	echo $insert."\n";
	$result = mysqli_query($conn, $insert);
	echo "result is ".$result."\n";
	if ($result && mysqli_affected_rows($conn)>0){
		echo "oilModel insert success, last oil_id is ".mysqli_insert_id($conn);
	}else {
		echo "oilModel insert failure, error num:".mysqli_errno($conn).",error:".mysqli_error($conn);
	}
}else {
	echo "incorrect type for input, please check it.";
}
