<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin Marketplace</title>

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
  <?php include '../header/header.php'; ?>

  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <div class="user-info">
            <h3>Welcome</h3>
            <h5>Admin</h5>
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
            <a href="../adminBalance/balance.php">
                <i class="fas fa-cubes"></i>
                <span>Customer Balance</span>
            </a>
        </li>
        <li>
            <a href="../adminBidHistory/bid.php">
                <i class="fas fa-user"></i>
                <span>Bid History</span>
            </a>
        </li>
        <li>
            <a href="../adminTransactionsHistory/transaction.php">
                <i class="fas fa-gavel"></i>
                <span>Transactions History</span>
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

    $mysqli = new mysqli('localhost', 'root', '12345', 'assessment') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * from AUCTIONPRODUCT") or die($mysqli->error);

    if (isset($_POST['search'])) {
      $searchq = $_POST['search'];
      $query = $mysqli->query("SELECT * from AUCTIONPRODUCT where productName LIKE '%$searchq%'") or die("Could not find any matching auctions");
    }
    if (isset($_POST['filter'])) {
      $statusFilter = $_POST['filter'];
      $query = $mysqli->query("SELECT * from AUCTIONPRODUCT where status = 'completed'") or die($mysqli->error);

    }

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
              <div class="dropdown-menu">
                <button class="dropdown-item" value="filter">All auctions</button>
                <button class="dropdown-item" name="active" value="filter">Active auctions</button>
                <button class="dropdown-item" name="completed" value="filter">Completed auctions</button>
              </div>
            </form> 
          </div>
          <div class="container" style="margin-left:30px; margin-top:10px; ">
            <div class="row">
              <!-------Card------>
              <?php

              while ($row = mysqli_fetch_array($result)) {

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
                        <input type="text" class="form-control form-control-sm col-12 " id="" placeholder="$$$" value="<?php echo $row['maximumPrice'] ?>" readonly>
                      </div>
                      <div class="row">
                        <div class="column" style="width:40%">
                          <div class="card-text" style="margin-left: 10px; font-size: 80%;">Status:</div>
                          <div style="margin-left:10px;"><?php echo $row['statusProduct'] ?></div>
                        </div>
                        <div class="column" style="width:60%">
                          <div class="card-text" style="margin-left: 10px; font-size: 80%;">Closing time:</div>
                          <div style="margin-left:10px;"><?php echo $row['closeTime'] ?></div>
                        </div>
                      </div>
                      </p>
                      <div class="card-body">
                        <a class="btn btn-warning" 
                        href="../adminProductDetail/productDetail.php?productID=<?php echo $row['productID'] ?>" 
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