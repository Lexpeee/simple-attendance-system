<?php
    require_once "../dbconnect.php";

    session_start();
    
    if(isset($_POST["btnLoginSession"])){

        if(empty($_POST["txtUser"]) || empty($_POST["txtPass"])){
            header("location: ../../index.php?action=noinput");
        }else{
            $username = $_POST["txtUser"];
            $password = $_POST["txtPass"];
            
            $queryGetUser = mysqli_query($conn,"select * from user_accounts where acct_username = '$username' and acct_password = '$password'");
            $rowsGetUser = mysqli_num_rows($queryGetUser);
            if($rowsGetUser < 1){
                echo "No results";
            }else if($rowsGetUser > 1){
                echo "There are multiple users";
            }else{
                while($view = mysqli_fetch_array($queryGetUser)){
                    if($view["acct_username"] == $username && $view["acct_password"] == $password){
                        echo $rowsGetUser;

                        $_SESSION["sas_uid"] = $view["acct_id"];
                        $_SESSION["sas_fname"] = $view["acct_fname"];
                        $_SESSION["sas_lname"] = $view["acct_lname"];
                        $_SESSION["sas_status"] = $view["acct_type"];
                        echo
                        header("location:../../admin.php");
                    }
                }
            }
        }
    }

    if(isset($_POST["btnLogout"])){
        session_destroy();
        header("location: ../../index.php");
    }

    
?>