<?php

function getInfoType($input = '') {
  if(strpos($input, '-') > 0) {
    return substr($input, strpos($input, '-') + 1);
  }
  return $input;
}

function getInfoValue($input = '') {
  if(strpos($input, '-') > 0) {
    return substr($input, 0, strpos($input, '-'));
  }
  return $input;
}

//value-current
function newInfo($crT, $o) {
  if(intval($crT) == intval(getInfoType($o))) {
    return ((intval(getInfoValue($o)) + 1).'-'.$crT);
  } else {
    return ('1-'.$crT);
  }  
}

// update monthly:
function updateMonthly($val) {
  $c_year = date("Y", time());
  $c_month = date("n", time());
  $result= mysql_query("SELECT * FROM `nm_monthly_static` m WHERE `m`.index='".$c_month. "-". $c_year."'");
  $items=mysql_fetch_array($result);
  if(!$items || count($items) == 0) {
    mysql_query("INSERT INTO `nm_monthly_static` VALUES (NULL,'".$c_month. "-". $c_year."', ".$val.")");
  } else {
		mysql_query("UPDATE `nm_monthly_static` s SET `s`.`count`=". $val . "  WHERE `s`.index='".$c_month. "-". $c_year."'");
	}
  //
}

$isCount = true;
$ip = 'UnUserRequest';
$time = time();

if(isset($_SERVER['REMOTE_ADDR'])) {
  $ip = $_SERVER['REMOTE_ADDR'];
}

if(isset($_COOKIE['static_info'])) {
  $cookie = $_COOKIE['static_info'];
  if($cookie && is_numeric($cookie)) {
    $d = date("j", intval($cookie));
    if($d === date("j", $time)) {
      $isCount = false;
    }
  }
}
//
$sqlcn = mysql_connect('127.0.0.1:3306', 'root', 'root');
if (!$sqlcn) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('anthinh_ninhmy', $sqlcn); 
$result= mysql_query("SELECT * FROM `nm_static`");
$static=mysql_fetch_array($result);
$od = $static['per_day'];
$ow = $static['per_week'];
$om = $static['per_month'];
$oy = $static['per_year'];
$oa = $static['all'];

$size = 0;
$count_ = 0;
/*
$result= mysql_query("SELECT COUNT(`ip`) AS count FROM `nm_static_info` WHERE `ip`='".$ip."'");
if($dt = mysql_fetch_array($result)) {
	$count_ = $dt['count'];
}
if($count_ == 0) {
	$result= mysql_query("SELECT COUNT(`ip`) AS count FROM `nm_static_info`");
	$size = mysql_fetch_array($result)['count'];
}
*/
$result= mysql_query("SELECT `ip` FROM `nm_static_info` WHERE `ip`='".$ip."'");
$count_ = mysql_num_rows($result);
if($count_ == 0) {
	$result= mysql_query("SELECT `ip` FROM `nm_static_info`");
	$size = mysql_num_rows($result);
}

if($isCount) {
  $expire = time()+60*60*24;
  setcookie('static_info', ''.$time, $expire);
  // get info
  $result= mysql_query("SELECT * FROM `nm_static_info` s WHERE `s`.ip='".$ip."'");
  $isAdd = true;
  $lastTime = '';
  $count = 0;
  while($info=mysql_fetch_array($result))  {
     $isAdd = false;
     $lastTime = $info['lastTime'];
     $count = $info['count'];
  }
  // Update info
  if($isAdd === true) {
    mysql_query("INSERT INTO `nm_static_info` (ip, lastTime, count) VALUES ('".$ip."', '".$time."', 1)");
    mysql_query("INSERT INTO `nm_static` VALUES (4, '0-4', '0-2309', '0-4', '0-2014', '0')");
  } else {
    $d = date("j", intval($lastTime));
    //UPDATE
    if($d != date("j", $time)) {
      mysql_query("UPDATE `nm_static_info` s SET `s`.`lastTime`='". $time . "', `s`.`count`='". ($count+1) . "'  WHERE `s`.ip='".$ip."'");
      $isAdd = true;
    }
  }
  // Update satitic
  if($isAdd === true) {
    //check day
    $od = newInfo(date("j", $time), $od);
    
    //check week $cW = floor($time/(60*60*24*7));
		$ddate = date("Y", $time)."-".date("n", $time)."-".(date("j", $time)*1);
		$date = new DateTime($ddate);
		$cW = $date->format("W");
    $ow = newInfo($cW, $ow);
    
    // check month
    $om = newInfo(date("n", $time), $om);
    //
    updateMonthly(getInfoValue($om));
    // check year
    $oy = newInfo(date("Y", $time), $oy);
    
    //
    $oa = $oa + 1;
    
     mysql_query("UPDATE `nm_static` s SET `s`.`per_day`='". $od . "', `s`.`per_week`='". $ow ."', `s`.`per_month`='". $om . "', `s`.`per_year`='". $oy ."', `s`.`all`='". $oa ."'");
  }
  
}

mysql_close($sqlcn);

$f = 'window.dataStatic = ';
if(isset($_REQUEST['f'])) {
  $f = $_REQUEST['f'];
  if(strlen($f) == 0) {
    $f = 'window.dataStatic = ';
  }
}

$data = $f."({'day': '".$od."', 'week': '".$ow."', 'month': '".$om."', 'year': '".$oy."', 'all': '".$oa."', 'count': '".$size."', 'back_count': '".$count_."'})";
header("HTTP/1.1 200 OK");
header("Content-Type:text/javascript");
echo $data;
exit;


?>
