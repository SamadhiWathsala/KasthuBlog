<?php require_once("include/DB.php"); ?>
<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>

<?php

if(isset($_POST["Submit"])){

            $Name= ($_POST["Name"]);
            $Email= ($_POST["email"]);
            $Comment= ($_POST["Comment"]);

            

            date_default_timezone_set("Asia/Colombo");
            $CurrentTime=time();
            $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
            $DateTime;
            $PostId = $_GET['id'];


                if(empty($Name) || empty($Email) || empty($Comment)){
                    $_SESSION["ErrorMessage"]= "All fields are required";
                    
                }
                elseif(strlen($Comment)>500){
                    $_SESSION["ErrorMessage"]= "only 500 characters are Allowed in comment";
                    
                }
                else{
                    global $Connections;
                    $postIdFromURL = $_GET['id'];
                    $Query = "INSERT INTO comments (datetime , name, email ,comment ,status ,admin_panel_id) 
                    VALUES ('$DateTime','$Name','$Email','$Comment','OFF','$postIdFromURL')";
                    $Execute=mysqli_query($Connections,$Query);
                    
                    
                    if($Execute){
                        $_SESSION["SuccessMessage"]= "Comment Submited successfully";
                        Redirect_to(" FullPost.php?id= '$PostId' ");
                    }
                    else{
                        $_SESSION["ErrorMessage"]= "Something went wrong. Try Again..!";
                        Redirect_to(" FullPost.php?id= '$PostId' ");

                    }
                }

                }

?> 


<!DOCTYPE html>
<html>

<head>
	<title>full post </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/publicstyle.css">

<style>
    .col-sm-8{
        background-color: gray;
    }
    .col-sm-3{
        background-color: aqua;
    }
    .FieldInfo{
            color: rgb(251, 174, 44);
            font-family: Bitter ,Georgia , "Times New Roman" ,Times, Serif;
            font-size: 1.2em;
 
    }
    .comment-block{
            color: yellow;
    }
    .comment-info{
        color: #365899;
        font-family: sans-serif;
        font-size: 1.1em;
        font-weight: bold;
        padding-top: 10px;
    }

    .comment{
        margin-top:-2px;
        padding-bottom: 10px;
        font-size: 1.1em;
    }
</style>
</head>

<body>

    <div style="height: 10px; background: #27aae1;"></div>

    

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Blog.php"><img src="images/kasthuri1.png" width=200; height=30; ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Blog.php">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 navbar-right" action="Blog.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="SearchBtn">GO</button>
    </form>
  </div>
</nav>


<div class="Line" style="height: 10px; background: #27aae1;"></div>

<div class="container"><!--Container-->

    <div class="blog-header">
        <h1>*...kasthuri...*</h1>
        <p class="lead">Your interesting blog page</p>
    </div>
    <div class="row"><!--Row-->
        <div class="col-sm-8"><!--Main area-->
        <?php 
            echo Message();  
            echo SuccessMessage();
                
        ?>
            <?php

                global $Connections;
                if(isset($_GET["SearchBtn"])){
                    $Search = $_GET["Search"];
                    $ViewQuery = "SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%'
                    OR post LIKE '%$Search%'";
                } 
                else{
                    $postIdURL = $_GET["id"]; 
                    $ViewQuery = "SELECT * FROM  admin_panel WHERE id= '$postIdURL' ORDER BY datetime desc";  } 
                    $Execute = mysqli_query($Connections,$ViewQuery);

                while($DataRows = mysqli_fetch_array($Execute)){
                   $postId = $DataRows["id"];
                   $DateTime = $DataRows["datetime"];
                   $Title = $DataRows["title"];
                   $Category = $DataRows["category"];
                   $Admin = $DataRows["author"];
                   $Image = $DataRows["image"];
                   $Post = $DataRows["post"];
                

            ?>

            <div class="blogpost thumbnail">
                    <img class="img-responsive img-rounded" src="Upload/<?php echo $Image; ?>">
                    <div class="caption">
                        <h1 id="heading"><?php echo htmlentities($Title); ?></h1>
                        <p class="description"> Category : <?php echo htmlentities($Category); ?> Published on <?php echo htmlentities($DateTime); ?> </p>
                        <p class="post"><?php echo ($Post); ?></p>
                    </div>
            </div>
                <?php } ?>

                <br><br>
                <br><br>
                <span class="FieldInfo">Comments</span>

                <?php
                    $Connections;
                    $postIdURL=$_GET['id'];
                    $CommentQuery = "SELECT * FROM comments WHERE admin_panel_id='$postIdURL' AND status='ON'";
                    $Execute = mysqli_query($Connections,$CommentQuery);
                    while($DataRows = mysqli_fetch_array($Execute,MYSQLI_BOTH)){
                        $CommentDate = $DataRows['datetime'];
                        $CommenterName = $DataRows['name'];
                        $UserComment = $DataRows['comment'];
                    
                
                
                ?>

                <div class="comment-block">
                       <img style="margin-left: 10px; margin-top: 10px;" class="pull-left" src="images/comments.png" width=70px; height=70px>
                       <p style="margin-left: 90px;" class="comment-info"><?php echo $CommenterName;?></p> 
                       <p style="margin-left: 90px;" class="description"><?php echo $CommenterName;?></p>
                       <p style="margin-left: 90px;" class="comment"><?php echo $UserComment;?></p>

                </div>
                <br>
                <hr>

                    <?php } ?>

                <br>
                <span class="FieldInfo">Share your thoughts about this post</span>
                


                <div>

                    <form action=" FullPost1.php?id= {$PostId} " method="post" enctype="multipart/from-data">
                        <fieldset>
                            <div class="form-grop">
                                <label for="Name"> <span class="FieldInfo">Name:</span> </label>
                                <input class="form-control" type="text" name="Name" id="Name" placeholder="Name">
                            </div>
                                <br>
                            <div class="form-grop">
                                <label for="Email"> <span class="FieldInfo">Email:</span> </label>
                                <input class="form-control" type="email" name="email" id="Email" placeholder="Email">
                            </div>
                                <br>
                            <div class="form-grop">
                                <label for="Commentarea"> <span class="FieldInfo">Comment:</span> </label>
                                <textarea class="form-control" name="Comment" id="Commentarea"></textarea>
                            </div>
                                <br>
                                <input class="btn btn-primary" type="Submit" name="Submit" value="Submit">
                                <br>
                        </fieldset>
                    </form>   

                </div>



                

                


        </div><!--Main area Ending--> 
        <div class="col-sm-offset-1 col-sm-3">
            <h2>Test</h2><!--Side area-->
            <p>bhvjhvhj hvfv hvfvs javjhvaf havfs jsvfshf jhfssygig hegyuwfryu hvwyuew hfwufryu jvfu
                guyguwguewg urugru fyugruyg bguyguy fgueuy ugeuygryue yufgeyugryueg uguyegry
                ruerguegru yuguyerguew urfugeyu bhvjhvhj hvfv hvfvs javjhvaf havfs jsvfshf jhfssygig hegyuwfryu hvwyuew hfwufryu jvfu
                guyguwguewg urugru fyugruyg bguyguy fgueuy ugeuygryue yufgeyugryueg uguyegry
                ruerguegru yuguyerguew urfugeyu
            </p>
        </div><!--Side area Ending-->      
    </div><!--Row Ending-->

</div><!--container Ending-->

<div id="footer">
       
        <hr><p>Theme By| Wathsala Perera | &COPY2018-2020 --- All Right recived.</p>

        <a style="color: white; text-decoration: none cursor: pointer font-weight: bold" href=""></a>

        <p>
            This site only use for bdbfhb hbdhvf jnaskvdhsavb ksbfhvhk hsvfhj c hvcvs cshvsyuvc v, ,nhvkjbdjksabvuyavsfkjbds jksdhjlgfuhvf shfvhdsvfkjsbjkv <br>
            bsfadfduyhsdbvs jhabksjgdu kahdfd kajgdufaduhblkajsoha djdsgf msjgyudgsy jsdguyfadua mbnugdiua bajgdus jkvadyhuavd akagdauvd dkadgja djakgduigb kijabd 
            duvuyfreuyd <br>hsdgfyufg hsiagd aoduyqfyecdv dwjueg qlheyuqfveqmji.bbdigdiwq gygwyufvd ajdui bduigdyuvdb iqhn.
        </p>

        <hr>

</div><!--Ending footer-->

<div style="height: 10px; background: #27aae1;"></div>




    
</body>

</html>