<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <title>ML Predictive</title>


    <script type="text/javascript" src="./assets/js/Chart/amchart.js"></script>
    <!-- <script src="http://www.amcharts.com/lib/3/serial.js"></script> -->
    <script type="text/javascript" src="./assets/js/Chart/serial.js"></script>
    <!-- <script src="http://www.amcharts.com/lib/3/themes/light.js"></script> -->
    <script type="text/javascript" src="./assets/js/Chart/light.js"></script>
    <!-- <script src="http://www.amcharts.com/lib/3/amstock.js"></script> -->
    <script src="./assets/js/Chart/amstock.js"></script>

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

<body id="content">
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
	                <li><a href="javascript:void(0);"><span class="glyphicon glyphicon-circle-arrow-right"></span> My Account</a></li>
	                <!-- <li><a href="javascript:void(0);"><?php echo $_SESSION['username'] ?>:</a></li> -->
	                <li><a href="javascript:void(0);"><p id="logout_btn"><span class="glyphicon glyphicon-log-out"></span>Sign Out</p></a></li>
	                <?php } ?>
	              </ul>
	            </div>

	            <div class="col-md-1"></div>
	          </div>

	          <div class="container-fluid second-row">
	          	<div class="col-md-2"></div>
	            <div class="col-md-1 sub-nav sub-nav-active">
	              <span id="home">Home</span>
	            </div>
	            <div class="col-md-1 sub-nav">
	              <span id="portfolio">Portfolio</span>
	            </div>
	            <div class="col-md-1 sub-nav">
	              <span id="tracker">Tracker</span>
	            </div>
	            <div class="col-md-1 sub-nav">
	              <span id="delta">Delta</span>
	            </div>
	          </div>
	        </nav>
    	</div>


	    <div class="row">
	    	<div class="col-md-2">
		       	<div class="top" id="usa">
					<br>
					<p><span class="left"></span><span class="right"></span></p>
					<p class="center">
						<select class="select" id="select0">
							<option value="0">Dow</option>
							<option value="1">S&P 500</option>
							<option value="2">Nasdaq</option>
							<option value="3">GlobalDow</option>
							<option value="4">Gold</option>
							<option value="5">Oil</option>
						</select>
					</p>
					<br>
		        </div> 
		    </div>
		    <div class="col-md-2 col-half-offset">
		       <div class="top" id="eu">
		       		<br>
					<p><span class="left"></span><span class="right"></span></p>
					<p class="center">
						<select class="select" id="select1">
							<option value="0">FTSE 100</option>
							<option value="1">DAX</option>
							<option value="2">CAC 40</option>
							<option value="3">FTSE MIB</option>
							<option value="4">IBEX 35</option>
							<option value="5">Stoxx 600</option>
						</select>
					</p>
					<br>
		       </div> 
		    </div>
		    <div class="col-md-2 col-half-offset">
				<div class="top" id="asia">
					<br>
					<p><span class="left"></span><span class="right"></span></p>
					<p class="center">
						<select class="select" id="select2">
							<option value="0">Asia Dow</option>
							<option value="1">Nikkei 225</option>
							<option value="2">Hang Seng</option>
							<option value="3">Shanghai</option>
							<option value="4">Sensex</option>
							<option value="5">Singapore</option>
						</select>
					</p>
					<br>
				</div> 
		    </div>
		    <div class="col-md-2 col-half-offset">
				<div class="top" id="fx">
					<br>
					<p><span class="left"></span><span class="right"></span></p>
					<p class="center">
						<select class="select" id="select3">
							<option value="0">Euro</option>
							<option value="1">Yen</option>
							<option value="2">Pound</option>
							<option value="3">Australia$</option>
							<option value="4">DXY Index</option>
							<option value="5">WSJ $ Idx</option>
						</select>
					</p>
					<br>
				</div> 
		    </div>
		    <div class="col-md-2 col-half-offset">
				<div class="top" id="crypto">
					<br>
					<p><span class="left"></span><span class="right"></span></p>
					<p class="center">
						<select class="select" id="select4">
							<option value="0">Bitcoin USD</option>
							<option value="1">Ethereum USD</option>
							<option value="2">Ripple USD</option>
							<option value="3">Bitcoin Cash USD</option>
							<option value="4">Litecoin USD</option>
							<option value="5">Monero USD</option>
						</select>
					</p>
					<br>
				</div>
		    </div>

	    </div>
	    <div class="row other">

	    	<div class="panel-group col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<span class="bold">My Lists</span>
					</div>
					<div class="panel-body">
						<div class="row" id="mylist_body">
							<span class="col-md-4">abc</span>
							<span class="col-md-4">edf</span>
							<span class="col-md-4">wer</span>
						</div>
					</div>
					<div class="panel-footer more">
						<span>More</span>
					</div>
				</div>
			</div>

			<div class="panel-group col-md-3">
			    <div class="panel panel-default">
			      	<div class="panel-heading">
						<span class="bold">My Signals</span>
					</div>
					<div class="panel-body">

					</div>
					<div class="panel-footer more">
						<span>More</span>
					</div>
			    </div>
			</div>

			<!-- <div class="panel-group col-md-3">
			    <div class="tab">
					<button class="tablinks active col-md-6" onclick="openCity(event, 'TopGainers')">TopGainers</button>
					<button class="tablinks col-md-6" onclick="openCity(event, 'TopLosers')">TopLosers</button>
				</div>

				<div id="TopGainers" class="tabcontent">
				  	<div class="row heading">
						<span class="col-md-4">Symbol</span>
						<span class="col-md-4">Last Status</span>
						<span class="col-md-4">Current</span>
					</div>
					<div class="row body">
						<span class="col-md-4">AAL</span>
						<span class="col-md-4">179,00</span>
						<span class="col-md-4">15%</span>
					</div>
				</div>

				<div id="TopLosers" class="tabcontent">
						<h3>Paris</h3>
						<p>Paris is the capital of France.</p> 
				</div>

				<div class="panel-footer more more1">
						<span>More</span>
				</div>
			</div> -->

			<div class="col-md-3">
				<div class="tab">
					<button class="tablinks active col-md-6" onclick="openCity(event, 'TopGainers')">TopGainers</button>
					<button class="tablinks col-md-6" onclick="openCity(event, 'TopLosers')">TopLosers</button>
				</div>

				<div id="TopGainers" class="tabcontent">
				</div>

				<div id="TopLosers" class="tabcontent">
				</div>

				<div class="panel-footer more more1">
						<span>More</span>
				</div>		
			</div>

			<div class="col-md-3">
				<div class="tradingview-widget-container">
					<div class="tradingview-widget-container__widget"></div>
					<div id="calendar" class="economic-calendar">
						<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
						{
						  "width": "100%",
						  "height": "300",
						  "locale": "en",
						  "importanceFilter": "-1,0,1"
						}
						</script>
					</div>
				</div>
				<span style="height: 45px; width: 45px; background-color: white; position: absolute; bottom: 2px; right: 18px;"></span>
			</div>			
	    </div>


	    <!-- Graph -->
	    <div class="row">
	    	<div class="col-md-10 col-md-offset-1">
	    		<div id="chartdiv"></div>
	    	</div>
	    	<div class="com-md-1"></div> 	
	    </div>

	    <!-- Table -->
	    <div class="row other">
	    	<div class="col-md-10 col-md-offset-1">
	    		<table class="table table-bordered table-striped">
			        <thead>
				        <tr>
				            <th><b>Symbol</b><i class="fa fa-fw fa-sort"></i></th>
				            <th><b>Last Price($)</b><i class="fa fa-fw fa-sort"></i></th>
				            <th><b>Change(%)</b><i class="fa fa-fw fa-sort"></i></th>
				            <th><b>ROI–1 Week(%)</b><i class="fa fa-fw fa-sort"></i></th>
				            <th><b>ROI–3 Month</b><i class="fa fa-fw fa-sort"></i></th>
				            <th><b>ROI–1 Year(%)</b><i class="fa fa-fw fa-sort"></i></th>
				            <th><b>Signal</b><i class="fa fa-fw fa-sort"></i></th>
				            <th><b>Delta Score</b><i class="fa fa-fw fa-sort"></i></th>
				        </tr>
			        </thead>

			        <tbody id="stock_table_body">
			        	<!-- <tr>
				            <td><span>Symbol</span></td>
				            <td><span>Last Price($)</span></td>
				            <td><span>Change(%)</span></td>
				            <td><span>ROI–1 Week(%)</span></td>
				            <td><span>ROI–3 Month</span></td>
				            <td><span>ROI–1 Year(%)</span></td>
				            <td><span>Signal</span></td>
				            <td><span>Delta Score</span></td>
				        </tr> -->
				    </tbody>
	    		</table>
	    	</div>
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
