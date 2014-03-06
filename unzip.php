<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link href="http://svbuichu.com/javascript/html/style.css" type="text/css" rel="stylesheet" id="Skin">
    <script type="text/javascript" src="http://svbuichu.com/javascript/libs/jquery-1.7.2.min.js"></script>
	</head>
	<body>
    
  <?php
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

    
    
		<div class="Copyright"> 
			Copyright © 04/2012. All rights reserved.<br/>
				Other: Vu Duy Tu<br/>
				Email: duytucntt@gmail.com
		</div> 
	</body>
</html>
