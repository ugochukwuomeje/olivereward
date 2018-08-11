<?php
session_start();
$id = $_SESSION['id'];
if(isset($_POST["submit1"]))
{
	
        
		require_once("../../connection/db.php");
		
	
	
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="clientproduct_images/".$v3.$fnm;
   $dst1="clientproduct_images/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
  
	$name = escape_data($_POST['pnm']);							
	$class = escape_data($_POST['class']);
	$ritem = escape_data($_POST['ritem']);
	$ptype = escape_data($_POST['ptype']);
	$pdesc = escape_data($_POST['pdesc']);
	
	
	

$submit_status = $con->query("insert into product values('', '$id','$class','$name' ,'$_POST[pcategory]' , '$ptype',  '$_POST[pprice]','$dst1','$pdesc', '1' )");

if(!$submit_status){
	
	echo"$con->error";
	exit();
	
}
if($submit_status){
	
	echo"1";
	exit();
}
}

function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>					
					