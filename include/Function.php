<?php require_once("include/DB.php"); ?>
<?php require_once("include/Session.php"); ?>


<?php

    function Redirect_to($New_Location){
        header("Location:".$New_Location);
        exit;
    }



    function Login_Attemt($Username,$Password){
        $Connections;
        $Query = "SELECT * FROM registration WHERE usename='$Username' AND password='$Password'";
        $Execute= mysqli_query($Connections,$Query);
        if($admin = mysqli_fetch_assoc($Execute) ){
            return $admin;
        }
        else{
            return null;
        }
    }

?>


