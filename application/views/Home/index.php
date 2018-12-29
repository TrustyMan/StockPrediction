<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <title>ML Predictive</title>

    <!-- <script src="http://www.amcharts.com/lib/3/amcharts.js"></script> -->
    <script type="text/javascript" src="./assets/js/Home/amchart.js"></script>
    <!-- <script src="http://www.amcharts.com/lib/3/serial.js"></script> -->
    <script type="text/javascript" src="./assets/js/Home/serial.js"></script>
    <!-- <script src="http://www.amcharts.com/lib/3/themes/light.js"></script> -->
    <script type="text/javascript" src="./assets/js/Home/light.js"></script>
    <!-- <script src="http://www.amcharts.com/lib/3/amstock.js"></script> -->
    <script src="./assets/js/Home/amstock.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/login_signup.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/Home/style.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <script type="text/javascript" src="./assets/js/login_signup.js"></script>
    <script type="text/javascript" src="./assets/js/Home/main.js"></script>


    <!-- <script type="text/javascript" src="./assets/js/myChart.js"></script>
    <script type="text/javascript" src="./assets/js/login_signup.js"></script>
    <script type="text/javascript" src="./assets/js/function.js"></script>
    <script type="text/javascript" src="./assets/js/myTable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script> -->

    <!-- <script type="text/javascript" src="./common/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="./Scripts/config.js"></script>
    <script data-main="RealTimeStockChart" src="./Scripts/require.js"></script> -->
</head>

<body>
    <div class="ui active centered inline loader position op1 ppp"></div>

    <div class="op qqq">
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="javascript:void(0);">Comapny Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <!-- <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">ALGN<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">ALGN</a></li>
                    <li><a href="#">IBM</a></li>
                    <li><a href="#">AAL</a></li>
                    <li><a href="#">POLY.L</a></li>
                    <li><a href="#">RRS.L</a></li>
                  </ul>
                </li>
              </ul> -->
              <ul class="nav navbar-nav navbar-right">
                <?php 
                if( !isset($_SESSION['username']) || ($_SESSION['username'] == '')) {
                ?>
                <li><a href="#signup-box" class="login-window"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                <li><a href="#login-box" class="login-window"><span class="glyphicon glyphicon-log-in"></span>Sign in</a></li>
                <?php
                } else {
                ?>
                <li><a href="./MyAccount"><span class="glyphicon glyphicon-circle-arrow-right"></span> My Account</a></li>
                <!-- <li><a href="javascript:void(0);"><?php echo $_SESSION['username'] ?>:</a></li> -->
                <li><a href="./"><p id="logout_btn"><span class="glyphicon glyphicon-log-out"></span>Sign Out</p></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </nav>

        <div>
            <div class="row">
                <div class="main-col col-md-6">
                    <div class="stock-row row">
                        <div class="col-md-4">
                           <div class="top ALIGN">
                                <br>
                                <p><span class="left">Percent</span><span class="right">PP</span></p>
                                
                                <p class="center">No Stock</p>
                                <br>
                            </div> 
                        </div>
                        <div class="col-md-4">
                           <div class="top AAL">
                                <br>
                                <p><span class="left">Percent</span><span class="right">PP</span></p>
                                
                                <p class="center">No Stock</p>
                                <br>
                                
                            </div> 
                        </div>
                        <div class="col-md-4">
                           <div class="top RRS">
                                <br>
                                <p><span class="left">Percent</span><span class="right">PP</span></p>
                                
                                <p class="center">No Stock</p>
                                <br>
                            </div> 
                        </div>
                    </div>


                    <div class="list-row row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading heading-font">My Lists</div>
                                <div class="panel-body">
                                    <div id="myList">
                                        <span id="add-one">Add new One<button class="btn-delete" style="display: none;"></button></span>
                                    </div>

                                </div>
                                <div class="panel-footer">
                                    <div>
                                        <select name="skills" class="ui selection dropdown" id="selectList">
                                            <option class="ALGN" value="ALGN">ALGN</option>
                                            <option class="IBM" value="IBM">IBM</option>
                                            <option class="AAL" value="AAL">AAL</option>
                                            <option class="POLY.L" value="POLY.L">POLY.L</option>
                                            <option class="RRS.L" value="RRS.L">RRS.L</option>
                                        </select>
                                        <?php 
                                        if( !isset($_SESSION['username']) || ($_SESSION['username'] == '')) {
                                        ?>
                                        <button class="add-stock ui button" disabled>
                                            Add One
                                        </button>
                                        <?php
                                        } else {
                                        ?>
                                        <button class="add-stock ui button">
                                            Add One
                                        </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="nav nav-tabs panel-heading heading-font">
                                <span class="active col-md-6 gloser center"><a data-toggle="tab" href="#home">Top Gainers</a></span>
                                <span class="col-md-6 menu gloser center"><a data-toggle="tab" href="#menu1">Top Losers</a></span>
                              </div>
                            
                           
                              <div class="tab-content panel-body">
                                <div id="home" class="tab-pane fade in active">
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="gainer_first_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="gainer_first_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="gainer_second_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="gainer_second_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="gainer_third_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="gainer_third_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="gainer_fourth_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="gainer_fourth_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="loser_first_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="loser_first_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="loser_second_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="loser_second_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="loser_third_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="loser_third_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4"><span id="loser_fourth_symbol">HaHa<span></div>
                                    <div class="col-md-4"><span id="loser_fourth_value">HeHE</span></div>
                                    <div class="col-md-2"></div>
                                  </div>
                                </div>
                              </div>
                            </div>          
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div id="chartdiv"></div>
                    </div>
                    <div class="row">
                        <table class="firstTable">
                          <tr class="identify-row" id="ALGN" data-id="0">
                              <th class="stockname"></th>
                              <th clas="price"></th>
                              <th class="change"></th>
                          </tr>

                          <tr class="identify-row" id="IBM" data-id="1">
                              <th class="stockname"></th>
                              <th clas="price"></th>
                              <th class="change"></th>
                          </tr>
                          <tr class="identify-row" id="AAL" data-id="2">
                              <th class="stockname"></th>
                              <th clas="price"></th>
                              <th class="change"></th>
                          </tr>
                          <tr class="identify-row" id="POLY" data-id="3">
                              <th class="stockname"></th>
                              <th clas="price"></th>
                              <th class="change"></th>
                          </tr>
                          <tr class="identify-row" id="RRS" data-id="4">
                              <th class="stockname"></th>
                              <th clas="price"></th>
                              <th class="change"></th>
                          </tr>
                        </table>
                    </div>
                </div>
            </div>
            

            <div class="row row1">
                <table class="w3-table-all">
                    
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