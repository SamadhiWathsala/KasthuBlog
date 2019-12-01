<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>
<?php require_once("include/DB.php"); ?>
<?php

if(isset($_GET["id"])){
    $IdFromURL = $_GET["id"];
    $Connections;
    $Query = "UPDATE comments SET status='ON' WHERE id= '$IdFromURL' ";
    $Execute = mysqli_query($Connections,$Query);
    if($Execute){
        $_SESSION["SuccessMessage"]="Comment Approved Successfully";
        Redirect_to("Comments.php");
    }
    else{
        $_SESSION["ErrorMessage"]="Something went wrong. Try Again !";
        Redirect_to("Comments.php");
    }


}



?>