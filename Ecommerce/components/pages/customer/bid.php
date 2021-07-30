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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Our Custom CSS -->
    <!-- <link rel="stylesheet" href="../layout/layout.css"> -->
    <link rel='stylesheet' type='text/css' href='style.css' />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>

</head>

<body>
    <?php include '../header/header.php' ?>
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
                    <a href="#">
                        <i class="fas fa-cubes"></i>
                        <span>Manage Auction</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                            <div class="mt-3 col-md-12 mb-3">
                                <form style="margin:left; width:85% ">
                                    <input id="search_bar" type="text" placeholder="Search by Name, Code...."
                                        style="width:100%;display:block">
                                    <!-- <i class="fa fa-search"></i> -->
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container mr-5">
                        <div class="row justify-content-center">
                            <div class="mt-5 col-md-12 mb-5">
                                <h2 class="heading-section">Bid History</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Original Price</th>
                                                <th>Final Price</th>
                                                <th>Closed At</th>
                                                <th>Seller Name</th>
                                                <th>Transaction No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Iphone</td>
                                                <td>IP</td>
                                                <td>$100</td>
                                                <td>$1000</td>
                                                <td>Date 2</td>
                                                <td>Davie</td>
                                                <td>1</td>

                                            </tr>

                                            <tr>
                                                <td>Headphone</td>
                                                <td>H</td>
                                                <td>$100</td>
                                                <td>$350</td>
                                                <td>Date 2</td>
                                                <td>Jonas</td>
                                                <td>2</td>
                                            </tr>

                                            <tr>
                                                <td>Keyboard</td>
                                                <td>K</td>
                                                <td>$100</td>
                                                <td>$550</td>
                                                <td>Date 2</td>
                                                <td>Chris</td>
                                                <td>3</td>
                                            </tr>

                                            <tr>
                                                <td>Ipad</td>
                                                <td>IPD</td>
                                                <td>$100</td>
                                                <td>$900</td>
                                                <td>Date 2</td>
                                                <td>Johnson</td>
                                                <td>4</td>
                                            </tr>

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