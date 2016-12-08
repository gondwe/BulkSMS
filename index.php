<script>
	function kill(c){
		window.location="crud.php?c="+c;
	}
</script>
<?php include("nuts.php") ?>

<?php 
/* handle post data */
if(!empty($_POST)){
$n = mysql_real_escape_string($_POST["names"]);
$c = mysql_real_escape_string($_POST["contact"]);

$q = "insert into contacts (names, contact) values('".$n."','".$c."')";


if(strlen($c) !== 10){
echo2("Use the proper Contact Format ie#0726939482");
}else{


if(!$db->query($q)){
	echo $db->error;
}else{
	echo "Contact Saved Successfully";
}

}


}
$pipo = arraylist("select names, contact from contacts");
?>
<center>
<form name="contacts" method="post">
	<div>Add New Contact</div>
	<div><input name="names" placeholder="Name - optional"></div>
	<div>+254 <input name="contact" type="number" placeholder="  0726 93 94 82" required></div>
	<div><input name="Save" type="submit" value="Add New + "></div>
</form>


<a href="doves.php" ><h4>Send Messages</h4></a>

<div>Total Contacts Registered : <?=count($pipo)?></div>
<div>
<table border="1">
<?php 
if(!empty($pipo)){
foreach($pipo as $p=>$c){
	echo "<tr>";
		echo "<td>$p</td>";
		echo "<td>$c</td>";
		?>
		<td ><button onclick='kill("<?=$c?>")'>Delete</button></td>
		<?php
	echo "</tr>";
}
}
?>
</table>
</div>
