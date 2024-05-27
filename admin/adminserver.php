<?php 
require_once('utilss.php');
// kiem tra login
session_start();
if (!($_SESSION['login'] ?? '')){
    redirect("./Loginform.php");
}
include('connet.php');


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../heathy_mind\eproject/image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  </head>
<body>
    <div class="container">
      <br>
        <h1>Healthy Mind Manage</h1>
        
        <div class="Item"> 
          <a href="posesdata.php">
            <div class="div2">
              <br>
              <br>
              <p><h3>Poses-Data</h3></p>
              <p><i class='bx bx-table'></i></p>

            </div>
          </a>
          <a href="edit.php">
            <div class="div2">
              <br>
              <br>
              <p><h3>Add New Pose</h3></p>
              <p><i class='bx bx-add-to-queue'></i></p>
            </div> 
          </a>

          <a href="admindata.php">
            <div class="div2">
              <br>
              <br>
              <p><h3>Admin data</h3></p>
              <p><i class='bx bx-user'></i></p>
            </div> 
          </a>
        </div>
    </div>










  </section>
  
  <!-- <script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
 </script> -->
 

</body>
</html>