<?php
include "../loginsystem/loginController.php";

$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
  $sql = "SELECT * FROM CUSTOMER WHERE email = '$email' or phone = '$phone'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
    $customerID = $fetch_info['citizenID'];
  }
} else {
  header('Location: ../loginSystem/login-user.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Collapsible sidebar using Bootstrap 4</title>

  <!-- Bootstrap CSS CDN -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
<?php session_start(); ?>
  <?php include '../header/header.php' ?>
  <!-- Wrapper for the page content -->
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <div class="user-info">
          <h3>Welcome</h3>
          <h5><?php echo $fetch_info['name'] ?></h5>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul>
        <li>
          <a href="../customerMarketPlace/market.php">
            <i class="fas fa-book"></i>
            <span>Marketplace</span>
          </a>
        </li>
        <li>
          <a href="../customerManageAuction/auction.php">
            <i class="fas fa-cubes"></i>
            <span>Manage Auction</span>
          </a>
        </li>
        <li>
          <a href="../customerBidHistory/bid.php">
            <i class="fas fa-gavel"></i>
            <span>Bid History</span>
          </a>
        </li>
        <li>
          <a href="profile.php">
            <i class="fas fa-user"></i>
            <span>Profile</span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </nav>
    
    <!-- Read Customer Profile data from database -->
    <?php
    require "db.php";
    $mysqli = new mysqli('localhost','customerManager','12345','assessment') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * from CUSTOMER WHERE email = '$email' or phone = '$phone'") or die($mysqli->error);
    ?>

    <!-- Page Content Holder -->
    <div id="content">
      <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="col-md-12">
            <div class="vertical-line"></div>
            <div class="row">

              <div class="col-6">
                <h1 style="font-size: 30px;">Profile</h1>
                <!----Avatar---->
                    <img class="d-block m-auto " src="uploads/DefaultUser.png" alt="avatar" style="width:250px; border-radius: 20px"
                    onclick="triggerClick()" id="profileDisplay">
                <br>
                <br>

                <!-----Customer name---->
                <div id="name-tag">
                <label for="currency-field" style="font-size:big;">Username:</label>
                  <?php echo $row['name'] ?>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <?php
                        if(isset($_SESSION['profile'])){
                            echo "<h5 class='alert alert-warning text-center'>".$_SESSION['profile']."</h5>";
                            unset($_SESSION['profile']);
                            
                        }
                    ?>
                </div>
            
                <br>
                <!-----Form---->

                <br>
                <form>
                    <div class="form-group col-md-10">
                        <label for="Email" style="font-size:small;">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email or phone number" value="<?php echo $row['email'] ?>" readonly>
                    </div>
                    <br>
                    <br>
                    <div class="form-group col-md-10">
                        <label for="currency-field" style="font-size:small;">Main balance</label>
                        <div class="sign">
                        <input type="text" class="form-control " id="inputAddress" name="currency-field" id="currency-field" value="<?php echo $row['accountBalance'] ?>" data-type="currency" placeholder="" readonly>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="form-group col-md-10">
                    <label for="Pnumber" style="font-size:small;">Phone number</label>
                    <input type="text" class="form-control" id="inputPnumber" placeholder="" value="+84<?php echo $row['phone'] ?>" readonly>
                  </div>
                </form>
              </div>

              <div class="col-6 ">
                <form>
                  <div class="form-group col-md-10" style="margin-left: 20px;">
                    <label for="Pnumber" style="font-size:small;">Citizen ID</label>
                    <input type="text" class="form-control" id="inputID" placeholder="" value="<?php echo $row['citizenID'] ?>" readonly>
                  </div>
                  <br>
                  <br>
                  <div class="form-group col-md-10" style="margin-left: 20px;">
                    <label for="Pnumber" style="font-size:small;">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="" value="<?php echo $row['address'] ?>" readonly>
                  </div>
                  <br>
                  <br>
                  <div class="form-group col-md-10" style="margin-left: 20px;">
                    <label for="Pnumber" style="font-size:small;">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="" value="<?php echo $row['city'] ?>" readonly>
                  </div>
                  <br>
                  <br>
                  <div class="form-group col-md-10" style="margin-left: 20px;">
                    <label for="Pnumber" style="font-size:small;">Country</label>
                    <input type="text" class="form-control" id="inputCountry" placeholder="" value="<?php echo $row['country'] ?>" readonly>
                  </div>
                  <br>
                </form>
                <br>
                <div class="row-button" id="row-button" style=" margin-left: 60px;">
                  <button class="button" name="edit" data-toggle="modal" data-target="#updateInfoModal">Edit profile</button>

                </div>


              
               
                <!---modal-->

                <div class="modal fade" id="updateInfoModal" tabindex="-1" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Personal Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post">
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $row['citizenID'] ?>">
                          <div class="form-group ">
                            <label>Name</label>
                            <input class="form-control" name="name" value="<?php echo $row['name'] ?>" id="name" type="text">
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" value="<?php echo $row['address'] ?>" id="address" type="text">
                          </div>
                          <div class="form-group">
                            <label>City</label>
                            <input class="form-control" name="city" value="<?php echo $row['city'] ?>" id="city" type="text">
                          </div>
                          <div class="form-group">
                            <label>Country</label>
                            <input class="form-control" name="country" value="<?php echo $row['country'] ?>" id="country" type="text">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!---------------Edit modal--------------------------->
                <?php require 'db.php';
                session_start();
                
                if (isset($_POST['update'])) {

                    $name = $_POST['name'];
                    $city = $_POST['city'];
                    $country = $_POST['country'];
                    $address = $_POST['address'];

                    $query = "UPDATE customer SET name='$name',address='$address',city='$city'
                            ,country='$country' WHERE citizenID='$customerID' ";
                    $query_run = mysqli_query($con, $query);
                    if($query_run){
                        $_SESSION['profile'] = "Profile Updated Successfully";
                        header("location:profile.php");
                    }
                    else{
                        $_SESSION['profile'] = "Profile Insert Failed";
                    }
                }
                ?>
              </div>
            </div>
          </div>
        <?php
        };
        ?>
      </div>
    </div>
  </div>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


</body>

</html>