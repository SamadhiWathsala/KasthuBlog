<?php require_once("include/DB.php"); ?>
<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>





<?php

if(isset($_POST["Submit"])){

 $Title= ($_POST["Title"]);
 $Category= ($_POST["Category"]);
 $Post= ($_POST["Post"]);

 date_default_timezone_set("Asia/Colombo");
 $CurrentTime=time();
 $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
 $DateTime;
 $Admin = "Samadhi Perera";

 
 
 $Image = $_FILES["Image"]["name"];
 $Target = "upload/".basename($_FILES["Image"]["name"]);
 if(empty($Title)){
    $_SESSION["ErrorMessage"]= "Title can't be empty";
    Redirect_to("AddNewPost.php");
 }
 elseif(strlen($Title)<2){
    $_SESSION["ErrorMessage"]= "Title should be at-least 2 Characters";
    Redirect_to("AddNewPost.php");
 }
 else{
    global $Connections;
    $Query = "INSERT INTO admin_panel(datetime,title,category,author,image,post)VALUES
    ('$DateTime',' $Title','$Category','$Admin','$Image','$Post')";
    $Execute=mysqli_query($Connections,$Query);
    
    
    if($Execute){
        $_SESSION["SuccessMessage"]= "Post added successfully";
        Redirect_to("AddNewPost.php");
    }
    else{
        $_SESSION["ErrorMessage"]= "Something went wrong. Try Again..!";
        Redirect_to("AddNewPost.php");

    }
 }

}

?> 





<!DOCTYPE html>
<html>

<head>
	<title>Add New Post</title>
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
.FieldInfo{
    color: rgb(251, 174, 44);
    font-family: Bitter,Georgia,"Times New Roman",Times,serif;
    font-size: 1.2em;
}
</style>

</head>

<body>

	<div class="container-fluid">

		<div class="row">
 
			<div class="col-sm-2">

                <h2>Kasthuri</h2>

                
                    <ul id="side-menu" class="nav nav-pills nav-stacked flex-sm-column">
                        <li >
                            <a href="dashboard.php">
                            <span class="glyphicon glyphicon-th"></span>&nbsp Dashboard</a>    
                        </li>
                            
                        <li class="active">
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
                            <a href="#">
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

			<div class="col-sm-10">

                <h1>Add New Post</h1>

                <?php 
                    echo Message();  
                    echo SuccessMessage();
                
                ?>

                    <div>
                        <form action="AddNewPost.php" method="post" enctype="multipart/from-data">
                            <fieldset>
                                <div class="form-grop">
                                    <label for="title"> <span class="FieldInfo">Title:</span> </label>
                                    <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                                </div>
                                <div class="form-grop">
                                    <label for="categorySelect"> <span class="FieldInfo">Category:</span> </label>
                                    <select class="form-control" name="Category" id="categorySelect">

                                        <?php
                                            
                                            global $Connections;
                                            $ViewQuery = "SELECT * FROM categories ORDER BY datetime desc";
                                            $Execute=mysqli_query($Connections,$ViewQuery);
                                            
                                            
                                            while($DataRows = mysqli_fetch_array($Execute)){
                                                $Id = $DataRows["id"];
                                                $CategoryName = $DataRows["name"];
                                                
                                        ?>

                                                <option><?php echo $CategoryName ?></option>

                                     <?php } ?>
                                                
                                            

                                        

                                    </select>
                                </div>

                                <div class="form-grop">
                                    <label for="imageSelect"> <span class="FieldInfo">Select Image:</span> </label>
                                    <input type="file" name="Image" id="imageSelect">
                                </div>

                                <div class="form-grop">
                                    <label for="postarea"> <span class="FieldInfo">Post:</span> </label>
                                    <textarea class="form-control" name="Post" id="postarea"></textarea>
                                </div>
                                <br>
                                    <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
                                <br>
                            </fieldset>
                        </form>    
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