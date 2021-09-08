<?php include "../loginsystem/loginController.php"; ?>
<?php 
$email = $_SESSION['email'];
$phone = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM CUSTOMER WHERE email = '$email' or phone = '$phone'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
    }
}else{
    header('Location: ../loginSystem/login-user.php');
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Customer Marketplace</title>

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
<?php session_start(); ?>
  <?php include '../header/header.php'; ?>

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
          <a href="market.php">
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
          <a href="../customerProfile/profile.php">
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

    <?php include ('db.php');

$mysqli = new mysqli('localhost', 'customerManager', '12345', 'assessment') or die(mysqli_error($mysqli));

if (isset($_GET['filter'])) {
  $status = $_GET['filter'];
  if ($status == "all") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT");
  }
  if ($status == "active") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT where statusProduct = '$status'");
  }
  if ($status == "completed") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT where statusProduct = '$status'");
  }
  if ($status == "name_asc") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT order by productName asc");
  }
  if ($status == "name_desc") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT order by productName desc");
  }
  if ($status == "time_asc") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT order by closeTime asc");
  }
  if ($status == "time_desc") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT order by closeTime desc");
  }
  if ($status == "price_asc") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT order by maximumPrice asc");
  }
  if ($status == "price_desc") {
    $query = $mysqli->query("SELECT * FROM AUCTIONPRODUCT order by maximumPrice desc");
  }
  if ($status == "bids_asc") {
    $query = $mysqli->query("SELECT AUCTIONPRODUCT.*, count(BIDREPORT.productID) as bid_count
    from AUCTIONPRODUCT left join BIDREPORT
      on AUCTIONPRODUCT.productID = BIDREPORT.productID
      group by productID
      order by bid_count asc");
  }
  if ($status == "bids_desc") {
    $query = $mysqli->query("SELECT AUCTIONPRODUCT.*, count(BIDREPORT.productID) as bid_count
    from AUCTIONPRODUCT left join BIDREPORT
      on AUCTIONPRODUCT.productID = BIDREPORT.productID
      group by productID
      order by bid_count desc");
  }
} else {
  $query = $mysqli->query("SELECT * from AUCTIONPRODUCT");
};

    ?>


    <!-- Page Content Holder -->
    <div id="content">
      <div class="row">
        <div class="col-md-10">

          <h1 style="font-size:25px; margin-left:40px; margin-top:20px; ">MARKETPLACE</h1>
          <div class="search-container">
            <form action="market.php" method="post">
              <input type="text" name="search" placeholder="Search by product name" class="input"/>
              <button style="margin: right 30px;" type="submit" class="button btn btn-light " id="search" value=">>"><i class="fas fa-search fa-lg"></i></button>
              <button type="button" class="button btn btn-light " id="filter" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="equalizer.png" style="width: 30px;">
              </button>
              <div class="dropdown-menu" aria-labelledby="filter">
                <!-- FILTER TIME -->
              <a href="market.php?filter=all" class="dropdown-item" name="all">All auctions</a>
              <a href="market.php?filter=active" class="dropdown-item" name="active">Active auctions</a>
              <a href="market.php?filter=completed" class="dropdown-item" name="completed">Completed auctions</a>
              <a href="market.php?filter=name_asc" class="dropdown-item" name="name_asc">Name ASC</a>
              <a href="market.php?filter=name_desc" class="dropdown-item" name="name_desc">Name DESC</a>
              <a href="market.php?filter=time_asc" class="dropdown-item" name="time_asc">Close time ASC</a>
              <a href="market.php?filter=time_desc" class="dropdown-item" name="time_desc">Close time DESC</a>
              <a href="market.php?filter=price_asc" class="dropdown-item" name="price_asc">Current Bid Price ASC</a>
              <a href="market.php?filter=price_desc" class="dropdown-item" name="price_desc">Current Bid Price DESC</a>
              <a href="market.php?filter=bids_asc" class="dropdown-item" name="bids_asc">Bids Placed ASC</a>
              <a href="market.php?filter=bids_desc" class="dropdown-item" name="bids_desc">Bids Placed DESC</a>
              </div>
            </form> 
          </div>
          <div class="container" style="margin-left:30px; margin-top:20px; ">
            <div class="row">
              <!-------Card------>
              <?php

              while ($row = mysqli_fetch_array($query)) {

              ?>
                <div class="col-md-4 mb-1">
                  <div class="card" style="width:300px ">
                    <div class="cards_item">
                      <?php
                       $imageURL = "../customerManageAuction/uploads/" . $row['productImageURL'];
                       ?>
                      <img style="
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        width: 50%;" src="<?php echo $imageURL; ?>" alt="" />
                      <br>
                      <div class="card-text" style="font-size:80%;margin-left:8px; ">
                        Product Name:
                      </div>
                      <div class="form-group" style="width: 290px; margin-left:5px;">
                        <input type="text" class="form-control form-control-sm col-12 " id="" placeholder="Product Name" value="<?php echo $row['productName'] ?>" readonly>
                      </div>
                      <div class="card-text" style="font-size:80%;margin-left:8px; ">
                        Starting price:
                      </div>
                      <div class="form-group" style="width: 290px; margin-left:5px;">
                        <input type="text" class="form-control form-control-sm col-12 " id="" placeholder="$$$" value="<?php echo $row['startingPrice'] ?>" readonly>
                      </div>
                      <div class="card-text" style="font-size:80%;margin-left:8px; ">
                        Current price:
                      </div>
                      <div class="form-group" style="width: 290px; margin-left:5px;">
                        <input type="text" class="form-control form-control-sm col-12 " id="" placeholder="$$$" 
                        value="<?php 
                                  if ('maximumPrice' === 0){
                                    echo $row['startingPrice'];
                                    }else {
                                        echo $row['maximumPrice']; 
                                    }
                                ?>" 
                        readonly>
                      </div>
                      <div class="row">
                        
                        <div class="column" style="width:60%">
                          <div class="card-text" style="margin-left: 10px; font-size: 80%;">Closing time:</div>
                          <div style="margin-left:10px;"><?php echo $row['closeTime'] ?></div>
                        </div>
                        <div class="column" style="width:40%">
                          <div class="card-text" style="margin-left: 10px; font-size: 80%;">Status:</div>
                          <div style="margin-left:10px;">
                            <?php
                            date_default_timezone_set("asia/ho_chi_minh");
                            $currentTime= strtotime("now");
                            $closeTime= strtotime($row['closeTime']);
                            if($currentTime > $closeTime){
                              $row['statusProduct'] = 'completed';
                            }
                            echo $row['statusProduct'] 
                            ?>
                           </div>
                        </div>
                      </div>
                      </p>
                      <div class="card-body">
                        <a class="btn btn-warning" 
                        href="../customerProductDetail/productDetail.php?productID=<?php echo $row['productID'] ?>" 
                        class="card-link " 
                        style="font-size: 90%; width: 90%;">View Details</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              };
              ?>
            </div>
          </div>
        </div>
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
<script>

</script>