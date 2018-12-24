<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <title>ML Predictive</title>
    <script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="http://www.amcharts.com/lib/3/serial.js"></script>
    <script src="http://www.amcharts.com/lib/3/amstock.js"></script>
    <script src="//www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="./assets/js/dataloader.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/css/Chart.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/login_signup.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/tab_panel.css">

    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

    <script type="text/javascript" src="./assets/js/myChart.js"></script>
    <script type="text/javascript" src="./assets/js/login_signup.js"></script>
    <script type="text/javascript" src="./assets/js/function.js"></script>
    <script type="text/javascript" src="./assets/js/myTable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

    <!-- <script type="text/javascript" src="./common/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="./Scripts/config.js"></script>
    <script data-main="RealTimeStockChart" src="./Scripts/require.js"></script> -->
</head>

<body style="background: #000">
    <div class="ui active centered inline loader position" style="position:absolute;top: 50%;left:50%;"></div>
    <div class="main" style="opacity: 0;">
        <header class="header-body">
            <div class="header-limiter">
                <h1><a href="#">Company<span>logo</span></a></h1>
                <nav>
                    <div class="header-user-menu"><span class="model-name">ALGN</span>
                        <?php
                            // include('/include/header_table.php');
                        ?>
                        <table class="tbl-stock-list">
                            <thead>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Change</th>
                                <th>Open</th>
                                <th>Close</th>
                                <th>High</th>
                                <th>Low</th>
                                <th>Volume</th>
                            </thead>
                            <tbody class="cur-history-stock">

                            </tbody>
                        </table>
                    </div>
                </nav>
                <ul>
                    <?php
                        if ( !isset($_SESSION['username']) || ($_SESSION['username'] == '')) {
                    ?>
                    <li><a href="#login-box" class="login-window">Login</a></li>
                    <li><a href="#signup-box" class="login-window">Sign up</a></li>
                    <?php 
                        } else {
                    ?>
                    
                    <div style="float:right;">
                        <li><a href="javavscript:void(0);">Home</a></li>
                        <li><a href="MyAccount" style="background-color: #292c2f;">My Account</a></li>
                    </div>

                    <div class="dropdown" style="float:right;">
                        <a class="dropbtn"><?php echo $_SESSION['username'] ?></a>
                        <div class="dropdown-content">
                            <a href="javascript:void(0);" id="logout_btn">Logout</a>
                            <!-- <a href="#">Link 2</a>
                            <a href="#">Link 3</a> -->
                        </div>
                        
                    </div>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </header>


        <div class="main-body">
            <div class="content">
                <div class="charttools">
                    Group by:
                    <input type="button" value="days" onclick="setGrouping('DD', this);" class="selected" />
                    <input type="button" value="weeks" onclick="setGrouping('WW', this);" />
                    <input type="button" value="months" onclick="setGrouping('MM', this);" />
                </div>

                <div id="chartdiv">
                

                </div>
                <!-- <div>
                    <canvas height="1000px" width="1000px" id="stockChart"></canvas>
                </div> -->
            </div>
        </div>
        
        <div class="footer">
            <div class="footer-left">
                <table class="footer-table">
                    <thead class="table-header">
                        <th class="date">Date</th>
                        <th class="">Open</th>
                        <th class="">High</th>
                        <th class="">Low</th>
                        <th class="">Close</th>
                        <th class="">Volume</th> 
                        <th class="">Volume</th>                    
                    </thead>

                    <tbody class="table-body">
                        <!-- <tr class="table-row">
                            <td class="">Like a butterfly</td>
                            <td class="">Boxing</td>
                            <td class="">9:00 AM - 11:00 AM</td>
                            <td class="">Aaron Chapman</td>
                            <td class="">10</td>
                        </tr> -->
                    </tbody>
                </table>

                <div class="center">
                    <button class="btn_prev">&laquo; Prev</button>
                    <input type="text" name="number" class="number center" id="number" />
                    <button class="btn_next">Next &raquo;</button>
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
    </div>

</body>
</html>