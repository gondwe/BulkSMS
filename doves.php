<meta charset="utf-8">
<?php include("nuts.php")?>

<script>
function togla(source){a = document.getElementsByName('contact[]');for(var i=0, n=a.length;i<n;i++) {a[i].checked = source.checked;}}
</script>

<?php 
	$pipo = arraylist("select contact, names from contacts");
	
	if(!empty($_POST)){
		if(!empty($_POST["contact"])){
			$recipients = implode(",",$_POST["contact"]);
			$message = mysql_real_escape_string($_POST["message"]);
			require("africas.php");
		}else{
			echo2("please select at least one contact");
		}
	}
	
?>
<input type="checkbox" onclick="togla(this)">
<form name="send" method="post">
	<div>Send Message</div>
	<?php if($pipo !== NULL ){ ?>
	<div><textarea name="message" required></textarea></div>
	<?php foreach($pipo as $p=>$n){ ?>
	<div><input id="contact" name="contact[]" value="254<?=$p?>" type="checkbox"><?=$n?></div>
		<?php }}else{
			echo "No Contacts Found ";
		} ?>
	<div><input name="Save" type="submit" value="SEND"></div>
</form>
<a href='index.php'>Add New Contacts</a>