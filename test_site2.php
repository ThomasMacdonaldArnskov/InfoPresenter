

<!DOCTYPE html>
<html>
<head>

    <!-- Include the headers and scripts-->

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets !-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">

    <!-- Scrips -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Misc -->
    <title>Infopresenter 1.0</title>

    <!-- The general navigation menu or in other words the buttons without icons... -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a class="hidden-custom-semismall menu-header" href="index.php">INFOPRESENTER</a></li>
                    <li><a href="upload_file.php">Upload Presentation</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="member_page.php">tlma</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav><br />
    <b>Notice</b>:  Undefined index: description in <b>C:\xampp\htdocs\WebPresenter\edit_presentation.php</b> on line <b>26</b><br />

    <script>
        function updateDB(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "scripts/updateValuesDB.php?q=" + str + "<br />
                    <b>Notice</b>:  Undefined variable: getRequestPresentationTable in <b>C:\xampp\htdocs\WebPresenter\edit_presentation.php</b> on line <b>80</b><br />
                ", true);
                xmlhttp.send();
            } <br />
            <b>Notice</b>:  Undefined index: table in <b>C:\xampp\htdocs\WebPresenter\edit_presentation.php</b> on line <b>45</b><br />
        }
    </script>
</head>
<body>

<br/><br/><br/>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview">
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Presentation Header</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<br/>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Presentation Name</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=1"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  value="start"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Presentation Description</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=2"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  value=""/></div>
        <div class="col-sm-2"></div>
    </div>
</div>


&i=22&table=start&user=tlma&cycle=1&i=22&table=start&user=tlma&cycle=1
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><p><div id="txtHint"></div></p></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/><hr></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Group 1</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>

<br/>

<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Dataheader</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=22&table=start&user=tlma&cycle=1&mode=3"onchange="updateDB(this.value.concat(this.name))"
                                                  value="THIS SHOULD BE GRABBED IN THE DB"/>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Subtitle</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=4"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  placeholder="Data subtitle"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Description</div>
        <div class="col-sm-7 editOverview"><textarea class="form-control"
                                                     style="height: 75px;"
                                                     name="&mode=5"
                                                     onchange="updateDB(this.value.concat(this.name))"
                                                     placeholder="Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut, nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat."></textarea>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Chart type</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=6" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Bar Chart</option>
                <option value="4">Horizontal Bar Chart</option>
                <option value="5">Line chart</option>
                <option value="6">Stacked Line Chart</option>
                <option value="2">Pie Chart</option>
                <option value="3">Doughnut Chart</option>
                <option value="1">Polar Area Chart</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Icon</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=7" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Magnifying glass</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/>
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
</div>
<br/>
<br>
&i=22&table=start&user=tlma&cycle=2
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><p><div id="txtHint"></div></p></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/><hr></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Group 1</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>

<br/>

<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Dataheader</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=22&table=start&user=tlma&cycle=2&mode=3"onchange="updateDB(this.value.concat(this.name))"
                                                  value="THIS SHOULD BE GRABBED IN THE DB"/>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Subtitle</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=4"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  placeholder="Data subtitle"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Description</div>
        <div class="col-sm-7 editOverview"><textarea class="form-control"
                                                     style="height: 75px;"
                                                     name="&mode=5"
                                                     onchange="updateDB(this.value.concat(this.name))"
                                                     placeholder="Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut, nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat."></textarea>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Chart type</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=6" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Bar Chart</option>
                <option value="4">Horizontal Bar Chart</option>
                <option value="5">Line chart</option>
                <option value="6">Stacked Line Chart</option>
                <option value="2">Pie Chart</option>
                <option value="3">Doughnut Chart</option>
                <option value="1">Polar Area Chart</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Icon</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=7" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Magnifying glass</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/>
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
</div>
<br/>
<br>
&i=22&table=start&user=tlma&cycle=3
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><p><div id="txtHint"></div></p></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/><hr></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Group 1</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>

<br/>

<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Dataheader</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=22&table=start&user=tlma&cycle=3&mode=3"onchange="updateDB(this.value.concat(this.name))"
                                                  value="THIS SHOULD BE GRABBED IN THE DB"/>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Subtitle</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=4"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  placeholder="Data subtitle"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Description</div>
        <div class="col-sm-7 editOverview"><textarea class="form-control"
                                                     style="height: 75px;"
                                                     name="&mode=5"
                                                     onchange="updateDB(this.value.concat(this.name))"
                                                     placeholder="Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut, nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat."></textarea>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Chart type</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=6" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Bar Chart</option>
                <option value="4">Horizontal Bar Chart</option>
                <option value="5">Line chart</option>
                <option value="6">Stacked Line Chart</option>
                <option value="2">Pie Chart</option>
                <option value="3">Doughnut Chart</option>
                <option value="1">Polar Area Chart</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Icon</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=7" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Magnifying glass</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/>
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
</div>
<br/>
<br>
&i=22&table=start&user=tlma&cycle=4
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><p><div id="txtHint"></div></p></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/><hr></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Group 1</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>

<br/>

<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Dataheader</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=22&table=start&user=tlma&cycle=4&mode=3"onchange="updateDB(this.value.concat(this.name))"
                                                  value="THIS SHOULD BE GRABBED IN THE DB"/>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Subtitle</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=4"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  placeholder="Data subtitle"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Description</div>
        <div class="col-sm-7 editOverview"><textarea class="form-control"
                                                     style="height: 75px;"
                                                     name="&mode=5"
                                                     onchange="updateDB(this.value.concat(this.name))"
                                                     placeholder="Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut, nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat."></textarea>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Chart type</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=6" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Bar Chart</option>
                <option value="4">Horizontal Bar Chart</option>
                <option value="5">Line chart</option>
                <option value="6">Stacked Line Chart</option>
                <option value="2">Pie Chart</option>
                <option value="3">Doughnut Chart</option>
                <option value="1">Polar Area Chart</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Icon</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=7" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Magnifying glass</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/>
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
</div>
<br/>
<br>
&i=22&table=start&user=tlma&cycle=5
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><p><div id="txtHint"></div></p></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/><hr></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Group 1</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>

<br/>

<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Dataheader</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=22&table=start&user=tlma&cycle=5&mode=3"onchange="updateDB(this.value.concat(this.name))"
                                                  value="THIS SHOULD BE GRABBED IN THE DB"/>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Subtitle</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=4"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  placeholder="Data subtitle"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Description</div>
        <div class="col-sm-7 editOverview"><textarea class="form-control"
                                                     style="height: 75px;"
                                                     name="&mode=5"
                                                     onchange="updateDB(this.value.concat(this.name))"
                                                     placeholder="Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut, nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat."></textarea>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Chart type</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=6" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Bar Chart</option>
                <option value="4">Horizontal Bar Chart</option>
                <option value="5">Line chart</option>
                <option value="6">Stacked Line Chart</option>
                <option value="2">Pie Chart</option>
                <option value="3">Doughnut Chart</option>
                <option value="1">Polar Area Chart</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Icon</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=7" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Magnifying glass</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/>
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
</div>
<br/>
<br>
&i=22&table=start&user=tlma&cycle=6
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><p><div id="txtHint"></div></p></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/><hr></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-2 editOverview"><h3>Group 1</h3></div>
        <div class="col-sm-7 editOverview"></div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>

<br/>

<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Dataheader</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&i=22&table=start&user=tlma&cycle=6&mode=3"onchange="updateDB(this.value.concat(this.name))"
                                                  value="THIS SHOULD BE GRABBED IN THE DB"/>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Subtitle</div>
        <div class="col-sm-7 editOverview"><input type="text"
                                                  class="form-control"
                                                  name="&mode=4"
                                                  onchange="updateDB(this.value.concat(this.name))"
                                                  placeholder="Data subtitle"/></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Description</div>
        <div class="col-sm-7 editOverview"><textarea class="form-control"
                                                     style="height: 75px;"
                                                     name="&mode=5"
                                                     onchange="updateDB(this.value.concat(this.name))"
                                                     placeholder="Lorem ipsum dolor sit amet, donec volutpat egestas eget egestas sed porttitor, nulla nonummy nec ut, nulla vel ultricies amet, ac lectus consequat velit tempor, quam vestibulum vitae. Sit nullam. Veniam justo nunc porttitor magna sed ante, mi nulla orci odio eros id nullam, cras bibendum feugiat."></textarea>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Chart type</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=6" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Bar Chart</option>
                <option value="4">Horizontal Bar Chart</option>
                <option value="5">Line chart</option>
                <option value="6">Stacked Line Chart</option>
                <option value="2">Pie Chart</option>
                <option value="3">Doughnut Chart</option>
                <option value="1">Polar Area Chart</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 editOverviewLeft">Icon</div>
        <div class="col-sm-7 editOverview">
            <select class="form-control" name="&mode=7" onchange="updateDB(this.value.concat(this.name))">
                <option value="0" selected>Magnifying glass</option>
            </select></div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid bg-3 text-left">
    <div class="row">
        <div class="col-sm-1 editOverview"></div>
        <div class="col-sm-9 editOverview"><br/>
            <hr>
        </div>
        <div class="col-sm-2 editOverview"></div>
    </div>
</div>
</div>
<br/>
<br>

</body>
</html>
