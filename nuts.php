<?php


/* nuts and bolts - gondwe@akc-nov2016 */

function echo2($i){echo "<pre style='text-align:left'>";print_r($i);echo "</pre>";}
ob_start();session_start();






/* database name */
define("myd","speedbird");

/* resident folder */
define("root", "website/speed");

/* server */
define("server","localhost");

/* database password */
define("mypass","root");

/* database user */
define("myuser","root");





/* SMS DECLARATIONS 
 ==================================================== */
/* sms account username */
define("sms_username","ben10");

/* sms account api key */
define("sms_api_key","110f560a0775ad7786b60d25fa7ed696210e32482053911959d263baa9dc2d14");

/* set the sender id/ short code if it exists */
define("alphanumeric",NULL);






















/* 
akc Nov2016
leave this space blank
*/


































function forge_db(){$db = new mysqli("localhost",myuser,mypass,myd);if ($db->connect_error) {die('Connect Error (' . $db->connect_errno . ') '. $db->connect_error);}return $db;}				
$db = forge_db(); //just incase we need you from nowhere
function return_array($sql= FALSE){$db = forge_db();	$arr = NULL;if($sql == FALSE || $sql == NULL || $sql == ""){return NULL;}if($query = $db->query($sql)){if($query->num_rows > 0){while($row = $query->fetch_array()){$arr[] = $row;	}	}else{$arr = NULL;	}}else{errgo("ERROR IN QUERY STATEMENT,".$sql.",".$db->error);}return $arr;}
function arraylist($sql= FALSE, $name=0){$arr = return_array($sql);if($name !== 0){echo2($arr);}if($arr !== NULL){ if(count($arr[0])>2){foreach($arr as $k=>$v){$arr2[$v[0]] = $v[1];} return $arr2;}else{return array_column($arr,$name);}}}
function single($sql ){return return_array($sql)[0][0];}
?>