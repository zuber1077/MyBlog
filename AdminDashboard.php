<?php require_once("include/Sessions.php");?>
<?php require_once("include/Functions.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/Adminstyle.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
                
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <h1>&nbsp;Zuber</h1>
                <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                    <li class="active"><a href="AdminDashboard.php">
                        <span class="glyphicon glyphicon-th"></span>
                    &nbsp;Dash Board</a></li>
                    <li><a href="AddNewPost.php">
                        <span class="glyphicon glyphicon-list-alt"></span>
                    &nbsp;Add New Post</a></li>
                    <li><a href="Categories.php">
                        <span class="glyphicon glyphicon-tags"></span>
                    &nbsp;Categories</a></li>
                    <li><a href="DashBoard.php">
                        <span class="glyphicon glyphicon-user"></span>
                    &nbsp;Manage Admin</a></li>
                    <li><a href="DashBoard.php">
                        <span class="glyphicon glyphicon-comment"></span>
                    &nbsp;Comments</a></li>
                    <li><a href="DashBoard.php">
                        <span class="glyphicon glyphicon-equalizer"></span>
                    &nbsp;Live Blog</a></li>
                    <li><a href="DashBoard.php">
                        <span class="glyphicon glyphicon-log-out"></span>
                    &nbsp;Logout</a></li>
                </ul>
            </div>
                <div class="col-sm-10">
                    <h1>Admin Dashboard</h1>
                    <div>
                        <?php 
                            echo Message(); 
                            echo SuccessMessage(); 
                        ?>
                    </div>
                    <h4>About</h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur placeat necessitatibus maiores praesentium. Sunt nemo et, provident, necessitatibus vero aperiam debitis itaque minima, magnam quas nam in corrupti animi vitae.
                    </p>
                </div> <!--ending main area -->
            </div> <!--ending row -->
        </div> <!--ending container -->
        <div id="Footer">
            <hr>
                <p>Thema By | zuber Ab | &copy;2018-2020 --- All right resrved. </p>
            <hr>
    </div>
        <div style="height: 10px; background: #27AAE1;"></div>
</body>
</html>