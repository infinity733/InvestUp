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

    <div class="container">
      <select class="form-select" aria-label="Default select example" id="StartUp" onchange="filter();" style="padding:1vw;">
        <option selected>All</option>
        <option value="Edtech">Edtech</option>
        <option value="Fintech">Fintech</option>
        <option value="Healtech">Healtech</option>
        <option value="Agtech">Agtech</option>
        <option value="Cleantech">Cleantech</option>
        <option value="Foodtech">Foodtech</option>
      </select>
    </div>

    
      <div class="container" style="margin-top:6vw;margin-bottom: 4vw;">
        <div class="row text-center" style="margin:0 auto;">
          <?php
            $getStartup = mysqli_query($conn, "select * from startup");
            while($row = mysqli_fetch_array($getStartup)){
          ?>
          <div class="col-4 <?php echo $row['type']; ?>">
            <div class="card" style="margin:1vw;">
              <img src="../Admin/<?php echo $row['image']; ?>" class="card-img-top" alt="..." style="height:14vw;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text"><?php echo $row['description']; ?></p>
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
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="col-4 fintech">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 2';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 healthcare">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 3';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 edtech">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 4</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 4';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 fintech">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 5</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 5';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 healthcare">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 6</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 6';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 edtech">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 7</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 7';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 fintech">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 8</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 8';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 healthcare">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 9</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <?php
                  if(isset($_SESSION['user_email'])){
                    $startup = 'Start Up 9';
                ?>
                <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary">Invest Now</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-primary">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div> -->
        </div>
      </div>
<?php include 'footer.php'; ?>

<script>
  function filter(){
    var startup = document.getElementById('StartUp').value;
    var edtech = document.getElementsByClassName('edtech');
    var fintech = document.getElementsByClassName('fintech');
    var healthcare = document.getElementsByClassName('healthcare');

    if(startup == "Edtech"){
      for (var i=0;i<edtech.length;i+=1){
          edtech[i].style.display = 'block';
      }  
      for (var i=0;i<fintech.length;i+=1){
          fintech[i].style.display = 'none';
      }  
      for (var i=0;i<healthcare.length;i+=1){
          healthcare[i].style.display = 'none';
      }  
    }
    if(startup == "Fintech"){
      for (var i=0;i<edtech.length;i+=1){
          edtech[i].style.display = 'none';
      }  
      for (var i=0;i<fintech.length;i+=1){
          fintech[i].style.display = 'block';
      }  
      for (var i=0;i<healthcare.length;i+=1){
          healthcare[i].style.display = 'none';
      }  
    }
    if(startup == "Healthcare"){
      for (var i=0;i<fintech.length;i+=1){
          fintech[i].style.display = 'none';
      }  
      for (var i=0;i<edtech.length;i+=1){
          edtech[i].style.display = 'none';
      }  
      for (var i=0;i<healthcare.length;i+=1){
          healthcare[i].style.display = 'block';
      }  
    }
  }
</script>