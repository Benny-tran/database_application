<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Product Details</title>

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
    <!-- Wrapper for the page content -->
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
                    <a href="../adminMarketplace/market.php">
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
        <?php
        require "db.php";
        $mysqli = new mysqli('localhost', 'root', '12345', 'assessment') or die(mysqli_error($mysqli));

        ?>

        <!-- Page Content Holder -->

        <div id="content">
            <!-- Read Data from database -->
            <?php
            include('db.php');
            if (isset($_GET['productID'])) {
                $id = mysqli_real_escape_string($con, $_GET['productID']);
                $sql = "SELECT productID,productName,name,startingPrice,maximumPrice,closeTime,productImageURL,descriptionProduct
                FROM auctionProduct JOIN customer ON customerID=citizenID WHERE productID=$id ";
                $result = mysqli_query($con, $sql);
                $details = mysqli_fetch_assoc($result);
                $closedate = date_format(date_create($details['closeTime']), 'm/d/Y H:i:s');
                mysqli_close($con);
            }
            ?>
            <div class="row">
                <!-- Product Details Card -->
                <div class="col-lg-4" style="margin-top:80px">
                    <?php
                    $imageURL = "../customerManageAuction/uploads/" . $details['productImageURL'];
                    ?>
                    <img style= "
                    display: block;
                    margin-top: 50px;
                    margin-left: auto;
                    margin-right: auto;
                    width: 70%;" src="<?php echo $imageURL; ?>" alt="" />

                </div>
                <div class="col-lg-8">

                    <div class="" id="product-header"><?php echo $details['productName'] ?></div>
                    <hr class="border-dark">
                    <br>
                    <div id="item"><b>Seller Name:</b> <?php echo $details['name'] ?></div>
                    <br>
                    <div id="item"><b>Product Description:</b> <?php echo $details['descriptionProduct'] ?></div>
                    <br>
                    <div id="item"><b>Starting Price:</b> <?php echo $details['startingPrice'] ?></div>
                    <br>
                    <div id="item"><b>Current Bid:</b> <?php echo $details['startingPrice']+20 ?></div>
                    <!-- shit there's no current bid value in database -->
                    <br>
                    <div id="item"><b>Close Date:</b> <?php echo $details['closeTime'] ?></div>
                    <br>
                    <div id="item-time"><b>Close Time:</b>
                        <script language="JavaScript">
                            TargetDate = "<?php echo $closedate ?>";
                            BackColor = "white";
                            ForeColor = "black";
                            CountActive = true;
                            CountStepper = -1;
                            LeadingZero = true;
                            DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
                            FinishMessage = "Bidding closed!";
                        </script>
                        <script language="JavaScript" src="countdown.js"></script>
                    </div>
                    <br>
                    <div id="item"><b>Maximum Price:</b> <?php echo $details['maximumPrice'] ?></div>
                    <br>
                    <hr class="border-dark">
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
    <script>
        var d = new Date();
        var f = d.toUTCString();
        document.getElementById("card1").innerHTML = f;
    </script>

    <script>
        var d = new Date();
        var e = d.toUTCString();
        document.getElementById("card2").innerHTML = e;
    </script>

    <script>
        var d = new Date();
        var g = d.toUTCString();
        document.getElementById("card3").innerHTML = g;
    </script>



</body>

</html>