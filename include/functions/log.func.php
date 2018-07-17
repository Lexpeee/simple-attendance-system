<?php
    require_once "../dbconnect.php";
    include "../templates/links.temp.php";

    if(isset($_POST["btnSubmitEID"])){
        $eid = $_POST["txtEmployeeID"];

        if(empty($eid)){
            header("location:../../index.php?action=noinput");
        }else{
            $queryGetData = mysqli_query($conn,"select * from user_accounts where acct_id = '$eid'");
            $rowsGetData = mysqli_num_rows($queryGetData);
            if($rowsGetData = 0){
                echo "There are no results";
            }else if($rowsGetData > 1){
                echo "there are multiple results";
            }else{
                while($viewGetData = mysqli_fetch_array($queryGetData)){
                    echo "Name: ". $viewGetData["acct_fname"] ." ". $viewGetData["acct_lname"];
                    echo "<br>";
                    echo "Date now: ".$dateNow;
                    echo "<br>";
                    echo "Time now: ".$timeNow;
                    echo "<br>";
                    if($viewGetData["acct_status"] == 0){
                        // 0 = not logged in
                        $queryLogin = mysqli_query($conn,"insert into timetable (tim_empid,tim_date,tim_time,tim_status) values ('$eid','$dateNow','$timeNow','login')");
                        
                        if(!$queryLogin){
                            echo "can't log in due to some problem";
                            print_r($conn);
                        }else{
                            $queryChangeStatus = mysqli_query($conn,"update user_accounts set acct_status = '1' where acct_id = '$eid'");
                            if(!$queryChangeStatus){
                                echo "can't change account status";
                            }else{
                                header("location:../../index.php?action=success&status=in");
                            }
                        }
                    }else if($viewGetData["acct_status"] == 1){
                        // 1 = logged in
                        echo "You are logged in";

                        $queryLogin = mysqli_query($conn,"insert into timetable (tim_empid,tim_date,tim_time,tim_status) values ('$eid','$dateNow','$timeNow','logout')");
                        if(!$queryLogin){
                            echo "can't log in due to some problem";
                        }else{
                            $queryChangeStatus = mysqli_query($conn,"update user_accounts set acct_status = '0' where acct_id = '$eid'");
                            if(!$queryChangeStatus){
                                echo "can't change account status";
                            }else{
                                header("location:../../index.php?action=success&status=in");
                            }
                        }
                    }
                    
                }

            }
        }
        
    }
?>