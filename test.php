<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
        <head>
                <link href="http://svbuichu.com/javascript/html/style.css" type="text/css" rel="stylesheet" id="Skin">
    <script type="text/javascript" src="http://svbuichu.com/javascript/libs/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="wp-content/themes/twentythirteen/js/ninhmy-base.js"></script>
        </head>
        <body>


<style>


.slider-container {
  position: relative;
  overflow: hidden;
  max-width: 99%;
  margin: auto;
}

.slider-container .item-slider {
  display: none;
  float: left;
  position: absolute;
  top: 0px; left: 0px;
  width: auto;
}

.slider-container .active-item {
  display: block;
}

.slider-container ul, li {
  list-style-type: none;
}

.post-content {
  width: 50%;
  margin:auto;
}
</style>




<?php 

/** changing default wordpres email settings */
/*
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from($old) {
 return 'your email address';
}
function new_mail_from_name($old) {
 return 'your name or your website';
}
*/
function get_the_album($album_tag='', $size='w292-h218') {
  if(strlen($album_tag) > 0) {
    $album_url = $album_tag;
    if(strpos($album_tag, '<album>') >= 0) {
      $album_url = str_replace('<album>', '', $album_tag);
      $album_url = str_replace('</album>', '', $album_url);
    }
    //
    $urls = get_the_urls($album_url);
    if($urls && count($urls) > 0) {
      $text = '<div class="album-container">'."\n";
      $text .= '  <ul class="slider-container slider clearfix">'."\n";
      foreach($urls as $url) {
        $text .= '  <li class="item-slider'. ((strpos($text, 'li>')) ? '' : ' active-item') .'">'."\n";
        $text .= '    <a href="'. $url .'=w1024-h768-p-no" class="image-box">'."\n";
        $text .= '      <img class="img-slider" src="' . $url .'='.$size.'-p-no"/>'."\n";
        $text .= '    </a>'."\n";
        $text .= '  </li>'."\n";
      }
      $text .= '  </ul>'."\n";
      $text .= '</div>'."\n";
      //
      return $text ;
    }
    
  }
  return '';
}



function get_the_urls($album_url='', $isStr=false) {
  if(strlen($album_url) > 0) {
    $key = substr($album_url, lastIndexOf($album_url, '/') + 1);
    $local = 'wp-content/albums/'.$key;
    if(file_exists($local) == true) {
      $cont_file = file_get_contents($local);
      if($isStr === true) {
        return $cont_file;
      } else {
        return split(';', $cont_file);
      }
    }
    //
    $regex = '/("https\:\/\/.*googleusercontent.com\/.*?"),[0-9]{3,4},[0-9]{3,4}/';
    $input = file_get_contents($album_url);
    $matches = array();
    $str_result="";
    $result = array();
    if(preg_match_all($regex , $input, $matches)) {
      $datas = $matches[0];
      foreach($datas as $mat) {
        //
        if(!(strpos($mat, '[') > 0)) {
          $link = substr($mat, 1, strpos($mat, '"', 1)-1);
          array_push($result, $link);
          //
          if(strlen($str_result) > 0) {
            $str_result .= ";";
          }
          $str_result .= $link;
        }
      }
    }
    //
    try {
      file_put_contents($local, $str_result);
      chmod ( $local , 775 );
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    if($isStr === true) {
      return $str_result;
    } else {
      return $result;
    }
  }
  if($isStr == false) {
    return array();
  }
  return "";
}


function lastIndexOf($string, $item){  
  $index=strpos(strrev($string),strrev($item));  
  if ($index){  
    $index=strlen($string)-strlen($item)-$index;  
    return $index;  
  }
  return -1;  
}
?>

<div class="post-content">
<?php
$url_test="https://plus.google.com/u/0/photos/110773227077499625727/albums/5991617952845892657";
//w292-h218
//echo get_the_album($url_test, 'w456-h304');

function str_contain($haystack, $needle) {
  $result = strpos($haystack, $needle);
  if(strlen($result.'') > 0 && $result*1 >= 0 ) {
    return true;
  } else {
    return false;
  }
}

if(!str_contain('abc', 'bc')) {
    echo "Not contain ";
} else {
    echo "contain ";
}

?>
</div>

<script type="text/javascript">
(function($) {
  $(document).ready(function(){
    var parents = $('.album-container');
    parents.each(function(index) {
      var album = $(this).find('.slider-container:first');
      var active = album.find('li.active-item:first');
//      album.width(active.width() + 'px').height(active.height() + 'px');
      
      
    });
  });
})(jQuery);
</script>

        </body>
</html>

