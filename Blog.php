<?php require_once("include/DB.php"); ?>
<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>


<!DOCTYPE html>
<html>

<head>
	<title>Blog Page</title>
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
        background-color: blue;
    }
    .col-sm-3{
        background-color: aqua;
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
    <form class="form-inline my-2 my-lg-0 navbar-right">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="SearchBtn">GO</button>
    </form>
  </div>
</nav>


<div class="Line" style="height: 10px; background: #27aae1;"></div>

<div class="container"><!--Container-->

    <div class="blog-header">
        <h1>*...kasthuri...*</h1>
        <p class="lead">gdjshgfhj abbdhavd jndgaud jkbahdfa  jkdaufdt agdyuafdy hadfuyaf aldhyufuy gyudfd bdsh</p>
    </div>
    <div class="row"><!--Row-->
        <div class="col-sm-8"><!--Main area-->
            <?php

                global $Connections;
                if(isset($_GET["SearchBtn"])){
                    $Search = $_GET["Search"];
                    $ViewQuery = "SELECT * FROM admin_panel WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%'
                    OR post LIKE '%$Search%'";
                }
                else{
                $ViewQuery = "SELECT * FROM  admin_panel ORDER BY datetime desc";  } 
                $Execute=mysqli_query($Connections,$ViewQuery);
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
                        <p class="description">Category : <?php echo htmlentities($Category); ?> Published on <?php echo htmlentities($DateTime); ?> </p>
                        <p class="post"><?php 
                        
                            if(strlen($Post)>150){

                                $Post = substr($Post,0,150).'...';

                            }
                        
                        echo ($Post); ?></p>
                    </div>
                    <a href="FullPost.php?id=<?php echo  $postId; ?>">
                            <span class="btn btn-info">
                            Read More &rsaquo;&rsaquo; 
                            </span>
                    </a>
            </div>
                <?php } ?>

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