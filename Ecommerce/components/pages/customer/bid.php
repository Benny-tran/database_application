<?php
include_once('db.php');
// $query='SELECT * FROM bidReport';
// where bidderID = $citizenID group by bidderID
// $result=mysqli_query($query);
// $citizenID = $_POST['customer'];
$query = mysqli_query($con, "SELECT * FROM bidReport");
// WHERE bidderID = '{$citizenID}'");

// $result = mysqli_fetch_assoc($query);
// $rows = $query -> fetch_row();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid History</title>

    <!-- Bootstrap CSS CDN -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/datatable-bootstrap.min.css" media="screen">

    <!-- Our Custom CSS -->
    <!-- <link rel="stylesheet" href="../layout/layout.css"> -->
    <link rel='stylesheet' href='style.css' />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- JS files -->
    <script type="text/javascript" src="js/datatable.min.js"></script>

    <!-- Add the following if you want to use the jQuery wrapper (you still need datatable.min.js): -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/datatable.jquery.min.js"></script>

</head>

<body>
    <?php include '../../header/header.php' ?>
    <!-- layout is outdated -->

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="user-info">
                    <h3>John Doe</h3>
                    <h5>Customer</h5>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-book"></i>
                        <span>Marketplace</span>
                    </a>
                </li>
                <li>
                    <a href="auction.php">
                        <i class="fas fa-cubes"></i>
                        <span>Manage Auction</span>
                    </a>
                </li>
                <li>
                    <a href="bid.php">
                        <i class="fas fa-gavel"></i>
                        <span>Bid History</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="container mt-5 mr-5">
                        <div class="row">
                            <div class="mt-4 col-md-12 mb-4">
                                <form style="margin:left; width:85% ">
                                    <input id="search_bar" type="text" placeholder="Search by Name, Code...." style="width:100%;display:block">
                                    <!-- <i class="fa fa-search"></i> -->
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container">

                        <div class="row justify-content-center">
                            <div class="mt-5 col-md-12 mb-5">
                                <h2 class="heading-section">Bid History/Report</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <table id="bid-table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Bid ID</th>
                                                <th>Product ID</th>
                                                <th>Bidder ID</th>
                                                <th>Bid Time</th>
                                                <th>Bid Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($rows = mysqli_fetch_assoc($query)) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $rows['bidID']; ?></td>
                                                    <td><?php echo $rows['productID']; ?></td>
                                                    <td><?php echo $rows['bidderID']; ?></td>
                                                    <td><?php echo $rows['bidDateTime']; ?></td>
                                                    <td><?php echo $rows['bidamount']; ?></td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="w3-bar text-center mt-5">
                            <a href="#" class="w3-button">&laquo;</a>
                            <a href="#" class="w3-button">1</a>
                            <a href="#" class="w3-button">2</a>
                            <a href="#" class="w3-button">3</a>
                            <a href="#" class="w3-button">4</a>
                            <a href="#" class="w3-button">5</a>
                            <a href="#" class="w3-button">&raquo;</a>
                        </div> -->

                        <div id="paging-first-datatable"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>

<script>
    $('#bid-table table').datatable({
        pageSize: 8,
        // sort: [true, true, false],
        // filters: [true, false, 'select'],
        // filterText: 'Type to filter... ',
        // onChange: function(old_page, new_page) {
        //     console.log('changed from ' + old_page + ' to ' + new_page);
        // }
        pagingDivSelector: "#paging-first-datatable"
    });
</script>