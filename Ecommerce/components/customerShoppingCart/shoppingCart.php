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
<?php include '../header/header.php'; ?>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Shopping Cart</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th class="text-right">Salary</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><img src="../../img/images.jpeg" height=30% width=30% alt="" border=3 height=100 width=300></img></td>
                                        <td>Dakota Rice</td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                        <td class="text-right">$36,738</td>
                                    </tr>
                                    <tr>
                                    <td><img src="../../img/images.jpeg" height=30% width=30% alt="" border=3 height=100 width=300></img></td>
                                        <td>Minerva Hooper</td>
                                        <td>Curaçao</td>
                                        <td>Sinaai-Waas</td>
                                        <td class="text-right">$23,789</td>
                                    </tr>
                                    <tr>
                                    <td><img src="../../img/images.jpeg" height=30% width=30% alt="" border=3 height=100 width=300></img></td>
                                        <td>Sage Rodriguez</td>
                                        <td>Netherlands</td>
                                        <td>Baileux</td>
                                        <td class="text-right">$56,142</td>
                                    </tr>
                                    <tr>
                                    <td><img src="../../img/images.jpeg" height=30% width=30% alt="" border=3 height=100 width=300></img></td>
                                        <td>Philip Chaney</td>
                                        <td>Korea, South</td>
                                        <td>Overland Park</td>
                                        <td class="text-right">$38,735</td>
                                    </tr>
                                    <tr>
                                    <td><img src="../../img/images.jpeg" height=30% width=30% alt="" border=3 height=100 width=300></img></td>
                                        <td>Doris Greene</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                        <td class="text-right">$63,542</td>
                                    </tr> 
                                </tbody>
                            </table>
                                <div class="order_total">
                                    <div class="order_total_content text-md-right">
                                        <div class="order_total_title">Order Total:</div>
                                        <div class="order_total_amount">$22000</div>
                                        <button type="submit" class="btn cart_button_clear">Confirm Purchase</button>
                                    </div>
                                </div>
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