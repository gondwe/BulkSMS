<?php

require("nuts.php");

$c = $_GET["c"];
echo $q = "delete from contacts where contact = '".$c."' ";
if($db->query($q)){
	echo "Delete Success";
}else{
	echo $db->error;
}

header("location:index.php");