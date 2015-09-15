<!Doctype html>
<html>
<head>
	<title>Testing SQL Injection PHP</title>
	<link rel="shortcut icon" href="images/logo.png"/>
	<style type="text/css">
		@import"css/foundation.css";
	</style>
	<script src="js/jquery-1.8.2.js"></script>
</head>
<body>

<!-- Top bar !-->
<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="../prevent_php/">Testing SQL Injection PHP</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
  </ul>
  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
    	<li><a href><?php echo date('D').", ".date('d / m / Y');?></a></li>
    	
      	<li class="has-dropdown">
        	<a href=''>
          		News
        	</a>
	        	<ul class="dropdown">
                <?php 
                  session_start();
                  include"modul/cnews.php";
                  $cnews = new cnews();
                  $cnews->connection_db("localhost","fendi","hello","db_inject");
                  $query = $cnews->select_all_data('cat_news');
                  while($data=mysql_fetch_array($query)){
               	   echo"<li><a href=?page=cat_news&cat=$data[name_cat]>$data[name_cat]</a></li>";
	        	      }
                ?>
            </ul>
      	</li>
      	<li class="active">
          <?php 
            if(isset($_SESSION['username'])){
              echo"<a href=?page=logout>Logout</a>";
            }else{
              echo"<a href=?page=login>Login</a>";
            }
          ?>
        </li>
    </ul>
  </section>
</nav>
<!-- End Top bar !-->
<br><br>
<div class="row">
  <div class="small-12">
    <?php
      if(isset($_GET['page'])){
        $page = $_GET['page'];
        $cnews->switch_case($page);
      }else{
        echo"<h1>Start to Inject</h1><br><a class=button>Secure your Apps</a>";
      }
    ?>
  </div>
</div>
	<script src="js/foundation.js"></script>
	<script src="js/foundation.topbar.js"></script>
	<script type="text/javascript">
		$(document).foundation();
	</script>
</body>	
</html>