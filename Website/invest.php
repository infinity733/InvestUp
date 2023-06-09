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
      <header>Invest</header>
      <?php
        $getStartup = mysqli_query($conn, "select * from startup where id = '$_GET[startup]'");
        $row = mysqli_fetch_array($getStartup);
      ?>
      <form action="" method="post">
        <input type="text" placeholder="Enter Amount"id="amount">
        <input type="text"  id="startup" value="<?php echo $row['name']; ?>" readonly>
        <!-- <select name="type" required>
          <option value="">Investor</option>
          <option value="">Founder</option>
        </select> -->
      <button type="button" onclick="redirectToChat()" class="btn btn-success" style="width:100%; padding:8px 8px;font-size:20px; color:white; background-color:#F3826E;border-radius:5px;outline:none;border: none;cursor:pointer">Chat with Founder</button>
      </form>
      <input onclick="pay_now()" type="submit"  class="button" value="Pay Now">
    </div>
  </div>
</body>
</html>
<script>
function redirectToChat() {
  const queryParams = new URLSearchParams(window.location.search);
  const email = queryParams.get('email');
  window.location.href = "./chat/index.php?with="+email;
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            function pay_now(){
                var amt=jQuery('#amount').val();
                var startup=jQuery('#startup').val();
                var options = {
                    "key": "rzp_test_v1Bfci8IrZODvl", 
                    "amount": amt*100, 
                    "currency": "INR",
                    "name": "InvestUp",
                    "description": "Test Transaction",
                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                    "handler": function (response){
                        jQuery.ajax({
                            type:'post',
                            url:'payment-process.php',
                            data:"startup="+startup+"&amt="+amt,
                            success:function(result){
                                window.location.href="index.php";
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();                
            }
        </script>
