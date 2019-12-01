<?php require_once("include/DB.php"); ?>
<?php require_once("include/Session.php"); ?>
<?php require_once("include/Function.php"); ?>

<?php

if(isset($_GET['id'])){
    $IdFromURL = $_GET['id'];
    $Connections;
    $Query = "DELETE FROM categories WHERE id = '$IdFromURL'";
    $Execute = mysqli_query($Connections,$Query);
    if($Execute){
        $_SESSION["SuccessMessage"]="Category Deleted Successfully";
        Redirect_to("categories.php");
    }
    else{
        $_SESSION["ErrorMessage"]="Something went wrong. Try Again";
        Redirect_to("categories.php");
    }
}


?>