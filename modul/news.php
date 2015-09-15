<?php
$cat_news = $_GET['cat'];
$id_news = addslashes($_GET['id_news']);
//$cat_news need filter to prevent sql ijection attack
//$id_news_filter = addslashes($id_news);
$query = mysql_query("select title,content_news,date_news from news where id_news='$id_news'");	
while($data=mysql_fetch_array($query)){
	echo"<h2>$data[title]</h2><br>";
	echo"<h5>$data[date_news] / <b>$cat_news</b> </h5><br><br>";
	echo"<p>$data[content_news]</p>";
}
?>