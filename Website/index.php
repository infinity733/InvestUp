<?php include 'header.php';

if (isset($_SESSION["type"])) {

  // sql query to fetch all the unique users with whom the user has chatted or the user has received messages from


  $user_email = $_SESSION["user_email"];
  $conn = mysqli_connect("localhost", "root", "", "investup");
  // $sql = "SELECT * FROM messages WHERE sender = '$user_email' OR recipient = '$user_email' ORDER BY timestamp ASC";
  $sql = "SELECT DISTINCT sender, recipient FROM messages WHERE sender = '$user_email' OR recipient = '$user_email' ORDER BY timestamp ASC";

  $result = mysqli_query($conn, $sql);

  // array to store all the chats
  $chats = array();

  // loop through all the chats and store them in the array
  while ($row = mysqli_fetch_assoc($result)) {
    $chats[] = $row;
  }


  // show the mail of the user with whom the user has chatted or the user has received messages from , also check that the user is not chatting with himself and store it in a new array 
  $chat_mails = array();
  foreach ($chats as $chat) {
    if ($chat["sender"] == $user_email) {
      if (!in_array($chat["recipient"], $chat_mails)) {
        $chat_mails[] = $chat["recipient"];
      }
    } else {
      if (!in_array($chat["sender"], $chat_mails)) {
        $chat_mails[] = $chat["sender"];
      }
    }
  }

}


?>

<style>
  .startup-btn {
    background-color: #f3826e !important;
    border: none;
  }

  .startup-btn:hover {
    background-color: #0ea2bd !important;
  }
</style>

<section id="hero-animated" class="hero-animated d-flex align-items-center">
  <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
    data-aos="zoom-out">
    <img src="assets/img/hero-img.svg" class="img-fluid animated">
    <h2>Invest In <span>Innovation</span> Invest In <span> Future</span></h2>
    <p>Your Gateway to High-Potential Startups</p>
    <?php 
    if(!isset($_SESSION["user_email"]))
      echo ' <div class="d-flex">
      <a href="signup.php" class="btn-get-started scrollto">Join as a Founder</a>

      <a href="signup.php" class="glightbox btn-watch-video d-flex align-items-center"><span>Join as a
          Investor</span></a>
    </div>'
    
    ?>
  </div>

  <?php if (isset($_SESSION["type"])) { ?>

    <i class="bi bi-chat-dots-fill" data-bs-toggle="modal" data-bs-target="#exampleModal"
      style="font-size: 50px;color:#0284C7;position:fixed;bottom:70px;right:50px; cursor:pointer; z-index:1000">
    </i>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Chats</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php
            // loop through the array of mails and show the mail of the user with whom the user has chatted or the user has received messages from
            foreach ($chat_mails as $chat_mail) {
              echo "<div style='margin-bottom:10px; padding:10px;box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px; border-radius:5px'><a href='./chat/index.php?with=$chat_mail'>$chat_mail</a> </div>";
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php
  } ?>

</section>

<main id="main">

  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container">

      <div class="row gy-4">

        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-out">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-activity icon"></i></div>
            <h4><a href="" class="stretched-link">Fast & Easy To Invest </a></h4>
            <p>Invest in high-potential startups with ease and confidence on our platform. Discover personalized
              investment opportunities and streamline your investment process today.</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
            <h4><a href="" class="stretched-link">Effective</a></h4>
            <p>Our platform offers a streamlined investment process and personalized opportunities for effective
              investing. Invest confidently in high-potential startups with our comprehensive platform.</p>
          </div>
        </div><!-- End Service Item -->

        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
          <div class="service-item position-relative">
            <div class="icon"><i class="bi bi-watch icon"></i></div>
            <h4><a href="" class="stretched-link">24X7 customer service</a></h4>
            <p>Our dedicated customer service team is available 24/7 to assist you with any questions or concerns.
              Experience exceptional service and support as you invest in the future with our platform.</p>
          </div>
        </div><!-- End Service Item -->

        <!-- End Service Item -->

      </div>

    </div>
  </section><!-- End Featured Services Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>About Us</h2>
        <p>Welcome to our startup investment platform for angel investors! We are dedicated to providing a comprehensive
          and easy-to-use platform for angel investors to discover and invest in promising early-stage startups.

          Our team understands the challenges that angel investors face when searching for the right investment
          opportunities. With our deep experience in the startup ecosystem, we have designed a platform that streamlines
          the investment process and makes it easier to discover, evaluate, and invest in high-potential startups.</p>
      </div>

      <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-5">
          <div class="about-img">
            <img src="assets/img/about.svg" class="img-fluid" alt="">
          </div>
        </div>

        <div class="col-lg-7">
          <h3 class="pt-0 pt-lg-5">Invest in Innovation, Invest in the Future</h3>

          <!-- Tabs -->
          <ul class="nav nav-pills mb-3">
            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Investor</a></li>
            <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Founder</a></li>

          </ul><!-- End Tabs -->

          <!-- Tab Content -->
          <div class="tab-content">

            <div class="tab-pane fade show active" id="tab1">

              <p class="fst-italic">you'll gain access to a curated selection of high-potential startups and
                personalized investment opportunities. Join our community of angel investors and invest in the next
                generation of game-changing startups today</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2"></i>
                <h4>Potential for high returns</h4>
              </div>
              <p>Startups have the potential to generate higher returns than traditional investments like stocks and
                bonds.</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2"></i>
                <h4>Diversification</h4>
              </div>
              <p>Investing in startups allows investors to diversify their portfolio and reduce their overall risk.</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2"></i>
                <h4>Opportunity to make a difference:</h4>
              </div>
              <p>By investing in startups, investors can support the growth and development of new businesses, which can
                have a positive impact on society.</p>

            </div><!-- End Tab 1 Content -->

            <div class="tab-pane fade show" id="tab2">

              <p class="fst-italic">our platform provides you with access to a network of experienced angel investors
                and the resources you need to grow your business. Pitch your startup to investors and unlock your full
                potential with our comprehensive investment platform.</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2"></i>
                <h4>Access to capital</h4>
              </div>
              <p>Startup founders can connect with angel investors who are willing to provide the necessary capital to
                help fund their business.</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2"></i>
                <h4>Networking opportunities:</h4>
              </div>
              <p>Our platform provides a network of experienced angel investors who can provide valuable advice,
                connections, and support to help startups grow.</p>

              <div class="d-flex align-items-center mt-4">
                <i class="bi bi-check2"></i>
                <h4>Exposure to a wider audience</h4>
              </div>
              <p>Pitching your startup on our platform can help you gain exposure to a wider audience of investors and
                increase your chances of securing funding.</p>

            </div><!-- End Tab 2 Content -->



          </div>

        </div>

      </div>

    </div>
  </section><!-- End About Section -->



  <!-- ======= Call To Action Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-out">

      <div class="row g-5">

        <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
          <h3>Join As Building The Next Thing</h3>
          <p>Don't wait any longer to start your investment journey! Take the first step today and join us in our
            mission to support the growth of the startup ecosystem and invest in the next generation of game-changing
            startups. With our platform, you'll have the opportunity to make a real difference and unlock your full
            potential as an investor</p>
          <a class="cta-btn align-self-start" href="#">Join Us</a>
        </div>

        <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
          <div class="img">
            <img src="assets/img/cta.jpg" alt="" class="img-fluid">
          </div>
        </div>

      </div>

    </div>
  </section>


  <!-- ======= Startup Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Start Up</h2>
        <div class="row text-center" style="margin:0 auto;">
          <?php
          $getStartup = mysqli_query($conn, "select * from startup");
          while ($row = mysqli_fetch_array($getStartup)) {
            ?>
            <div class="col-4 <?php echo $row['type']; ?>">
              <div class="card" style="margin:1vw;">
                <img src="../Admin/<?php echo $row['image']; ?>" class="card-img-top" alt="..." style="height:14vw;">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $row['name']; ?>
                  </h5>
                  <p class="card-text">
                    <?php echo $row['description']; ?>
                  </p>
                  <?php
                  if (isset($_SESSION['user_email'])) {
                    ?>
                    <a href="invest.php?startup=<?php echo $row['id']; ?>" class="btn btn-primary startup-btn">Invest
                      Now</a>
                  <?php } else { ?>
                    <a href="signup.php" class="btn btn-primary startup-btn">Login To Invest Now</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="col-4 fintech">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 2</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <?php
                if (isset($_SESSION['user_email'])) {
                  $startup = 'Start Up 2';
                  ?>
                  <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary startup-btn">Invest Now</a>
                <?php } else { ?>
                  <a href="signup.php" class="btn btn-primary startup-btn">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-4 fintech">
            <div class="card" style="margin:1vw;">
              <img src="images/carousel-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Start Up 3</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's content.</p>
                <?php
                if (isset($_SESSION['user_email'])) {
                  $startup = 'Start Up 2';
                  ?>
                  <a href="invest.php?startup=<?php echo $startup; ?>" class="btn btn-primary startup-btn">Invest Now</a>
                <?php } else { ?>
                  <a href="signup.php" class="btn btn-primary startup-btn">Login To Invest Now</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-4" style="margin:0 auto;">
            <a href="start-up.php" class="btn btn-primary startup-btn">View More</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Startup Section -->


  <?php include 'footer.php'; ?>