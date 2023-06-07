<?php 
    session_start();
    include("connect.php");

    $votes = $_POST['gvotes'];
    $total_votes = $votes+1;
    $gid = $_POST['gid'];
    $vid = $_SESSION['votersdata']['id'];

    $update_votes = mysqli_query($connect, "UPDATE voters SET votes='$total_votes' WHERE id='$gid' ");
    $update_voters_status = mysqli_query($connect, "UPDATE voters SET status=1 WHERE id='$gid'");

    if($update_votes and $update_voters_status ){
        $groups = mysqli_query($connect, "SELECT * FROM voters WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);

        $_SESSION['votersdata']['status'] = 1;
        $_SESSION['groupsdata']=$groupsdata;

        echo '
        <script>
           alert("Voting Successful");
           window.location = "../routes/dashboard.php";          
        </script>';
    }
    else{
        echo '
        <script>
           alert("Some error occured.!!");
           window.location = "../routes/dashboard.php";          
        </script>';
    }

 
?>