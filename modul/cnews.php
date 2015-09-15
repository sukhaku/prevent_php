<?php
class cnews{
	function connection_db($host,$user,$password,$db){
		mysql_connect($host,$user,$password) or die("Connection Error");
		mysql_select_db($db) or die("Database connection Error");
	}

	function select_all_data($table){
		$query = mysql_query("select*from $table");
		return $query;
	}

	function select_cat_news(){
		$query = mysql_query("select id_news,title,content_news,date_news,news.cat,cat_news.id_cat from news,cat_news where news.cat=cat_news.id_cat");
	}

	function switch_case($page){
		switch ($page) {
			case 'cat_news':
			include"modul/cat_news.php";
			break;

			case'news':
			include"modul/news.php";
			break;
			
			case'login':
			include"modul/login.php";
			break;

			case'logout':
			include"modul/logout.php";
			break;

			case'admin':
			include"modul/admin.php";
			break;
			
		}

	}

	

}

?>