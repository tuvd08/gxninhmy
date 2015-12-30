<?
$name="";
$to="";
if(isset($_REQUEST['to'])) {
	$to = $_REQUEST['to'];
}

if(isset($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
	include "unzip.ncl.php";
	$zip = new PclZip($name);
	$zip->extract($to);
} else {
  echo "add more ?name=";
}
	
?>
