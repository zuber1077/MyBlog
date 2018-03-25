<?php require_once("include/Sessions.php");?>
<?php require_once("include/Functions.php");?>
<?php require_once("include/DB.php");?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/Adminstyle.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
                
</head>
<body>
    <nav style="width=1440; heigh=80px;" class="navbar navbar-default" role="navigation">
        <div class="nav-nav container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"            data-target="#collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="Blog.php" class="navbar-brand">   
                    <img style="margin-top: -14px;" src="images/zu.png" alt="" width=70; height=50;>
                </a> 
            </div>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="Blog.php" target="_blank">Blog</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Feature</a></li>
            </ul>
            <form action="Blog.php" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="Search">
                </div>
                <button class="search-btn btn btn-default" name="SearchButton">Go</button>
            </form>
        </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <!-- <h1>&nbsp;Zuber</h1> -->
                <br>
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
                <div class="col-sm-10"><!--Main Area-->
                    <div>
                            <?php 
                                echo Message(); 
                                echo SuccessMessage(); 
                            ?>
                        </div>
                    <h1>Admin Dashboard</h1> 
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Post Title</th>
                                    <th>Date & Time</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Banner</th>
                                    <th>Comments</th>
                                    <th>Action</th>
                                    <th>Details</th>
                                </tr>
                                <?php
                                    $ConnectingDB;
                                    $viewQuery="SELECT * FROM admin_panel ORDER BY datetime desc;";
                                    $Excuete=mysql_query($viewQuery);
                                    $SrNo=0;
                                    while($DataRows=mysql_fetch_array($Excuete)){
                                        $Id=$DataRows["id"];
                                        $DateTime=$DataRows["datetime"];
                                        $Title=$DataRows["title"];
                                        $Category=$DataRows["category"];
                                        $Admin=$DataRows["author"];
                                        $Image=$DataRows["image"];
                                        $Post=$DataRows["post"];
                                        $SrNo++;
                                    ?>
                                    <tr>
                                        <td><?php echo $SrNo; ?></td>
                                        <td style="color:#348de5;">
                                            <?php
                                                if(strlen($Title)>20){
                                                    $Title=substr($Title,0,20).'..';
                                                    echo $Title; 
                                                }
                                            ?>
                                        </td>
                                        <td>
                                             <?php
                                                if(strlen($DateTime)>11){
                                                    $DateTime=substr($DateTime,0,11).'..';
                                                    echo $DateTime; 
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if(strlen($Admin)>5){
                                                    $Admin=substr($Admin,0,5);
                                                    echo $Admin; 
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $Category; ?></td>
                                        <td><img src="uploads/<?php echo $Image; ?>" 
                                        width="130px"; height="70px" ></td>
                                        <td>Proccessing</td>
                                        <td>
                                            <a href="EditPost.php?Edit=<?php echo $Id; ?>">
                                                <span class="btn btn-warning">Edit</a></span>
                                            <a href="DeletePost.php?Delete=<?php echo $Id; ?>">
                                            <span class="btn btn-danger">Delete</a></span>
                                        </td>
                                        <td>Live Preview</td>
                                    </tr>

                                <?php } ?>
                            </table>
                        </div>
                </div> <!--ending main area -->
            </div> <!--ending row -->
        </div> <!--ending container -->
        <div id="Footer">
            <hr>
                <p>Thema By | zuber Ab | &copy;2018-2020 --- All right resrved. </p>
            <hr>
    </div>
        <div style="height: 10px; background: #348de5;"></div>
</body>
</html>