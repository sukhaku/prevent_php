<?php
if(!isset($_SESSION['islogin'])){
  $username = $password = $usernameErr = $passwordErr = "";
  if(isset($_POST['login'])){
    include"clogin.php";
    $clogin = new clogin();
    $username = $clogin->filterinput($_POST['username']);
    $password = $clogin->filterinput($_POST['password']);
    if(empty($username)){
      $usernameErr="Username Kosong";
    }
    if(empty($password)){
      $passwordErr="Password Kosong";
    }

    if(!empty($username and $password)){
      $query = mysql_query("select username,password,name_level from user,level where user.level=level.id_level and username='$username' and password='$password'");
      $cek = mysql_num_rows($query);
      $data = mysql_fetch_array($query);
      if($cek==1){
         $_SESSION['username'] = $data['username'];
         $_SESSION['islogin'] = true;
         $_SESSION['level'] = $data['name_level'];
         $_SESSION['password'] = $data['password'];
         if($_SESSION['level']=='administrator'){
          header("location:?page=admin");
         }else{
          header("location:../testing_php/");
         }

      }else{
        echo"User is not Registered";
      }  
    }
  }


?>          
          
          <form method="post" action="?page=login">
                      
                          <table cellpadding="0" cellspacing="0" align="center" id="masuk" border='0'>
    
                              <tr>
                                  <td rowspan="4"><img src="images/lock.png"/></td>
                                  <td colspan="2"><small><h2>Login Administrator</h2></small></td>
                              </tr>

                              <tr>
                                  <td><small><h5>Username</h5></small></td>
                                  <td><input type="text" name="username" placeholder="Username" class="form_text" value="<?php echo $username;?>"/> <?php echo $usernameErr;?></td>
                              </tr>

                              <tr>
                                  <td><small><h5>Password</h5></small></td>
                                  <td><input type="password" name="password" placeholder="Password" value="<?php echo $password;?>"/><?php echo $passwordErr;?></td>
                              </tr>

                              <tr>
                                  <td></td>
                                  <td><input type="submit" class='tiny button small radius' value='Login' name='login'/></td>
                              </tr>
                          </table>
          </form>
<?php
}else{
  header("location:../testing_php");
}
?>          