<?php require_once("include/DB.php");?>
<?php require_once("include/Sessions.php");?>
<?php require_once("include/Functions.php");?>
<?php 
    if(isset($_POST["Submit"])){
        $Category=mysql_real_escape_string($_POST["Category"]);
        date_default_timezone_set("Australia/West");
        $currenttime=time();
        $Admin="zuberAb";
        //echo $DateTime=strftime("%Y-%m-%d %H:%M:%S",$currenttime);
        $DateTime=strftime("%B-%d-%Y %H:%M:%S",$currenttime); 
        $DateTime; 
    if(empty($Category)){
        $_SESSION["ErrorMessage"]="All Fields must be filled out";
        Redirect_to("Categories.php");
    }elseif(strlen($Category)>99){
        $_SESSION["ErrorMessage"]="too long name for Category";
        Redirect_to("Categories.php");
    }else{
        global $ConnectingDB;
        $Query="INSERT INTO Category(datetime,name,creatorname)
                VALUE('$DateTime','$Category','$Admin')";
                $Execute=mysql_query($Query);
                if($Execute){
                    $_SESSION["SuccessMessage"]="Category Added Successfully";
                    Redirect_to("Categories.php");
                }else{
                    $_SESSION["ErrorMessage"]="Category Failed to Add";
                    Redirect_to("Categories.php");
                }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage Category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/Adminstyle.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
    <style>
        .Fildinfo{
            color: #348de5;
            /* font-family: Bitter,Georgia,"Time New Roman",Times,serif; */
            font-size: 1.2em;
        }
    </style>
                
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <h1>&nbsp;Zuber</h1>
                <ul id="Side_Menu" class="nav nav-pills nav-stacked">
                    <li><a href="AdminDashboard.php">
                        <span class="glyphicon glyphicon-th"></span>
                    &nbsp;Dash Board</a></li>
                    <li><a href="AddNewPost.php">
                        <span class="glyphicon glyphicon-list-alt"></span>
                    &nbsp;Add New Post</a></li>
                    <li class="active"><a href="Categories.php">
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
                    <h1>Manage Categories</h1>
                     <?php 
                            echo Message(); 
                            echo SuccessMessage(); 
                        ?>
                    <div>
                        <form action="Categories.php" method="POST">
                            <fieldset>
                              <div class="form-group">
                                <label for="categoriesname"><span class="Fildinfo">Name:</span></label>
                                <input class="form-control" type="text" name="Category" id="categoriesname" placeholder="Name">
                             </div>
                             <br>
                            <input class="btn btn-success btn-block" type="Submit" Name="Submit" Value="Add New Categories">
                            </fieldset>
                            <br>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Sr No.</th>
                                <th>Date & Time</th>
                                <th>Category Name</th>
                                <th>Creator Name</th>
                            </tr>
                            <?php
                                global $ConnectingDB;
                                $viewQuery="SELECT *FROM Category ORDER BY datetime desc";
                                $Execute=mysql_query($viewQuery);
                                $SrNo=0;
                                while ($DataRows=mysql_fetch_array($Execute)) {
                                    $Id=$DataRows["id"];
                                    $DateTime=$DataRows["datetime"];
                                    $CategoryName=$DataRows["name"];
                                    $CreatorName=$DataRows["creatorname"];
                                    $SrNo++;
                                
                            ?>
                            <tr>
                                <td><?php echo $SrNo; ?></td>
                                <td><?php echo $DateTime; ?></td>
                                <td><?php echo $CategoryName; ?></td>
                                <td><?php echo $CreatorName; ?></td>
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