<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>ML Predictive</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
    <!-- <script type="text/javascript" src="./common/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="./Scripts/config.js"></script>
    <script data-main="RealTimeStockChart" src="./Scripts/require.js"></script> -->
    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

    <link rel="stylesheet" href="./assets/css/MyAccount/main.css"/>
    <script type="text/javascript" src="./assets/js/MyAccount/main.js"></script>
</head>
<body>
    <div class="row">
        <h1>MY PORTFOLIO</h1>        
    </div>
    <div class="myStock row">
        <div class="col-md-2">
            <div class="top" style="background-color: pink;">
                <p>PPPP</p>
                <br>
                <p>PPPP</p>
                <br>
                <p>PPPP</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="top" style="background-color: pink;">
                <p>PPPP</p>
                <br>
                <p>PPPP</p>
                <br>
                <p>PPPP</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="top" style="background-color: pink;">
                <p>PPPP</p>
                <br>
                <p>PPPP</p>
                <br>
                <p>PPPP</p>
            </div>
        </div>

    </div>

    

    <div class="Another row">

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Lists</div>
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
                      <div class="add-stock ui button" style="margin-top: 5px;">
                        Add One
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Screens</div>
                <div class="panel-body center1">Creat New Screen</div>
            </div>    
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="nav nav-tabs panel-heading">
                <span class="active col-md-6"><a data-toggle="tab" href="#home">Top Gainers</a></span>
                <span class="col-md-6"><a data-toggle="tab" href="#menu1">Top Losers</a></span>
              </div>
            
           
              <div class="tab-content panel-body">
                <div id="home" class="tab-pane fade in active">
                  <h3>HOME</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                  <h3>Menu 1</h3>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>          
        </div>
    </div>

    <div class="Other row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading thrid-row">Markets Outlook</div>
                <div class="panel-body center">Add Stock</div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading thrid-row">Sector Overview</div>
                <div class="panel-body center">Add Stock</div>
            </div>
        </div>
    </div>





    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"><span class="fa fa-search errspan"></span></input> -->

    <!-- <table id="myTable">
      <tr class="header">
        <th style="width:60%;">Name</th>
        <th style="width:40%;">Country</th>
      </tr>
      <tr>
        <td>Alfreds Futterkiste</td>
        <td>Germany</td>
      </tr>
      <tr>
        <td>Berglunds snabbkop</td>
        <td>Sweden</td>
      </tr>
    </table> -->
</body>
</html>