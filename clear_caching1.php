<?php
  function rmdir_not_empty($dir, $rmParent=true) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
        }
      }
      reset($objects);
      if($rmParent) {
        rmdir($dir);
      }
    }
  }
  //
  function rm_all_files($dir) {
    rmdir_not_empty($dir, false);
  }
 
  $cacheext = 'html'; // Extension to give cached files (usually cache, htm, txt)
  $cachedir = '/tmp/cache-ninhmy/'; // Directory to cache files in (keep outside web root)
  //
  $isAll = 'false';
  if(isset($_REQUEST['all'])) {
    $isAll = $_REQUEST['all'];
    if($isAll == 'true') {
      //rm all files cached
      rm_all_files($cachedir);
    }
  }
  //
  if($isAll == 'false') {
    $domain= $_SERVER['HTTP_HOST'];
    $page = 'http://' . $domain . $_SERVER['REQUEST_URI']; // Requested page
    if(isset($_REQUEST['page'])) {
      $page_ = $_REQUEST['page'];
      if(strlen($page_) > 0) {
        $page = $page_;
      }
    }
    //
    $cachefile = $cachedir . md5($page) . '.' . $cacheext; // Cache file to either load or create
    //
    if(is_file($cachefile)) {
      unlink($cachedir . $cachefile);
    }
  }
  //


  
  

?>
