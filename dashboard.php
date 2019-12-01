<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/DB.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title>dash board</title>
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

<link rel="stylesheet" href="css/adminpge.css">
<style>

.col-sm-10 {
    background: rgb(247, 243, 248);
}

.Bottom-Line {
    margin-top: -20px;
}

.nav-item {
    font-weight: bold;
    font-family: Bitter, Georgia, Times, "Times New Roman", serif;
    font-size: 1.2em;
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


        <div class="Bottom-Line" style="height: 10px; background: #27aae1;"></div>








	<div class="container-fluid">

		<div class="row">
 
			<div class="col-sm-2">

                    <br>
                    <br>    

                
                    <ul id="side-menu" class="nav nav-pills nav-stacked flex-sm-column">
                        <li class="active">
                            <a href="dashboard.php">
                            <span class="glyphicon glyphicon-th"></span>&nbsp Dashboard</a>    
                        </li>
                            
                        <li>
                            <a href="AddNewPost.php">
                            <span class="glyphicon glyphicon-list-alt"></span>&nbsp Add New post</a>
                        </li>
                        <li>
                            <a href="categories.php">
                            <span class="glyphicon glyphicon-tags"></span>&nbsp Categories</a>
                        </li>
                        <li>
                            <a href="#">
                            <span class="glyphicon glyphicon-user"></span>&nbsp Manage Admin</a>
                        </li>
                        <li>
                            <a href="comments.php">
                            <span class="glyphicon glyphicon-comment"></span>&nbsp Comment</a>
                        </li>
                        <li>
                            <a href="#">
                            <span class="glyphicon glyphicon-equalizer"> </span>&nbsp Live blog</a>
                        </li>
                        <li>
                            <a href="#">
                            <span class="glyphicon glyphicon-log-out"></span>&nbsp Log out</a>
                        </li>
                    </ul>

                    

			</div><!--Ending of side area-->

			<div class="col-sm-10"><!--Main area-->

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
                            
                            $Connections;
                            $ViewQuery = "SELECT * FROM  admin_panel ORDER BY datetime desc";
                            $Execute=mysqli_query($Connections,$ViewQuery);
                            $SrNo = 0;   
                            while($DataRows = mysqli_fetch_array($Execute)){
                                $Id = $DataRows["id"];
                                $DateTime = $DataRows["datetime"];
                                $Title = $DataRows["title"];
                                $Category = $DataRows["category"];
                                $Admin = $DataRows["author"];
                                $Image = $DataRows["image"];
                                $Post = $DataRows["post"]; 
                                $SrNo++;
                                ?>

                                <tr>
                                    <td><?php echo $SrNo?></td>
                                    <td style="color: blue;"><?php
                                    if(strlen($Title)>20){
                                        $Title = substr($Title,0,20).'..';
                                    }
                                    echo $Title?></td>
                                    <td><?php
                                    if(strlen($DateTime)>11){
                                        $DateTime = substr($DateTime,0,11).'..';
                                    }
                                    echo $DateTime?></td>
                                    <td><?php
                                    if(strlen($Admin)>7){
                                        $Admin = substr($Admin,0,7).'..';
                                    }
                                    echo $Admin?></td>
                                    <td><?php 
                                    if(strlen($Category)>10){
                                        $Category = substr($Category,0,7).'..';
                                    }
                                    echo $Category?></td>
                                    <td><img src="upload/<?php echo $Image ;?>" width="170" height="40px" ></td>
                                    <td>Processing</td>
                                    <td><a href="EditPost.php?Edit=<?php echo $Id; ?>"> <span class="btn btn-warning">Edit</span>  </a>  
                                        <a href="DeletePost.php?Delete=<?php echo $Id; ?>"> <span class="btn btn-danger">Delete</span> </a>
                                    </td>
                                    <td> 
                                        <a href="FullPost.php?id=<?php echo $Id; ?>" target = "_blank">
                                            <span class="btn btn-primary">Live Preview</span> 
                                        </a>
                                    </td>
                                    
                                </tr>

                            <?php } ?>
                            
                            
                            
                        </table>

                    </div>
                

                
                
                  

                

                

			</div><!--Ending of main area-->

		</div><!--Ending of row-->

    </div><!--container-fluid-->
    
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

    <div style="height: 10px; background:#27AAE1;"></div>
	

</body>

</html>