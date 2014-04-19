<?php
$result = '';
$b_result='';
$file_cache = '/tmp/cache-object-ninhmy/result';
if(@file_exists($file_cache)) {
  $b_result = file_get_contents($file_cache);
  $result = $b_result;
} else {
  @mkdir('/tmp/cache-object-ninhmy/', 0777);  
}

//
function str_contain($haystack, $needle) {
  $result = strpos($haystack, $needle);
  if(strlen($result.'') > 0 && $result*1 >= 0 ) {
    return true;
  } else {
    return false;
  }
}
// /gxninhmy/
function initCacheDir() {
  if(!isset($GLOBALS['cachedir'])) {
    $GLOBALS['cachedir'] = '/tmp/cache-ninhmy/';
  }
}
//
function clear_all_cache() {
  initCacheDir();
  //
  $cachedir = $GLOBALS['cachedir'];
  if(strlen($cachedir) > 0) {
    global $result;
    $result = $result . '<br> clear all at: '.date("d/m/Y h:i:s A", time()).' ';
    $files = glob($cachedir.'*'); // get all file names
    foreach($files as $file){ // iterate files
      clear_cache($file, false); // delete file
    }
  }
}

function get_file_name($link) {
  return md5($link) . '.cache';
}

function clear_cache($file='', $isInfo=true) {
  if(strlen($file) > 0) {
    initCacheDir();
    //
    $cachedir = $GLOBALS['cachedir'];
    if(!str_contain($file, $cachedir) > 0) {
      $file = $cachedir.$file;
    }
    if(is_file($file)) {
      @unlink($file);
      //
      if($isInfo) {
        global $result;
        $result = $result . '<br> clear file: '.$file.' at: '.date("d/m/Y h:i:s A", time()).' ';
      }
    }
  }
}

if(isset($_REQUEST['clear'])) {
  $clear = $_REQUEST['clear'];
  if(strlen($clear) > 0) {
    if($clear === 'all') {
      clear_all_cache();
    } else {
      $domain= $_SERVER['HTTP_HOST'];
      if(!str_contain($clear, $domain)) {
        $clear = 'http://' . $domain . $clear;
      }
      clear_cache(get_file_name($clear));
    }
  }
}

if($b_result != $result) {
  $fp = @fopen($file_cache, 'w'); 
  @fwrite($fp, $result);
  @fclose($fp); 
  @chmod($file_cache, 0755);
}

if(isset($_REQUEST['info'])) {
  $info = $_REQUEST['info'];
  if(strlen($info) > 0 && $info === 'true') {
   echo '<div>'.$result . '</div>';
  }
}

?>
