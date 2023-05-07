<?php include 'conn.php'; ?>

<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--<title>Login & Registration Form | CoderGirl</title>-->
  <!---Custom CSS File--->
 <style>
    /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  width: 100%;
  background: #2a2b2a;
}
.container{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 400px;
  width: 100%;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
}
.container .registration{
  display: none;
}
#check:checked ~ .registration{
  display: block;
}
#check:checked ~ .login{
  display: none;
}
#check{
  display: none;
}
.container .form{
  padding: 2rem;
}
.form header{
  font-size: 2rem;
  font-weight: 500;
  text-align: center;
  margin-bottom: 1.5rem;
}
 .form input,select{
   height: 50px;
   width: 100%;
   padding: 0 15px;
   font-size: 17px;
   margin-bottom: 1.3rem;
   border: 1px solid #ddd;
   border-radius: 6px;
   outline: none;
 }
 .form select,input:focus{
   box-shadow: 0 1px 0 rgba(0,0,0,0.2);
 }
.form a{
  font-size: 16px;
  color: #009579;
  text-decoration: none;
}
.form a:hover{
  text-decoration: underline;
}
.form input.button{
  color: #fff;
  background:#f3826e;
  font-size: 1.2rem;
  font-weight: 500;
  letter-spacing: 1px;
  margin-top: 1.7rem;
  cursor: pointer;
  transition: 0.4s;
}
.form input.button:hover{
  background: #006653;
}
.signup{
  font-size: 17px;
  text-align: center;
}
.signup label{
  color: #009579;
  cursor: pointer;
}
.signup label:hover{
  text-decoration: underline;
}

 </style>
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="conn.php" method="post">
        <input type="text" placeholder="Enter your email" name="email" required>
        <input type="password" placeholder="Enter your password" name="password" required>
        <!-- <select name="type" required>
          <option value="">Investor</option>
          <option value="">Founder</option>
        </select> -->
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login" name="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form action="" method="post">
        <input type="text" placeholder="Enter your email" name="email" required>
        <input type="password" placeholder="Create a password" name="password" required>
        <input type="password" placeholder="Confirm your password" name="cpassword" required>
        <select name="type" required>
          <option value="">--Select Type--</option>
          <option value="Investor">Investor</option>
          <option value="Founder">Founder</option>
        </select>
        <input type="submit" class="button" value="Signup" name="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>


<?php

if(isset($_POST['Signup'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $type = $_POST['type'];

  if($password == $cpassword){
    $insert = mysqli_query($conn, "INSERT INTO `user`(`email`, `password`, `type`) VALUES ('$email',MD5('$password'),'$type')");
    if($insert){
      echo "<script>alert('You Have Successfully Registered!!');window.location='signup.php';</script>";
    }
  }
  else{
    echo "<script>alert('Password Not Match!!');window.location='signup.php';</script>";
  }
}
?>
