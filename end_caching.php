<?php
  if(!is_user_logged_in() && $_SERVER['REQUEST_URI'] !== '/lienhe/') {
    // Now the script has run, generate a new cache file
    $fp = @fopen($GLOBALS['cachefile'], 'w'); 
    
    $content_cache = ob_get_contents();
    // save the contents of output buffer to the file
    @fwrite($fp, $content_cache);
    @fclose($fp); 
    @chmod($GLOBALS['cachefile'], 0755);
    ob_end_flush(); 
  }
?>
