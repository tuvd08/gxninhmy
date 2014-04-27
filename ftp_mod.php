<?php
$ftp_details['ftp_user_name'] = 'your ftp username';
$ftp_details['ftp_user_pass'] = 'your ftp password';
$ftp_details['ftp_root'] = '/public_html/';
$ftp_details['ftp_server'] = 'ftp' . $_SERVER['HTTP_HOST'];
function ftp_chmod($path, $mod, $ftp_details) {
  extract($ftp_details);
  $conn_id = ftp_connect($ftp_server);
  $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// try to chmod $path directory
  if (ftp_site($conn_id, 'CHMOD ' . $mod . ' ' . $ftp_root . $path) !== false) {
    $success = true;
  }
  else {
    $success = false;
  }

  ftp_close($conn_id);
  return $success;
}
?>
