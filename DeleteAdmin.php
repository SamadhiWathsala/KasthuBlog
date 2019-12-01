<?php require_once("include/DB.php"); ?>
<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>

<?php

if(isset($_GET['id'])){
    $IdFromURL = $_GET['id'];
    $Connections;
    $Query = "DELETE FROM registration WHERE id = '$IdFromURL'";
    $Execute = mysqli_query($Connections,$Query);
    if($Execute){
        $_SESSION["SuccessMessage"]="Admin Deleted Successfully";
        Redirect_to("Admin.php");
    }
    else{
        $_SESSION["ErrorMessage"]="Something went wrong. Try Again";
        Redirect_to("Admin.php"); 
    }
}


?>