<?php
    // Settings
    $cachedir = '/tmp/cache-ninhmy/'; // Directory to cache files in (keep outside web root)
    $cachetime = 600; // Seconds to cache files for
    $cacheext = 'html'; // Extension to give cached files (usually cache, htm, txt)
    // Ignore List
    $domain= $_SERVER['HTTP_HOST'];
    $ignore_list = array(
        $domain.'/rss.php',
        $domain.'/search/'
    );
    echo $domain;
    // Script
    $page = 'http://' . $domain . $_SERVER['REQUEST_URI']; // Requested page
    echo $page;
    $cachefile = $cachedir . md5($page) . '.' . $cacheext; // Cache file to either load or create
    $ignore_page = false;
    for ($i = 0; $i < count($ignore_list); $i++) {
        $ignore_page = (strpos($page, $ignore_list[$i]) !== false) ? true : $ignore_page;
    }
    $cachefile_created = ((@file_exists($cachefile)) and ($ignore_page === false)) ? @filemtime($cachefile) : 0;
    @clearstatcache();
    // Show file from cache if still valid
    if (time() - $cachetime < $cachefile_created) {
        //ob_start('ob_gzhandler');
        @readfile($cachefile);
        //ob_end_flush();
        exit();
    }
    // If we're still here, we need to generate a cache file
    ob_start();
?>
