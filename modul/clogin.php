<?php
class clogin{
	function check_user($username,$password){
		$query= mysql_query("select username,password,name_level from user,level where user.level=level.id_level and username='$username' and password='$password'");
	}

	function filterinput($input){
		return addslashes($input);
	}	
	
}


?>