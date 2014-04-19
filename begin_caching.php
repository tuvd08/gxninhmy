<?php

  if(!is_user_logged_in()) {

    // Settings
    $cachedir = '/tmp/cache-ninhmy/'; // Directory to cache files in (keep outside web root)
    $cachetime = -1; // Seconds to cache files for
    $cacheext = 'cache'; // Extension to give cached files (usually cache, htm, txt)
    $domain= $_SERVER['HTTP_HOST'];
    //
    if(!is_dir($cachedir)) {
      mkdir($cachedir, 0777);
    }
    $GLOBALS['cachedir'] = $cachedir;
    
    // Ignore List

    $ignore_list = array(
        $domain.'/rss.php',
        '?s='
    );
    // Script
    $page = 'http://' . $domain . $_SERVER['REQUEST_URI']; // Requested page
    $cachefile = $cachedir . md5($page) . '.' . $cacheext; // Cache file to either load or create

    $GLOBALS['cachefile'] = $cachefile;
    
    $ignore_page = false;
    for ($i = 0; $i < count($ignore_list); $i++) {
        $ignore_page = (strpos($page, $ignore_list[$i]) !== false) ? true : $ignore_page;
    }
    $cachefile_created = ((@file_exists($cachefile)) and ($ignore_page === false)) ? @filemtime($cachefile) : 0;
    @clearstatcache();
    // Show file from cache if still valid
    if (($cachetime = -1 && $cachefile_created > 0) || (time() - $cachetime < $cachefile_created)) {
        //ob_start('ob_gzhandler');
        @readfile($cachefile);
        //ob_end_flush();
        exit();
    }
    // If we're still here, we need to generate a cache file
    ob_start();
  }
?>
