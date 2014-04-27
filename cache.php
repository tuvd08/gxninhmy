<?php
function header_html() {
?>
<html>
  <header>
    <meta charset="utf-8">
  </header>
<body>
<?php
}
?>

<?php
//rawurlencode
//rawurldecode
//$t = array("a" => "b", "x" => "xxx");
//$k = array("x" => "yyy");
//print_r(array_merge($t,$k));
 

  $cachedir = "/tmp/cach/";
  //
  if(!is_dir($cachedir)) {
    mkdir($cachedir, 0777);
  }
  $cachefile = $cachedir . "data.cache";
  $GLOBALS['cachefile'] = $cachefile;
  $GLOBALS['cachedata'] = array();

	//Encode array into JSON
	function json($data) {
		if(is_array($data)) {
			return json_encode($data);
		}
	}
  
  function loadCache() {
    if(is_file($GLOBALS['cachefile'])) {
      return file_get_contents($GLOBALS['cachefile']);
    } else {
      clearAllCache();
      return "";
    }
  }
  
  function clearAllCache() {
    file_put_contents($GLOBALS['cachefile'], "");
    @chmod($GLOBALS['cachefile'], 0755);
  } 
  
  function encodeValue($input='') {
    if(strlen($input) > 0 ) {
       $input = str_replace("&", "%26", $input);
       $input = str_replace("=", "%3D", $input);
    }
    return $input;
  }
  function decodeValue($input='') {
    if(strlen($input) > 0 ) {
       $input = str_replace("%26", "&", $input);
       $input = str_replace("%3D", "=", $input);
    }
    return $input;
  }

  function loadDataCache($value='') {
    $datas = array();
    if(strlen($value) > 0 ) {
      foreach (explode('&', $value) as $chunk) {
          $param = explode("=", $chunk);
          if ($param) {
              $datas[decodeValue($param[0])] = decodeValue($param[1]);
          }
      }  
    }
    return $datas;
  }
  
  function putCache($key, $value) {
    //array_merge
    initCache();
    
    if(strlen($value) > 0 ){
      $GLOBALS['cachedata'][$key] = $value;
    } else if(array_key_exists($key, $GLOBALS['cachedata'])){//
      unset($GLOBALS['cachedata'][$key]);
    }
    //
    $content = ""; $size = count($GLOBALS['cachedata']);
    if($size > 0) {
      $count = 1;
      foreach(array_keys($GLOBALS['cachedata']) as $key_) {
        $content .= encodeValue($key_) ."=". encodeValue($GLOBALS['cachedata'][$key_]);
        if($count < $size) {
          $content .= "&";
        }
        $count = $count + 1;
      }
      //
      file_put_contents($GLOBALS['cachefile'], $content);
    }
  }
  
  function getCache($key='') {
    if(array_key_exists($key, $GLOBALS['cachedata'])) {
      return $GLOBALS['cachedata'][$key];
    }
    return "";
  }
  
  function initCache() {
    $GLOBALS['cachedata'] = loadDataCache(loadCache());
  }
  
  initCache();
  
  print_r($GLOBALS['cachedata']);

// Test
function runTest() {
  clearAllCache();
  //
  header_html();
  echo "Test encodeValue<br/>";
  $input = "Hôm qua em đi tỉnh về=em đi chơi.&key=value";
  echo ($v=encodeValue($input));
  echo "<br/>Test decodeValue<br/>";
  echo decodeValue($v);
  echo "<br/>Test loadDataCache<br/>";
  print_r(loadDataCache($input));
  echo "<br/>Test putCache<br/>";
  putCache("tiêu đề", "Hôm nào=em tuổi & mười lăm");
  putCache("câu tiếp", "em hay nghe=tôi ngồi đánh đàn");
  print_r($GLOBALS['cachedata']);
  echo "<br/>".loadCache()."<br/>";
  //
  putCache("câu tiếp","");
  print_r($GLOBALS['cachedata']);
  echo "<br/>".loadCache();
  //
  foodter_html();
  header("HTTP/1.1 200 OK");
  header("Content-Type:text/html");
}

//runTest();

?>
<?php

function foodter_html() {
?>
</body>
</html>
<?php
}
?>
