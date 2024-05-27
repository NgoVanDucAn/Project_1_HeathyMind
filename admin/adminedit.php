<?php 
require_once('utilss.php');
// kiem tra login
session_start();
if (!($_SESSION['login'] ?? '')){
    redirect("./Loginform.php");
}
include('connet.php');





//Thuc hien chuc nang add
if ($_POST) {
  //Lay du lieu tu form
  
    $user_id =intval($_GET['user_id'] ?? 0);
    $user_name =$_POST['user_name'];
    $pass_word =md5($_POST['pass_word']);

    
    
    if ($user_id){
      //Update 
      $sql= "UPDATE `admin` SET `user_name` = ?, `pass_word` = ?
      WHERE `user_id` = ?";
      sqlExecute($sql, 'ssd', $user_name, $pass_word, $user_id);
      // echo $sql;
      // exit;

    } else {
      //insert vao database
        $sql= "INSERT INTO  `admin` (`user_name`, `pass_word`) VALUES ( ?, ?)";
        sqlExecute($sql, 'ss', $user_name, $pass_word);
        // echo $sql;
        // exit;

    }
    
  //redirect ve trang goc 

  header("location:./admindata.php");
  exit;
  
}

//Hien thi form add
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../heathy_mind\eproject/image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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

    <div class="edit">
      <form method="post" action="#">
        <?php 
        //neu edit lay du lieu tu db
          $user_id = intval($_GET['user_id'] ?? 0);
          $row = [];
          if ($user_id) {
            $sql = "SELECT * FROM `admin` WHERE `user_id` = ?";
            $result = sqlExecute($sql, 'd', $user_id);
            $rows = sqlGetAll($sql, 'd', $user_id);
            $row = $rows[0];
          }
        //do du lieu vao form
        ?>
        

        <div class="edit_form">
            <?php 
              if($user_id):?>
                <div>
                  <label for=""><h5>Id</h5></label>
                  <?php echo $user_id?>

                </div>
            <?php endif; ?>

              <div>
                <p><h5>Name</h5></p>
                <input type="text" name="user_name" 
                 value= "<?php echo ($row['user_name'] ?? '')?>">

              </div>

            
              <div>
                <p><h5>pass</h5></p>
                <input type="password" name="pass_word"><?php echo ($row ['pass_word'] ?? '')?></input>
              </div>
      
              <br>
              <br>

          
          <button type="submit" class="add" name="submit" >Add</button>
        </div>
    
        </form>
    </div>
</section>
<script src="./js/admin.js"></script>
</body>
</html>