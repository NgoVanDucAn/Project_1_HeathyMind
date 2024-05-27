<?php 
require_once('utilss.php');
// kiem tra login
session_start();
if (!($_SESSION['login'] ?? '')){
    redirect("./Loginform.php");
}
include('connet.php');


//delete
$delete_id = $_GET['delete_id'] ?? 0;
if ($delete_id) {
    //delete form db
    $sql = "DELETE FROM `admin` WHERE `user_id` = $delete_id";
    mysqli_query($conn, $sql);
    //redirect ve trang goc 
    header("location: ./admindata.php");
    exit;
}



?>    





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="admin.js">
    <link rel="shortcut icon" href="../heathy_mind\eproject/image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
<body>
<div class="sidebar">
    <div class="logo-details">
      <img src="https://discord.com/channels/@me/898926404660498502/993160219175698495" alt="">
      <a href="adminserver.php"><img src="./img/logo.png" alt="" width="72px" height="70px"></a>
      <h3>Healthy Mind</h3> 
    </div>
      <ul class="nav-links">
        <li>
          <a href="posesdata.php">
            <i class='bx bx-table'></i>
            <span class="links_name">Poses Data</span>
          </a>
        </li>

        <li>
          <a href="edit.php">
            <i class='bx bx-add-to-queue'></i>
            <span class="links_name">Add New Poses</span>
          </a>
        </li>

        <li>
          <a href="admindata.php">
            <i class='bx bx-user'></i>
            <span class="links_name">Admin Data</span>
          </a>
        </li>

        <li class="log_out">
          <a href="./Loginform.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name"><b>Log out</b></span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"></span>
      </div>
      
    </nav>
    <div>
      <br><br>
      <br><br>
    </div>
    <div>
      <form action="adminedit.php">
      <button class="add">Add</button>
      </form>
      <form  method="POST" action="#">
        
        <!-- Hiển thị dữ liệu -->
       

        <table class="table">
          <caption>List of admin</caption>
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">NAME</th>
                <th scope="col">PASS_WORD</th>
              </tr>
            </thead>

          <tbody>
            
            <?php
              //lay du lieu trong bang poses
              $per_page_record = 4;  // Number of entries to show in a page.   
              // Look for a GET variable page if not found default is 1.        
              if (isset($_GET["page"])) {    
                  $page  = $_GET["page"];    
              }    
              else {    
                $page=1;    
              }    
              
              $start_from = ($page-1) * $per_page_record;     
              $query = "SELECT * FROM `admin` LIMIT $start_from, $per_page_record";     
              $rs_result = mysqli_query ($conn, $query);    
              while ($row = mysqli_fetch_array($rs_result)) {  
            ?>
            <tr>
              <th scope="row">
                  <a class="btn btn-outline-info" href="adminedit.php?user_id=<?php echo $row['user_id'] ?>"><?php echo $row['user_id'] ?></a>
              </th>


              <td><?php echo $row['user_name'] ?></td>
              <td><?php echo $row['pass_word'] ?></td>
              
              <td><a class="btn btn-danger" href="./admindata.php?delete_id=<?php echo $row['user_id']?>" 
              role="button">Delete</a></td>
            </tr>

            <?php }?>
          </tbody>
        </table>
        <div class="pagination" id="nav">    
            <?php  
                $query = "SELECT COUNT(*) FROM `admin`";     
                $rs_result = mysqli_query($conn, $query);     
                $row = mysqli_fetch_row($rs_result);     
                $total_records = $row[0];     
                    
                echo "</br>";     
                  // Number of pages required.   
                $total_pages = ceil($total_records / $per_page_record);     
                $pagLink = "";       
                
                if($page>=2){   
                      echo "<a href='admindata.php?page=".($page-1)."'>  Prev </a>";   
                }       
                            
                for ($i=1; $i<=$total_pages; $i++) {   
                  if ($i == $page) {   
                        $pagLink .= "<a class = 'active' href='admindata.php?page="  
                                                          .$i."'>".$i." </a>";   
                  }               
                  else  {   
                      $pagLink .= "<a href='admindata.php?page=".$i."'>   
                                                          ".$i." </a>";     
                  }   
                };     
                echo $pagLink;   
            
                if($page<$total_pages){   
                  echo "<a href='admindata.php?page=".($page+1)."'>  Next </a>";   
                }   
            
            ?>    
      </div>  
  
      <hr width="100%">  
      <div class="inline">   
        <p><?php echo $page."/".$total_pages; ?></p>

        
    </div>   
  </div>  
  <br>
  <br>
</center>   
      </form>
    </div>
  </section>
  
  
  <script src="./js/admin.js"></script>

</body>
</html>