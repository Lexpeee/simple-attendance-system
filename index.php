<?php
    require_once "include/dbconnect.php";

    session_start();
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>

        <title>Login | SAS</title>
        <?php include "include/templates/links.temp.php" ?>

    </head>
    <body>

        <div id="adminLoginModal" class="modal fade">
            <form action="include/functions/user.func.php" method="post" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Administrator login</h3>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name="txtUser" class="form-control" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txtPass" class="form-control" placeholder="Enter Password">
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="btnLoginSession" class="btn btn-outline-success active">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="jumbotron">
                <div class="text-center">
                    <h1>Welcome to the workplace!</h1>
                    <p>Please enter your employee ID.</p>
                </div>
            </div>
            <?php
                if(isset($_REQUEST["action"])){
                    if($_REQUEST["action"] == "noinput"){

            ?>
                <div class="alert alert-danger">
                    There are no inputs
                </div>
            <?php
                    }else if($_REQUEST["action"] == "success" && $_REQUEST["status"] == "in"){
            ?>
                <div class="alert alert-success">
                    User has logged in
                </div>
            <?php
                    }else if($_REQUEST["action"] == "success" && $_REQUEST["status"] == "out"){
            ?>
                <div class="alert alert-success">
                    User has logged out
                </div>
            <?php
                    }else if($_REQUEST["action"] == "noaccess"){
                        ?>
                <div class="alert alert-danger">
                    You have no access to the site.
                </div>
                        <?php
                    }
                }
            ?>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <form action="include/functions/log.func.php" method="post">
                        <div class="form-group">
                            <input type="text" name="txtEmployeeID" class="form-control m-5" placeholder="Enter Employee ID">
                            <button type="submit" name="btnSubmitEID" class="btn btn-outline-success active">Submit ID</button>
                            <br>
                            <a class="link" href="#" data-toggle="modal" data-target="#adminLoginModal">Log-in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </body>

<!-- 
    index.php
    
    admin.php
    records.php

 -->
</html>
