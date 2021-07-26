<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>SignUp Page</title>
    <link rel='stylesheet' type='text/css' href='style.css' />
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<!------ Include the above in your HEAD tag ---------->

</head>
<body>
<div class="container" style="margin-top: 10em;">
    <!-- Sign up form -->
    <form>
        <div class="row">
            <div class="col-md-6" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card_title">Sign Up Information</h2>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="example@gmail.com" required>
                            <div class="email-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Phone number</label>
                            <input type="text" class="form-control" id="tel" placeholder="+33 6 99 99 99 99" required>
                            <div class="phone-feedback">        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Pasword</label>
                            <input type="password" class="form-control" id="password" placeholder="Type your password" required>
                            <div class="password-feedback">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_conf" class="col-form-label">Pasword (confirm)</label>
                            <input type="password" class="form-control" id="password_conf" placeholder="Type your password again" required>
                            <div class="password_conf-feedback">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Citizen ID</label>
                            <input type="text" class="form-control" id="tel" placeholder="079xxxxxxxxx" required>
                            <div class="phone-feedback">        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-body">
                        <h2 class="card-title">User Secondary Information</h2>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">First Name</label>
                            <input type="text" class="form-control" id="tel" placeholder="John" required>
                            <div class="phone-feedback">        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Last Name</label>
                            <input type="text" class="form-control" id="tel" placeholder="Doe" required>
                            <div class="phone-feedback">        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Address</label>
                            <input type="text" class="form-control" id="tel" placeholder="Enter your address" required>
                            <div class="phone-feedback">        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">City</label>
                            <input type="text" class="form-control" id="tel" placeholder="Enter your city" required>
                            <div class="phone-feedback">        
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Country</label>
                            <input type="text" class="form-control" id="tel" placeholder="Enter your country" required>
                            <div class="phone-feedback">        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 1em;">
            <button type="button" name="button" class="btn login_btn">Sign Up</button>
        </div>
        <div class="mt-4">
					<div class="d-flex justify-content-center links">
						Already have an account? <a href="../login/login.php" class="ml-2">Login</a>
					</div>
				</div>
        </form>
</div>
</body>
</html>