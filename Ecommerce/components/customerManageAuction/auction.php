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
// Display all the Product Auction List
// $query = mysqli_query($con, 'SELECT * FROM auctionProduct');

function resize_image($file, $w, $h, $crop = FALSE)
{
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width - ($width * abs($r - $w / $h)));
        } else {
            $height = ceil($height - ($height * abs($r - $w / $h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w / $h > $r) {
            $newwidth = $h * $r;
            $newheight = $h;
        } else {
            $newheight = $w / $r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefrompng($file);
    $dst = imagecreatetruecolor($w, $h);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}
// for jpg 
function resize_imagejpg($file, $w, $h)
{
    list($width, $height) = getimagesize($file);
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($w, $h);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
    return $dst;
}

// for png
function resize_imagepng($file, $w, $h)
{
    list($width, $height) = getimagesize($file);
    $src = imagecreatefrompng($file);
    $dst = imagecreatetruecolor($w, $h);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
    return $dst;
}
date_default_timezone_set("asia/ho_chi_minh");
$currentTime = strtotime("now");
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
<?php session_start(); ?>
    <?php include '../header/header.php' ?>

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
                    <a href="auction.php">
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

        <!-- Page Content Holder -->
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="container mt-5">
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

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="mt-5 col-md-9 mb-5">
                                <h2 class="heading-section">Product Auction List</h2>
                            </div>
                            <div class="mt-5 col-md-3 mb-5">
                                <button class="btn default modalBtn" id="createAuction" href='#createAuctionModal'>Create Auction
                                    <i class="fa fa-pencil-alt"></i></button>
                            </div>
                        </div>
                        <div class="text-center">
                                    <?php
                                        if(isset($_SESSION['status'])){
                                            echo "<h5 class='alert alert-warning text-center'>".$_SESSION['status']."</h5>";
                                            unset($_SESSION['status']);
                                            
                                        }
                                    ?>
                                </div>
                                <!-- Display message alert base on different status -->
                                <?php

                            if(isset($_SESSION['message'])): ?>

                                <div class="alert alert-<?=$_SESSION['msg_type']?>">

                                    <?php
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    ?>
                                </div>
                            <?php endif ?>
                        <!-- Create Modal -->
                        <div id="createAuctionModal" class="modal">
                            <div class="modal-content">
                            <form action="auctionController.php" method="POST" enctype="multipart/form-data" >
                                <div class="modal-header">
                                        <h2>Create Auction Product</h2>
                                        <span class="close">&times;</span>
                                </div>
                                <div class="form-group">
                                    <label>Citizen ID</label>
                                    <input class="form-control" type="text" name="customerID" placeholder="Citizen ID" required value="<?php echo $customerID ?>">
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
                                    <input class="form-control" type="file" name="my_image" required value="<?php echo $new_img_name ?>">
                                </div>
                                <div class="form-group">
                                    <label>End Time</label>
                                    <input class="form-control" type="datetime-local" name="closeTime" required value="<?php echo $closeTime ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="createProduct">Create Auction</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" name="state" id="maxRows">
                                <option value="5000">Show ALL Rows</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="70">70</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <!-- READ data from Database-->
                        <?php
                            $mysqli = new mysqli('localhost','root','12345','assessment') or die(mysqli_error($mysqli));
                            $result = $mysqli->query("SELECT * from AUCTIONPRODUCT A JOIN CUSTOMER C ON A.customerID = C.citizenID WHERE C.email = '$email' or C.phone = '$phone'") or die($mysqli->error);
                        ?>
                        <!-- Auction Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <table id="auction-table" class="table table-bordered table-striped display">
                                        <thead>
                                            <tr>
                                                <!-- <th style="width:5%">Product ID</th> -->
                                                <!-- <th>Product ID</th> -->
                                                <th style="width:10%">Product Name</th>
                                                <th style="width:10%">Description</th>
                                                <th style="width:10%">Original Price</th>
                                                <th style="width:25%">Image</th>
                                                <th style="width:10%">Status</th>
                                                <!-- <th>Created At</th> -->
                                                <th style="width:10%">Closed At</th>
                                                <th style="width:10%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($rows = $result->fetch_assoc()): 
                                            ?>
                                                <tr>
                                                    <!-- <td><?php echo $rows['productID']; ?></td> -->
                                                    <td><?php echo $rows['productName']; ?></td>
                                                    <td><?php echo $rows['descriptionProduct']; ?></td>
                                                    <td><?php echo $rows['startingPrice']; ?></td>
                                                    <td>
                                                        <?php
                                                        $imageURL = 'uploads/' . $rows['productImageURL'];
                                                        $img = resize_image($imageURL, 100, 100);
                                                        ?>
                                                        <img src="<?php echo $imageURL; ?>" alt="" />
                                                        <!-- resize image -->
                                                    </td>
                                                    <td><?php
                                                        //    check for current time
                                                        $closeTime = strtotime($rows['closeTime']);
                                                        if ($currentTime > $closeTime) {
                                                            $rows['statusProduct'] = 'completed';
                                                        }
                                                        echo $rows['statusProduct'];
                                                        ?></td>
                                                    <td><?php echo $rows['closeTime']; ?></td>
                                                    <td>
                                                        <?php if ($rows['statusProduct'] == 'active') { ?>
                                                            <html>
                                                            <h5>On going auction</h5>
                                                            </html>
                                                            
                                                        <?php } ?>

                                                        <?php if ($rows['statusProduct'] == 'completed') { ?>
                                                            <html>
                                                                <a href='auctionController.php?delete=<?php echo $rows['productID']; ?>' 
                                                                class='btn btn-danger' onclick="return confirm('Are you sure you want to delete?')" 
                                                                >Delete</a>
                                                            </html>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>

                                    <!--		Start Pagination -->
                                    <div class='pagination-container'>
                                        <nav>
                                            <ul class="pagination">

                                                <li data-page="prev">
                                                    <span>
                                                        < <span class="sr-only">(current)
                                                    </span></span>
                                                </li>
                                                <!--	Here the JS Function Will Add the Rows -->
                                                <li data-page="next" id="prev">
                                                    <span> > <span class="sr-only">(current)</span></span>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- css doesnt work?  -->

                                </div>
                            </div>
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
    // All page modals
    // Get the button that opens the modal
    var btn = document.querySelectorAll("button.modalBtn");
    var modals = document.querySelectorAll('.modal');

    // Get the <span> element that closes the modal
    var spans = document.getElementsByClassName("close");

    // When the user clicks the button, open the modal
    for (var i = 0; i < btn.length; i++) {
        btn[i].onclick = function(e) {
            e.preventDefault();
            modal = document.querySelector(e.target.getAttribute("href"));
            modal.style.display = "block";
        }
    }

    // When the user clicks on <span> (x), close the modal
    for (var i = 0; i < spans.length; i++) {
        spans[i].onclick = function() {
            for (var index in modals) {
                if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
            }
        }
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            for (var index in modals) {
                if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
            }
        }
    }


    // pagination script 

    getPagination('#auction-table');
    //getPagination('.table-class');
    //getPagination('table');

    function getPagination(table) {
        var lastPage = 1;

        $('#maxRows')
            .on('change', function(evt) {
                //$('.paginationprev').html('');						// reset pagination

                lastPage = 1;
                $('.pagination')
                    .find('li')
                    .slice(1, -1)
                    .remove();
                var trnum = 0; // reset tr counter
                var maxRows = parseInt($(this).val()); // get Max Rows from select option

                if (maxRows == 5000) {
                    $('.pagination').hide();
                } else {
                    $('.pagination').show();
                }

                var totalRows = $(table + ' tbody tr').length; // numbers of rows
                $(table + ' tr:gt(0)').each(function() {
                    // each TR in  table and not the header
                    trnum++; // Start Counter
                    if (trnum > maxRows) {
                        // if tr number gt maxRows

                        $(this).hide(); // fade it out
                    }
                    if (trnum <= maxRows) {
                        $(this).show();
                    } // else fade in Important in case if it ..
                }); //  was fade out to fade it in
                if (totalRows > maxRows) {
                    // if tr total rows gt max rows option
                    var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                    //	numbers of pages
                    for (var i = 1; i <= pagenum;) {
                        // for each page append pagination li
                        $('.pagination #prev')
                            .before(
                                '<li data-page="' +
                                i +
                                '">\
                                <span>' +
                                i++ +
                                '<span class="sr-only">(current)</span></span>\
                                </li>'
                            )
                            .show();
                    } // end for i
                } // end if row count > max rows
                $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
                $('.pagination li').on('click', function(evt) {
                    // on click each page
                    evt.stopImmediatePropagation();
                    evt.preventDefault();
                    var pageNum = $(this).attr('data-page'); // get it's number

                    var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                    if (pageNum == 'prev') {
                        if (lastPage == 1) {
                            return;
                        }
                        pageNum = --lastPage;
                    }
                    if (pageNum == 'next') {
                        if (lastPage == $('.pagination li').length - 2) {
                            return;
                        }
                        pageNum = ++lastPage;
                    }

                    lastPage = pageNum;
                    var trIndex = 0; // reset tr counter
                    $('.pagination li').removeClass('active'); // remove active class from all li
                    $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                    // $(this).addClass('active');					// add active class to the clicked
                    limitPagging();
                    $(table + ' tr:gt(0)').each(function() {
                        // each tr in table not the header
                        trIndex++; // tr index counter
                        // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                        if (
                            trIndex > maxRows * pageNum ||
                            trIndex <= maxRows * pageNum - maxRows
                        ) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        } //else fade in
                    }); // end of for each tr in table
                }); // end of on click pagination list
                limitPagging();
            })
            .val(10)
            // how many rows shown at once
            .change();

        // end of on select change

        // END OF PAGINATION
    }

    function limitPagging() {
        // alert($('.pagination li').length)

        if ($('.pagination li').length > 7) {
            if ($('.pagination li.active').attr('data-page') <= 3) {
                $('.pagination li:gt(5)').hide();
                $('.pagination li:lt(5)').show();
                $('.pagination [data-page="next"]').show();
            }
            if ($('.pagination li.active').attr('data-page') > 3) {
                $('.pagination li:gt(0)').hide();
                $('.pagination [data-page="next"]').show();
                for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
                    $('.pagination [data-page="' + i + '"]').show();

                }

            }
        }
    }

    $(function() {
        // Just to append id number for each row
        $('table tr:eq(0)').prepend('<th> ID </th>');

        var id = 0;

        $('table tr:gt(0)').each(function() {
            id++;
            $(this).prepend('<td>' + id + '</td>');
        });
    });

</script>