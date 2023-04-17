<?php 
require_once("includes/config.php");
// code   username availablity
if(!empty($_POST["username"])) {
	$uname= $_POST["username"];
$query=mysqli_query($con,"select AdminuserName from tbladmin where AdminuserName='$uname'");		
$row=mysqli_num_rows($query);
if($row>0){
echo "<span style='color:red'> Nombre de usuario ya existe. Prueba con otro nombre de usuario</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
echo "<span style='color:green'> Nombre de usuario disponible para registro .</span>";
echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>
