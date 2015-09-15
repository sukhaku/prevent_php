<?php
$cat_news= addslashes($_GET['cat']);
//$cat_news need filter to prevent sql ijection attack
$query = mysql_query("select id_news,title,content_news,date_news,news.cat,cat_news.id_cat from news,cat_news where news.cat=cat_news.id_cat and name_cat='$cat_news'");	
while($data=mysql_fetch_array($query)){
	echo"<h2><a href=?page=news&cat=$cat_news&id_news=$data[id_news]>$data[title]</a></h2><br>";
	echo"<h5>$data[date_news]</h5><br><br>";
	echo"<p>".substr($data['content_news'], 0,20)."..<a href=?page=news&cat=$cat_news&id_news=$data[id_news]>Readmore</></p><hr>";
}
?>