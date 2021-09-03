<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Transactions History</title>

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
    <?php include '../header/header.php' ?>
    <!-- layout is outdated -->

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
                    <a href="../adminBidHistory/bid.php">
                        <i class="fas fa-user"></i>
                        <span>Bid History</span>
                    </a>
                </li>
                <li>
                    <a href="transaction.php">
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
                        </div>
                    </div>
                    
                    <div class="container">
                    <?php
                    $mysqli = new mysqli('localhost','root','12345','assessment') or die(mysqli_error($mysqli));
                    $result = $mysqli->query("SELECT * FROM TRANSACTION") or die(mysqli_error($mysqli->error));
                    ?>
                        <div class="row">
                            <div class="mt-5 col-md-9 mb-5">
                                <h2 class="heading-section">Transactions History/Report</h2>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <table id="bid-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Buyer ID</th>
                                                <th>Final Price</th>
                                                <th>Transaction Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($rows = $result->fetch_assoc()):
                                            ?>

                                                <tr>
                                                    <td><?php echo $rows['orderID']; ?></td>
                                                    <td><?php echo $rows['productID']; ?></td>
                                                    <td><?php echo $rows['productName']; ?></td>
                                                    <td><?php echo $rows['buyerID']; ?></td>
                                                    <td><?php echo $rows['finalPrice']; ?></td>
                                                    <td><?php echo $rows['transactionDate']; ?></td>
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
// pagination script 

// pagination script 

getPagination('#bid-table');
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