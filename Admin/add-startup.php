<?php 
include 'conn.php';

if (isset($_GET['id']) && $_GET['id']!="") {
  $id = $_GET['id'];
  } else {
      $id = 0;
  }
$query = "Select * from startup where id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$description = $row['description'];
$type = $row['type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Investup Admin
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" http://localhost/investup/Website/ ">
        <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">InvestUp</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1"><?php echo $_SESSION['user_email'] ?></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white bg-gradient-primary" href="add-startup.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Add Startup</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="my-startup.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">My Startup</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="investment.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">My Investment</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="../Website/index.php" type="button">Back</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Add Startup</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="container">
                    
                        <form class="text-start" method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Startup Name :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Startup Name" value="<?php echo $name; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Startup Image :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Startup Type :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <?php
                                          if($type == 'edtech'){
                                            $edselected = 'selected';
                                            $fiselected = '';
                                            $heselected = '';
                                          }elseif($type == 'fintech'){
                                            $edselected = '';
                                            $fiselected = 'selected';
                                            $heselected = '';
                                          }elseif($type == 'healthtech'){
                                            $edselected = '';
                                            $fiselected = '';
                                            $heselected = 'selected';
                                          }elseif($type == 'agtech'){
                                            $edselected = '';
                                            $fiselected = '';
                                            $heselected = 'selected';
                                          }elseif($type == 'cleantech'){
                                            $edselected = '';
                                            $fiselected = '';
                                            $heselected = 'selected';
                                          }elseif($type == 'foodtech'){
                                            $edselected = '';
                                            $fiselected = '';
                                            $heselected = 'selected';
                                          }
                                        ?>
                                        <select class="form-control" name="type" required>
                                            <option value="">--Select Type--</option>
                                            <option value="edtech" <?php echo $edselected; ?>>Edtech</option>
                                            <option value="fintech" <?php echo $fiselected; ?>>Fintech</option>
                                            <option value="healthtech" <?php echo $heselected; ?>>Healthtech</option>
                                            <option value="agtech" <?php echo $heselected; ?>>Agtech</option>
                                            <option value="cleantech" <?php echo $heselected; ?>>Cleantech</option>
                                            <option value="foodtech" <?php echo $heselected; ?>>Foodtech</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Startup Description :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <textarea class="form-control" name="description" required placeholder="Enter Startup Description"><?php echo $description; ?></textarea>
                                    </div>
                                </div>
                                <!-- founded year, documents link, target, min subscription, Valuation Cap, youtube link -->
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Founded on :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="text" class="form-control" name="founded" required placeholder="Enter Founded Year" value="<?php echo $founded_year; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Documents :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="url" class="form-control" name="documents" required placeholder="Enter Documents Link" value="<?php echo $documents; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Youtube Link :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="url" class="form-control" name="youtube" required placeholder="Enter Youtube Link" value="<?php echo $documents; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Target :</label>
                                    <div class="input-group input-group-outline my-3">
                                        <input type="number" class="form-control" name="target" required placeholder="Enter Target" value="<?php echo $target; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Min Subscription :</label>
                                    <div class="input-group input-group-outline my-3">
                                    <input type="number" class="form-control" name="min_subscription" required placeholder="Enter Min Subscription" value="<?php echo $min_subscription; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight:bold; font-size:1.7vw;">Valuation Cap  :</label>
                                    <div class="input-group input-group-outline my-3">
                                    <input type="number" class="form-control" name="valuation_cap" required placeholder="Enter Valuation Cap" value="<?php echo $valuation_cap; ?>">
                                    </div>
                                </div>
                                        


                                <div class="col-md-6" style="margin:0 auto;">
                                  <?php if (isset($_GET['id']) && $_GET['id']!="") { ?>
                                      <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="update">Update</button>
                                  <?php } else { ?>
                                      <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" name="submit">Submit</button>
                                  <?php } ?>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php

if (isset($_POST['submit'])) {
    $temp=0;
    $cnt=0;
    $targetDir = "upload/image/";
    $allowTypes = array('jpg','png','jpeg','gif','webp');
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $micro=microtime();
    $insert  = array(
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'type' => $_POST['type'],
            'email' => $_SESSION['user_email']
        );
    if(!empty($_FILES['image']['name'])){
        $fileName1 = basename($_FILES['image']['name']);
        $div=explode('.',$fileName1);
        $file_ext=strtolower(end($div));
        $fileName=substr(md5($fileName1),0,6).'.'.$file_ext;
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                $insert=array_merge($insert,array('image'=>$targetFilePath));
            }
        }
    }
    $insert_status =insert_data('startup', $insert);
    if($insert_status)
    {
        echo "<script>alert('Startup Added Successfully!!');window.location='add-startup.php';</script>";
    }
}

if (isset($_POST['update'])) {
  $temp=0;
  $cnt=0;
  $targetDir = "upload/image/";
  $allowTypes = array('jpg','png','jpeg','gif');
  $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
  $micro=microtime();
  $update  = array(
      'name' => $_POST['name'],
      'description' => $_POST['description'],
      'type' => $_POST['type'],
      'email' => $_SESSION['user_email']
    );
  if(!empty($_FILES['image']['name']) || !isset($_POST['image'])){
      $fileName1 = basename($_FILES['image']['name']);
      $div=explode('.',$fileName1);
      $file_ext=strtolower(end($div));
      $fileName=substr(md5($fileName1),0,6).'.'.$file_ext;
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      if(in_array($fileType, $allowTypes)){
          if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
              $update=array_merge($update,array('image'=>$fileName));
          }
      }
  }
  $condtion = "id = '".$_GET['id']."'";
  $update_status =update_data('startup', $update, $condtion);
  // $insert_status =insert_data('about', $insert);
  if($update_status)
  {
      echo "<script>alert('Startup Updated Successfully!!');window.location='my-startup.php';</script>";
  }
}
?>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>