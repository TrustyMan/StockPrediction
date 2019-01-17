<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <title>ML Predictive</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- cutome css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/landing.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/login_signup.css">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./assets/js/login_signup.js"></script>
    <script src="./assets/js/main.js"></script>

</head>

<body>
	<div>
		<div class="row">
	        <nav class="navbar navbar-inverse">
	          <div class="container-fluid">
	          	<div class="col-md-2"></div>
	            <div class="navbar-header col-md-2">
	              <div class="navbar-brand"><img src="./assets/img/logo.png" style="width: 120px; margin-top: -10px;"></div>
	            </div>

	            <div class="navbar-header nav-search col-md-5">
			        <input class="form-control" type="search" placeholder="Search for symbol, feelings ..." style="display: inline;" />
			        <button type="submit" class="btn" style="display: inline; background-color: white;"><i class="glyphicon glyphicon-search"></i></button>
	            </div>

	            <div class="collapse navbar-collapse col-md-2" id="myNavbar">
	              <ul class="nav navbar-nav navbar-right">
	                <?php 
	                if( !isset($_SESSION['username']) || ($_SESSION['username'] == '')) {
	                ?>
	                <li><a href="#signup-box" class="login-window"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	                <li><a href="#login-box" class="login-window"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
	                <?php
	                } else {
	                ?>
	                <li><a href="./MyAccount"><span class="glyphicon glyphicon-circle-arrow-right"></span> My Account</a></li>
	                <!-- <li><a href="javascript:void(0);"><?php echo $_SESSION['username'] ?>:</a></li> -->
	                <li><a href="./"><p id="logout_btn"><span class="glyphicon glyphicon-log-out"></span>Sign Out</p></a></li>
	                <?php } ?>
	              </ul>
	            </div>

	            <div class="col-md-1"></div>
	          </div>

	          <div class="container-fluid second-row">
	          	<div class="col-md-2"></div>
	            <div class="col-md-1 sub-nav">
	              <span id="home">Home</span>
	            </div>
	            <div class="col-md-1 sub-nav">
	              <span id="portfolio">Portfolio</span>
	            </div>
	            <div class="col-md-1 sub-nav">
	              <span id="tracker">Tracker</span>
	            </div>
	            <div class="col-md-1 sub-nav sub-nav-active">
	              <span id="delta">Delta</span>
	            </div>
	          </div>
	        </nav>
    	</div>

    	
	</div>
    

    <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="./assets/img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
        <div class="signin">
            <fieldset class="textbox">
                <label class="username">
                    <span>Username or email</span>
                    <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username" class="validate-input">
                </label>
                <label class="password">
                    <span>Password</span>
                    <input id="password" name="password" value="" type="password" placeholder="Password" class="validate-input">
                </label>
                <input class="button" type="button" id="signin_btn" value="Sign in"/>     
            </fieldset>
        </div>
    </div>

    <div id="signup-box" class="login-popup">
        <a href="#" class="close"><img src="./assets/img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
        <div class="signin signup">
            <fieldset class="textbox">
                <label class="username">
                <span>Username</span>
                <input id="up-username" name="up-username" value="" type="text" autocomplete="on" placeholder="Username" class="validate-input1">
                <label class="username">
                <span>Email</span>
                <input id="up-email" name="up-email" value="" type="email" autocomplete="on" placeholder="Email" class="validate-input1">
                </label>
                <label class="password">
                <span>Password</span>
                <input id="up-password" name="up-password" value="" type="password" placeholder="Password" class="validate-input1">
                </label>
                <label class="password">
                <span>Confirm Password</span>
                <input id="up-password1" name="up-password1" value="" type="password" placeholder="Confirm Password" class="validate-input1">
                </label>
                <input class="submit button" type="button" id="signup_btn" value="Signup"/>
            </fieldset>
        </div>
    </div>

</body>
</html>