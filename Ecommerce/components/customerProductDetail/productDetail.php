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
        $customerID=$fetch_info['citizenID'];
        $balance=$fetch_info['accountBalance'];
        global $customerID;
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
                    <a href="../customerMarketplace/market.php">
                        <i class="fas fa-book" style="color: white;"></i>
                        <span>Marketplace</span>
                    </a>
                </li>
                <li>
                    <a href="../customerManageAuction/auction.php">
                        <i class="fas fa-cubes" style="color: white;"></i>
                        <span>Manage Auction</span>
                    </a>
                </li>
                <li>
                    <a href="../customerBidHistory/bid.php">
                        <i class="fas fa-gavel" style="color: white;"></i>
                        <span>Bid History</span>
                    </a>
                </li>
                <li>
                    <a href="../customerProfile/profile.php">
                        <i class="fas fa-user" style="color: white;"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fas fa-sign-out-alt" style="color: white;"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->


        <div id="content">
            <?php
            include('db.php');
            if (isset($_GET['productID'])) {
                $id = mysqli_real_escape_string($con, $_GET['productID']);
                $sql = "SELECT productID,productName,name,statusProduct,startingPrice,maximumPrice,closeTime,productImageURL,descriptionProduct,statusProduct
                FROM AUCTIONPRODUCT, CUSTOMER  WHERE customerID=citizenID AND productID='$id' ";
                $result = mysqli_query($con, $sql);
                $details = mysqli_fetch_assoc($result);
                $closedate = date_format(date_create($details['closeTime']), 'm/d/Y H:i:s');
                $closetime=$details['closeTime'];
                $seller=$details['customerID'];
                $maxPrice=$details['maximumPrice'];
                $status=$details['statusProduct'];
                $productName=$details['productName'];
                $startPrice=$details['startingPrice'];
                global $id,$status,$productName,$startPrice,$seller;
            }
            ?>
            <div class="row">

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
                    <div id="item"><b>Current Bid:</b> 
                        <?php 
                            $maximumPrice = $details['maximumPrice'];
                            if ($maximumPrice == 0){
                            echo $details['startingPrice'];
                            }else {
                                echo $details['maximumPrice']; 
                            }
                        ?>
                    </div>
                    <!-- shit there's no current bid value in database -->
                    <br>
                    <div id="item"><b>Close Date:</b> <?php echo $details['closeTime'] ?></div>
                    <br>
                    <?php
                    date_default_timezone_set("asia/ho_chi_minh");
                    $currentTime = new DateTime("now");
                    $closeTime = new DateTime($closetime);
                    $change_status ="UPDATE AUCTIONPRODUCT SET statusProduct = 'completed' WHERE productID='$id' ";
                    $bidding_check =" SELECT bidderID,bidamount as currentBid FROM BIDREPORT  where productID= '$id' order by bidamount DESC limit 1";
                    $delete_report="DELETE FROM BIDREPORT where productID='$id'";
                    
                    if($currentTime > $closeTime){
                        $complete_status=mysqli_query($con,$change_status);
                        if($bidding_sum=mysqli_query($con,$bidding_check)){
                            $bidding_result=mysqli_fetch_assoc($bidding_sum);
                            $winnerID=$bidding_result['bidderID'];
                            $payAmount=$bidding_result["currentBid"];
                            $balance_pay="UPDATE CUSTOMER SET accountBalance=accountBalance-'$payAmount' WHERE citizenID='$winnerID' ";
                            $transDate = date("Y-m-d h:i:s");
                            $transaction_add="INSERT INTO transaction (productID,buyerID,productName,startingPrice,finalPrice,transactionDate)
                            values ('$id','$winnerID','$productName','$startPrice','$payAmount','$transDate') ";
                            header('location:../customerProfile/profile.php');
                            if($pay_phase=mysqli_query($con,$balance_pay)){
                                $transaction_phase=mysqli_query($con,$transaction_add);
                                $delete_report_run=mysqli_query($con,$delete_report);
                            }
                        }
                    }
                    ?>
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
                    <div id="item"><b>Maximum Price:</b> 
                    <?php 
                        $maximumPrice = $details['maximumPrice'];
                        if ($maximumPrice == 0){
                        echo $details['startingPrice'];
                        }else {
                            echo $details['maximumPrice']; 
                        }
                    ?>
                    </div>
                    <br>
                    <hr class="border-dark">

                    <form action="" method="post">
                    <div <?php if($status == 'completed') { echo 'style="display:none "';} ?> class="card-text" style="font-size:80%;margin-left:160px; ">
                        Bid amount:
                    </div>
                    <div class="form-group" style="width: 190px; margin-left:5px;">
                        <input <?php if($status == 'completed') { echo 'style="display:none "';} ?> type="text" name="bidPrice" class="form-control form-control-sm " id="form" placeholder="$$$">
                    </div>
                    <div class="row-button">
                        <button <?php if($status == 'completed') { echo 'style="display:none "';} ?> class="button" name="bid" >Place Bid</button>
                        <!-- check bid price higher than starting price & current bid (skip this feature), 
                    throw error if higher than max price -->
                        <a <?php if($status == 'completed') { echo 'style="display:none "';} ?> class="button" href="../customerMarketPlace/market.php">Cancel</a>
                    </div>
                    </form>
                    <?php
                    include ('db.php');
                    if (isset($_POST['bid'])) {
                        date_default_timezone_set("asia/ho_chi_minh");
                        $bidAmount = $_POST['bidPrice'];
                        $currentDate = date("Y-m-d h:i:s");
                        $limit=1000;
                        $query1 = "INSERT INTO BIDREPORT(productID,bidderID,bidDateTime,bidamount)
                        VALUES ('$id','$customerID','$currentDate','$bidAmount')";
                        $query2="UPDATE AUCTIONPRODUCT SET maximumPrice='$bidAmount' WHERE productID=$id ";
                        $query3="SELECT sum(bid_value) as totalSum FROM(
                        SELECT MAX(b.bidamount) as bid_value,MAX(b.bidderID)  
                        FROM BIDREPORT as b
                        WHERE bidderID='$customerID'
                        GROUP BY productID 
                        )b";
                        

                        $query3_run=mysqli_query($con,$query3);
                        $query3_result=mysqli_fetch_assoc($query3_run);
                        $sumBid=$query3_result["totalSum"];

                        if ($seller!=$customerID) {
                            if($balance>$maxPrice){   
                                if($bidAmount > $maxPrice and $bidAmount<=($maxPrice+$limit) and $bidAmount <=$balance and ($bidAmount+$sumBid)<$balance){
                                    if( $query_run1=mysqli_query($con,$query1)){
                                        $query_run2=mysqli_query($con,$query2);
                                        echo '<script> alert("Bid successfully"); </script>';
                                        header('Location: productDetail.php');  
                                    }     
                                      
                                }
                                else{
                                    echo'<script> alert("Your bid amount may not be valid or the number is so HIGH compare with the current BID or exceed the payment capability!"); </script>';
                                    header('Location: productDetail.php'); 
                                }  
                            }
                            else{
                                echo '<script> alert("Your balance is insufficient to bid!!"); </script>';
                                header('Location: productDetail.php'); 
                            }
                        } else {
                            echo '<script> alert("You cannot bid your own product!"); </script>';
                            header('Location: productDetail.php'); 
                        }
                    } else {
                        header('Location: productDetail.php');   
                    }
                    ?>
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