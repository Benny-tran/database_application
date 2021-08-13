<?php
// include_once('db.php');
$query='select * from auctionProduct';
$result=mysqli_query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Auction</title>

    <!-- Bootstrap CSS CDN -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Our Custom CSS -->
    <link rel='stylesheet' href='style.css' />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>

</head>

<body>
    <?php include '../../layout/header.php' ?>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="user-info">
                    <h3>John Doe</h3>
                    <h5">Customer</h5>
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
                            <div class="mt-4 col-md-10 mb-4">
                                <form style="margin:left; width:85% ">
                                    <input id="search_bar" type="text" placeholder="Search by Name, Code...."
                                        style="width:100%;display:block">
                                    <!-- <i class="fa fa-search"></i> -->
                                </form>
                            </div>
                            <div class="mt-2 col-md-2 mb-1">
                                <button class="btn"><i class="fa fa-filter"></i></button>
                            </div>
                            <!-- another modal or sidebar? -->
                        </div>
                    </div>

                    <div class="container mr-5">
                        <div class="row justify-content-center">
                            <div class="mt-5 col-md-9 mb-5">
                                <h2 class="heading-section">Product Auction List</h2>
                            </div>

                            <div class="mt-5 col-md-3 mb-5">
                                <button class="btn default" id="createAuction">Create Auction
                                    <i class="fa fa-pencil-alt"></i></button>

                            </div>
                        </div>
                        <div id="createAuctionModal" class="modal">
                            <div class="modal-content">
                            <form action="auction.php" method="post" autocomplete="">
                                <?php
                                if(count($errors) == 1){
                                    ?>
                                    <div class="alert alert-danger text-center">
                                        <?php
                                        foreach($errors as $showerror){
                                            echo $showerror;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }elseif(count($errors) > 1){
                                    ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        foreach($errors as $showerror){
                                            ?>
                                            <li><?php echo $showerror; ?></li>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="modal-header">
                                        <h2>Create Auction Product</h2>
                                        <span class="close">&times;</span>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input class="form-control" type="text" name="productName" placeholder="Product Name" required value="<?php echo $productName ?>">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" type="text" name="description" placeholder="Description" required value="<?php echo $description ?>">
                                </div>
                                <div class="form-group">                                        
                                    <label>Starting Price</label>
                                    <input class="form-control" type="text" name="startingPrice" placeholder="Starting Price" required value="<?php echo $startingPrice ?>">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="productImageURL">
                                </div>
                                <div class="form-group">
                                    <label>End Time</label>
                                    <input class="form-control" type="datetime-local" name="closeTime">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="createProduct">Create Auction</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" class="js-check-all" />
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </th>
                                                <th>Product ID</th>
                                                <th>Customer ID</th>
                                                <th>Product Name</th>
                                                <th>Description</th>          
                                                <th>Original Price</th>
                                                <th>Maximum Price</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Closed At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <label class="control control--checkbox">
                                                    <input type="checkbox" />
                                                    <div class="control__indicator"></div>
                                                    </label>
                                                </th>
                                                <td><?php echo $rows['productID'] ;?></td>
                                                <td><?php echo $rows['customerID'] ;?></td>
                                                <td><?php echo $rows['productName'] ;?></td>
                                                <td><?php echo $rows['description'] ;?></td>
                                                <td><?php echo $rows['startingPrice'] ;?></td>
                                                <td><?php echo $rows['maximumPrice'] ;?></td>
                                                <td><?php echo $rows['productImageURL'] ;?></td>
                                                <td><?php echo $rows['status'] ;?></td>
                                                <td><?php echo $rows['createTime'] ;?></td>
                                                <td><?php echo $rows['closeTime'] ;?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        
                                            <!-- <tr>
                                                <th scope="row">
                                                    <label class="control control--checkbox">
                                                        <input type="checkbox" />
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </th>
                                                <td>Iphone</td>
                                                <td>IP2</td>
                                                <td><a href="#" class="btn btn-success">Completed</a></td>
                                                <td>$100</td>
                                                <td>Date 1</td>
                                                <td>Date 2</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="w3-bar text-center mt-5">
                            <a href="#" class="w3-button">&laquo;</a>
                            <a href="#" class="w3-button">1</a>
                            <a href="#" class="w3-button">2</a>
                            <a href="#" class="w3-button">3</a>
                            <a href="#" class="w3-button">4</a>
                            <a href="#" class="w3-button">5</a>
                            <a href="#" class="w3-button">&raquo;</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

</body>

</html>

<script>
    $(function () {

        $('.js-check-all').on('click', function () {

            if ($(this).prop('checked')) {
                $('th input[type="checkbox"]').each(function () {
                    $(this).prop('checked', true);
                })
            } else {
                $('th input[type="checkbox"]').each(function () {
                    $(this).prop('checked', false);
                })
            }
        });
    });
    // Get the modal
    var modal = document.getElementById("createAuctionModal");

    // Get the button that opens the modal
    var btn = document.getElementById("createAuction");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>