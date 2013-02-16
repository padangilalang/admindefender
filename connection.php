<?php
error_reporting(0);
$con = mysql_connect("your host","your db username","your db password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("your db name");
?>
