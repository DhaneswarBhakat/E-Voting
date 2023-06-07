<?php
         session_start();
         if(!isset($_SESSION['votersdata'])){
             header("location: ../");
        }

        $votersdata = $_SESSION['votersdata']; 
        $groupsdata = $_SESSION['groupsdata'];

        if($votersdata['status']==0){
            $status = '<b style= "color:red">not voted</b>';
        }
        else{
             $status = '<b style= "color:green"> voted</b>';
        }              
?>

 <html>
    <head>
        <title>Online Voting System Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">

    </head>
    <body class="img-dashboard">

         <style>
              
              #backbtn{
                padding: 8px;
                font-size: 15px;
                border-radius: 5px;
                background-color: rgba(107, 86, 86, 0.76);
                color: black;
                float: left;
                margin: 10px;
              }

              #logoutbtn{
                padding: 8px;
                font-size: 15px;
                border-radius: 5px;
                background-color: rgba(107, 86, 86, 0.76);
                color: black;
                float: right;
                margin: 10px;

              }

              #Profile{
                  background-color: white;
                  width: 20%;
                  padding: 15px;
                  float: left;
              }

              #Group{
                background-color: white;
                  width: 60%;
                  padding: 20px;
                  float: right;
                 }

                 #votebtn{
                    padding: 8px;
                font-size: 15px;
                border-radius: 5px;
                background-color: rgba(107, 86, 86, 0.76);
                color: black;
                 }

              #mainpanel{
                  padding: 10px;
              }

              #voted{
                padding: 8px;
                font-size: 15px;
                border-radius: 5px;
                background-color: green;
                color: black;

              }
              
      </style>
        <br>

     <div id= "mainSection">
             <center>
            <div id="headerSection">
            <a href="../"><button id="backbtn"> Back</button></a>
            <a href="logout.php"><button id="logoutbtn">Logout</button></a> 
               <h1>Online Voting System</h1>
           </div> 
             </center>          
         

         <hr>
         <div id= "mainpanel">
           <div id="Profile">
           <center><img src="../uploads/<?php echo $votersdata['photo']?>" height="100" width="100"></center><br><br>
            <b>Name:</b><?php echo $votersdata['name']?> <br><br> 
            <b>Phone:</b><?php echo $votersdata['phone']?> <br><br> 
            <b>Address:</b><?php echo $votersdata['address']?> <br><br>
            <b>status:</b><?php echo  $status?> <br><br> 
           </div>

          <br>
           <div id="Group">
              <?php 
                 if($_SESSION['groupsdata']){
                    for($i=0; $i<count($groupsdata); $i++){
                  ?>
                   <div>
                      <img  style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
                      <b>Group name:</b><?php echo $groupsdata[$i]['name']?><br><br>
                      <b>voters:</b><?php echo $groupsdata[$i]['votes']?><br><br>
                      <form action="../api/vote.php" method = "POST">
                          <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                          <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                           <?php
                                if($_SESSION['votersdata']['status']==0){
                                    ?>
                                    <input type="submit" name="votebtn" value="vote" id="votebtn">
                                    <?php
                                }
                                else{
                                    ?>
                                    <button  disabled type="button" name="votebtn" value="vote" id="voted"></button>
                                    <?php
                                }
                            ?>
   
                      </form>
                    </div>
                      <hr>
                <?php
                   }
                }
              ?>

            </div>
          </div>
        </div>
    </body>
  </html>