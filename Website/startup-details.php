<?php
// $parts = parse_url($url);
// parse_str($parts['query'], $query);
// echo $query['startup'];

// echo $_GET['startup'];

// function getDB(){
// 	$conn=mysqli_connect("localhost","root","","investup");
// 	if(!$conn)
// 	{
// 		die("could not connect server... and Database!!");
// 	} else {
// 		return $conn;
// 	}
// }
?>

<?php include 'header.php'; ?>

<style>
  .btn{
    background-color: #f3826e !important;
    border: none;
  }
  .btn:hover{
    background-color: #0ea2bd !important;
  }
</style>
  <main id="main" style="margin-top: 8vw;">

    <?php
    // show start up details
    // echo ("select * from startup where id=".$_GET['startup']);
    $getStartup = mysqli_query(getDB(), "select * from startup where id=".$_GET['startup']);
    $row = mysqli_fetch_array($getStartup);
    // print_r($row);
    // echo $row[5];
    // echo $row[5];
    // echo $row["email"];

    ?>
    

    <div class="container my-5">

        <div class="card details-card p-0">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <img class="m-2 img-fluid details-img" src= "../admin/<?php echo $row["image"]; ?>"  alt="">
                    <iframe class="m-2"  width="620" height="315"
                        src="<?php echo $row["youtube"]; ?>">
                        </iframe><br>
                    <a    href="<?php echo $row["documents"]; ?>" target="_blank"><button name="add_to_cart" type="submit" class="m-2 btn btn-primary btn-lg">Documents</button></a>
                    <br style="margin-buttom:30px;">
                </div>
                <div class="col-md-6 col-sm-12 description-container p-5">
                    <div class="main-description">
                        <h3><?php echo $row["name"]; ?></h3>
                        <br>
                        <form class="add-inputs" method="post">
                            <!-- <button name="add_to_cart" type="submit" class="btn btn-primary btn-lg">Invest now</button> -->
                            <?php
                  if(isset($_SESSION['user_email'])  ){
                    
                ?>
                <!-- // if user_email is same as row[email] then button will be disabled -->
                <?php if($_SESSION['user_email'] == $row['email']){ ?>
                <a href="#" class="btn btn-primary disabled" >Invest Now</a>
                <?php } else { ?>
                  <a href="invest.php?startup=<?php echo $row['id'] ?>&email=<?php echo $row['email'] ?>" class="btn btn-primary " >Invest Now</a>
                <?php } ?>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
                
                        </form>
                        <hr>


                        <p class="product-title mt-4 mb-1">About</p>
                        <p class="product-description mb-4">
                            <?php echo $row["description"]; ?>
                        </p>

                        <hr>

                        <p class="product-title mt-4 mb-1">Type</p>
                        <p class="product-description mb-4">
                            <?php echo $row["type"]; ?>
                        </p>
                        <p class="product-title mt-4 mb-1">Target</p>
                        <p class="product-description mb-4">
                            <?php echo $row["target"]; ?>
                        </p>
                        <p class="product-title mt-4 mb-1">Min Subscription</p>
                        <p class="product-description mb-4">
                            <?php echo $row["min_subscription"]; ?>
                        </p>
                        <p class="product-title mt-4 mb-1">Valuation Cap</p>
                        <p class="product-description mb-4">
                            <?php echo $row["valuation_cap"]; ?>
                        </p>
                        <p class="product-title mt-4 mb-1">Founded</p>
                        <p class="product-description mb-4">
                            <?php echo $row["founded"]; ?>
                        </p>
                        <p class="product-title mt-4 mb-1">Founded By</p>
                        <p class="product-description mb-4">
                            <?php echo $row["email"]; ?>
                        </p>

                        <hr>






                    </div>




                </div>
            </div>
            <!-- End row -->
        </div>


<?php include 'footer.php'; ?>
