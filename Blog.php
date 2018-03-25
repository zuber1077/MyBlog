<?php require_once("include/DB.php");?>
<?php require_once("include/Sessions.php");?>
<?php require_once("include/Functions.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog Page</title>
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/publicstyle.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <style>
        /* .col-sm-8{
            background-color:#B0F566;
        } */
        .col-lg-2{
            background-color:#B0F566;
        }
    </style>
</head>
<body>
 <!-- nav bar start here -->
    <!-- <div style="height: 10px; background-color: #fff; "></div> -->
    <nav style="width=1440; heigh=80px;" class="navbar navbar-default" role="navigation">
        <div class="container">
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
                <li class="active"><a href="Blog.php">Blog</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Feature</a></li>
            </ul>
            <form action="Blog.php" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="Search">
                </div>
                <button class="btn btn-default" name="SearchButton">Go</button>
            </form>
        </div>
        </div>
    </nav>
    <!-- nav bar end here -->
    <div class="container">  <!-- container-->
        <div class="blog-header">
            <!-- <h1>My Blog</h1> -->
        </div>
        <div class="row">   <!-- row -->
            <div class="col-lg-6 col-lg-6">  <!-- main blog area -->
                <?php 
                    global $ConnectingDB;
                    if(isset($_GET["SearchButton"])){
                        $Search=$_GET["Search"];
                        $viewQuery="SELECT * FROM admin_panel WHERE datetime 
                        LIKE '%$Search%' OR LIKE title LIKE '%$Search%' OR post LIKE '%$Search%' ";
                    }
                    $viewQuery="SELECT *FROM admin_panel ORDER BY datetime desc";
                    $Execute=mysql_query($viewQuery);
                    while($DataRows=mysql_fetch_array($Execute)){
                        $PostId=$DataRows["id"];
                        $DateTime=$DataRows["datetime"];
                        $Title=$DataRows["title"];
                        $Category=$DataRows["category"];
                        $Author=$DataRows["author"];
                        $Image=$DataRows["image"];
                        $Post=$DataRows["post"];
                    
                ?>
                <div class="col-sm-offset-1 col-lg-5 blogpost thumbnail">
                    <img class="img-responive "  src="uploads/<?php echo $Image; ?>">
                    <div class="caption">
                        <h1 id="heading"><?php echo htmlentities($Title);  ?></h1>
                         <p class="description">category:<?php echo $Category; ?>
                        <span class="postdate"><?php  echo htmlentities($DateTime);?></p> </span>
                        <p class="description"><?php 
                            if(strlen($Post)>121){$Post=substr($Post,0,121).'...';}
                        echo $Post; ?></p>
                    </div>
                    <a class="readmore" href="FullPost.php?id=<?php echo $PostId; ?>">
                    READ MORE &rsaquo;&rsaquo;</a>
                </div>

                <?php } ?>
            </div>  <!-- main blog area ending -->
            <div class="col-sm-offset-4 col-lg-2"> <!-- side area -->
               <h2>Test</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates iste doloremque nisi? Rem qui nam, explicabo sequi velit facilis earum cupiditate minus, odio porro dicta reiciendis quia ab voluptate.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati ratione cumque corporis ipsum vero non tempora fugit fuga natus atque voluptatibus harum dolor architecto amet a soluta eveniet, maiores temporibus.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti officiis veniam eaque aliquid saepe consectetur, aut quae consequuntur corporis. Hic voluptatem fugit et quasi saepe libero odit possimus corrupti non! 
                </p>
            </div> <!-- side area ending-->
        </div>  <!-- row ending -->
         <div id="Footer">
            <hr>
                <p>Thema By | zuber Ab | &copy;2018-2020 --- All right resrved. </p>
            <hr>
    </div>
        <div style="height: 10px; background: #27AAE1;"></div>
   <!--  -->
    </div>  <!-- container ending -->
    
    

</body>
</html>