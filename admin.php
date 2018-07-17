<?php
    require "include/dbconnect.php";

    session_start();

    if(isset($_SESSION["sas_status"]) && $_SESSION["sas_status"] == "admin"){

?>
<!DOCTYPE html>
<html lang="en-us">
    <head>

        <title>Administrator | SAS</title>

        <?php include "include/templates/links.temp.php" ?>

    </head>
    <body>

        <div id="adminLoginModal" class="modal fade">
            <form>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Administrator login</h3>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Password">
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="close" class="btn btn-secondary">Close</button>
                                <button type="submit" class="btn btn-outline-success active">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="jumbotron">
                <div class="text-center">
                    <h1>Welcome admin!</h1>
                    <form method="post" action="include/functions/user.func.php">
                        <button type="submit" name="btnLogout" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                <?php
                    $queryFetchTimeTable = mysqli_query($conn,"select * from timetable");
                    $rowsFTT = mysqli_num_rows($queryFetchTimeTable);

                    if(!$queryFetchTimeTable){
                        ?>
                            <div class="alert alert-danger">
                                There are no tables
                            </div>
                        <?php
                    }else{
                        ?>
                            <table class="table table-hover">
                            <tr>
                                <th>Employee ID</th>
                                <th>Date and Time</th>
                                <th>Status</th>
                            </tr>
                            
                                <?php
                                    while($viewFTT = mysqli_fetch_array($queryFetchTimeTable)){

                                        ?>
                                            <tr>
                                                <td><?php echo $viewFTT["tim_empid"]?></td>
                                                <td><?php echo $viewFTT["tim_date"]." ".$viewFTT["tim_time"]?></td>
                                                <td><?php echo $viewFTT["tim_status"]?></td>
                                                
                                            </tr>
                                        <?php
                                    }
                                ?>

                        </table>
                        <?php
                    }
                ?>
                    
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
<?php
        
    }else{
        header("location: index.php?action=noaccess");
    }
?>