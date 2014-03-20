<?php 

$regex = '/("https\:\/\/.*googleusercontent.com\/.*?"),[0-9]{3,4},[0-9]{3,4}/';
$input = file_get_contents("5991617952845892657");
$matches = array();
if(preg_match_all($regex , $input, $matches)) {
  
  
  $datas = $matches[0];
  $result = array();
  foreach($datas as $mat) {
    
    
    if(!(strpos($mat, '[') > 0)) {
      $link = substr($mat, 1, strpos($mat, '"', 1)-1);
      array_push($result, $link);
    }
    
  }

  foreach($result as $img) {
    echo '<span style="padding:5px;"><img src="'. $img .'=w292-h218-p-no"/> </span>';
  }

}


?>
