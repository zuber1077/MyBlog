<?php require_once("include/DB.php");?>
<?php require_once("include/Sessions.php");?>
<?php require_once("include/Functions.php");?>
<?php 
    if(isset($_POST["Submit"])){
        $Title=mysql_real_escape_string($_POST["Title"]);
        $Category=mysql_real_escape_string($_POST["Category"]);
        $Post=mysql_real_escape_string($_POST["Post"]);
        date_default_timezone_set("Australia/West");
        $currenttime=time();
        //echo $DateTime=strftime("%Y-%m-%d %H:%M:%S",$currenttime);
        $DateTime=strftime("%B-%d-%Y %H:%M:%S",$currenttime); 
        $DateTime;
        $Admin="zuberAb";
        $Image=$_FILES["Image"]["name"];
        $Target='uploads/'.basename($_FILES["Image"]["name"]); //target for images
        
    if(empty($Title)){
        $_SESSION["ErrorMessage"]="Title can't be empty";
        Redirect_to("AddNewPost.php");
    }elseif(strlen($Title)<2){
        $_SESSION["ErrorMessage"]="Title Should be at-least 2 Charactres";
        Redirect_to("AddNewPost.php");
    }else{
        global $ConnectingDB;
        $Query="INSERT INTO admin_panel(datetime,title,category,author,image,post)
                VALUE('$DateTime','$Title','$Category','$Admin','$Image','$Post')";
                $Execute=mysql_query($Query);
                move_uploaded_file($_FILES["Image"]["tmp_name"],$Target); //target for images

    if (move_uploaded_file($_FILES['Image']['tmp_name'],$Target)) {
      echo "File is valid, and was successfully uploaded.\n";
    } else {
       echo "Upload failed";
    }
                if($Execute){
                    $_SESSION["SuccessMessage"]="Post Added Successfully";
                    Redirect_to("AddNewPost.php");
                }else{
                    $_SESSION["ErrorMessage"]="Something Went Wrong Try Again!";
                    Redirect_to("AddNewPost.php");
                }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add New Post</title>
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
                    <li class="active"><a href="AddNewPost.php">
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
                    <h1>Add New Post</h1>
                     <?php 
                            echo Message(); 
                            echo SuccessMessage(); 
                        ?>
                    <div>
                        <form action="AddNewPost.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                              <div class="form-group">
                                <label for="title">
                                    <span class="Fildinfo">Title:</span></label>
                                <input class="form-control" type="text" name="Title" id="title" placeholder="title">
                             </div>
                              <div class="form-group">
                                    <label for="categoryselect">
                                        <span class="Fildinfo">Category:</span></label>
                                    <select class="form-control" name="Category" id="categoryselect">
                                        <?php
                                            global $ConnectingDB;
                                            $viewQuery="SELECT *FROM Category ORDER BY datetime desc;";
                                            $Execute=mysql_query($viewQuery);
                                            while ($DataRows=mysql_fetch_array($Execute)) {
                                                $Id=$DataRows["id"];
                                                $CategoryName=$DataRows["name"];
                                                
                                            ?>
                                        <option><?php echo $CategoryName; ?></option>
                                        <?php } ?>
                                    </select>
                               </div>
                               <div class="form-group">
                                    <label for="imageselect">
                                        <span class="Fildinfo">Select Image:</span></label>
                                    <input type="File" class="form-control" name="Image" id="imageselect">
                                </div>
                                <div class="form-group">
                                    <label for="postarea">
                                        <span class="Fildinfo">Post:</span></label>
                                    <textarea class="form-control" name="Post" id="postarea"></textarea>
                                </div>
                             <br>
                            <input class="btn btn-success btn-block" type="Submit" Name="Submit" Value="Add New Post">
                            </fieldset>
                            <br>
                        </form>
                    </div>
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