<?php require_once("include/DB.php"); ?>
<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>





<?php

if(isset($_POST["Submit"])){

 $UserName= ($_POST["username"]);
 $password= ($_POST["password"]);
 
  if(empty($UserName)||empty($password)){
        $_SESSION["ErrorMessage"]= "All Fields must be filled out";
        Redirect_to("Login.php");
  
  }
  else{
        $Found_Account =  Login_Attempt($UserName,$password);
            if($Found_Account){
                echo "Worded";
            }
            else {
                echo "Not worked man";
            }
                
            

  }

}
        



?>


<!DOCTYPE html>
<html>

<head>
	<title>Manage Admins </title>
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
body{
    background:white;
}
.Line {
    margin-top: -20px;
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

            </nav>
            <div class="Line" style="height: 10px; background: #27aae1;"></div>

	<div class="container-fluid">

		<div class="row">
 
			

			<div class="col-sm-offset-4 col-sm-4">
                <br><br><br><br>
                <?php 
                    echo Message();  
                    echo SuccessMessage();   
                
                ?>
                <h2>Welcome back</h2>
                <br><br>

                

                    <div>
                        <form action="Login.php" method="post">
                            <fieldset>
                                <div class="form-grop">
                                    
                                    <label for="username"> <span class="FieldInfo">User Name:</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-primary"></span>
                                        </span>
                                    <input class="form-control" type="text" name="username" id="username" placeholder="User Name">
                                    </div>
                                </div>

                                <div class="form-grop">
                                    <label for="password"> <span class="FieldInfo">Password:</span> </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock text-primary"></span>
                                        </span>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="password">
                                    </div>
                                </div>

                                <br>
                                    <input class="btn btn-info btn-block" type="Submit" name="Submit" value="Login">
                                    <br>
                            </fieldset>
                        </form>    
                    </div>

                    

                

			</div><!--Ending of main area-->

		</div><!--Ending of row-->

    </div><!--container-fluid-->
    
	

</body>

</html>