<?php
if($_SESSION['level']=='administrator'){

echo"<h1>Selamat Datang </h1><br>
<h3>Admin</h3>";
}else{
	header("location:../testing_php/");
}
?>
