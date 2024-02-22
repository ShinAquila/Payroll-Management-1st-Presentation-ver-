<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Pixel Foundry</title>
  <link rel="stylesheet" href="assets/css/login.css">

</head>


<body class="hold-transition login-page">
<?php
  require('db.php');
  session_start();
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

       
        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = mysqli_query($c, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);

        if($rows==1)
        {
          $_SESSION['username'] = $username;
          header("Location: index.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='login.php';
          </script>
          <?php
        }
    }
    else
    {
?>


<br><br><br><br><br><br><br><br>
<div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>Login Form</h1>
      <div>
        <input name=username type="text" placeholder="Enter Username" required>
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required>
      </div>
      <div>
        <input type="submit" value="Log in" />
      </div>
    </form>
  </section>
</div>


<?php } ?>


  </body>
</html>