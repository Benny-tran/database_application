<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid History</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='style.css' />
</head>
<body>
    <?php include '../header/header.php' ?>
    <!-- Sidebar template -->

    <?php include '../layout/layout.php' ?>

    <section class="ftco-section">
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
    </section>

    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <?php include '../footer/footer.php' ?>
</body>
</html>