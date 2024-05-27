<?php 
require_once('utilss.php');
// kiem tra login
session_start();
if (!($_SESSION['login'] ?? '')){
    redirect("./Loginform.php");
}
include('connet.php');





//Thuc hien chuc nang add

  //Lay du lieu tu form
  
  if(isset($_POST["submit"])){
   
    $poses_id =intval($_GET['poses_id'] ?? 0);
    $poses_name =$_POST['poses_name'];
    $information =$_POST['information'];
    $thumnail =$_POST['thumbnail'];
    $general =$_POST['general'];
    $type =$_POST['type'];
    $anatomy =$_POST['anatomy'];
    $benefit =$_POST['benefit'];
    $video_file = $_FILES['video_file']['name'];
      $target_dir = "../heathy_mind/eproject/video/";
      $target_file = $target_dir . $_FILES["video_file"]["name"];
      $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
    $maxsize = 41943040; 
    $extensions_arr = array("mp4","ogg");

    if(!in_array($videoFileType,$extensions_arr) ){
      echo '<script>alert("Some Thing Error")</script>';
    }
      // Điều kiện kiểm tra dung lượng file
        if(($_FILES['video_file']['size'] >= $maxsize)) {
          echo "File quá lớn! Vui lòng upload file nhỏ hơn!";
      
        }else{
        // Tiếp hành Upload
        move_uploaded_file($_FILES['video_file']['tmp_name'],$target_file);

            if ($poses_id){
              //Update 
              $sql= "UPDATE poses SET poses_name = ?, information = ?, `thumbnail` = ?, video_file = ? , general = ?, type = ?, anatomy = ?, benefit = ?
              WHERE poses_id = ?";
              sqlExecute($sql, 'ssssssssd', $poses_name, $information, $thumnail, $video_file, $general, $type, $anatomy, $benefit, $poses_id);
              // echo $sql;
              // exit;
        
            } else {
              //insert vao database
                $sql= "INSERT INTO  `poses` (`poses_name`, `information`, `thumbnail`, `video_file`, `general`, `type`, `anatomy`, `benefit`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
                sqlExecute($sql, 'ssssssss', $poses_name, $information, $thumnail, $video_file, $general, $type, $anatomy, $benefit);
                // echo $sql;
                // exit;
        
            }
        
            header("location:./posesdata.php");
            exit;
        
          
          
           

        }
    
    
    
    
      
    
  







    // print_r($_POST);
    // exit;
    
    
    
    
    
    
  //redirect ve trang goc 

  
  
}

//Hien thi form add
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../heathy_mind\eproject/image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <form method="post" action="#" enctype="multipart/form-data">
        <?php 
        //neu edit lay du lieu tu db
          $poses_id = intval($_GET['poses_id'] ?? 0);
          $row = [];
          if ($poses_id) {
            $sql = "SELECT * FROM poses WHERE poses_id = ?";
            $result = sqlExecute($sql, 'd', $poses_id);
            $rows = sqlGetAll($sql, 'd', $poses_id);
            $row = $rows[0];
          }
        //do du lieu vao form
        ?>
        

        <div class="edit_form">
            <?php 
              if($poses_id):?>
                <div>
                  <label for=""><h5>Id</h5></label>
                  <?php echo $poses_id?>

                </div>
            <?php endif; ?>

              <div>
                <p><h5>Poses_name</h5></p>
                <input type="text" name="poses_name" 
                 value= "<?php echo ($row['poses_name'] ?? '')?>">

              </div>

            
              <div>
                <p><h5>Information</h5></p>
                <textarea id="summernote" name="information" rows="4" cols="50"><?php echo ($row['information'] ?? '')?></textarea>
              </div>
            
            <div class="file">
              <p><h5>Do you have another video? :</h5></p>
              <input type="file" name="video_file" value= "<?php echo ($row['poses_name'] ?? '')?>">
            </div>
                <br>
            <div class="form-group">
                  <label for="thumbnail"><h5>Thumbnail:</h5></label>
                  <input  type="text" class="form-control" id="thumbnail" name="thumbnail"value="<?php echo ($row['thumbnail'] ?? '') ?>" placeholder="Enter your link image here" onchange="updateThumbnail()">
                  <img src="<?php echo ($row['thumbnail'] ?? '')?>"style="max-width:200px" id= "img_thumbnail"> 
            </div>

          <p><h5>Category</h5></p>

          <!-- do du lieu ra select -->
          <div>
            <label><h6>General</h6></label>
            <?php 
              // lay du lieu tu bang
                  $res = mysqli_query($conn, "SELECT * from general");
                  $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <select name="general">
              
              <?php foreach ($rows as $rows):?>
                  <html>
                      <option value="<?php echo $rows['name']; ?>">
                          <?php echo $rows['name']; ?>
                      </option>
                  </html>
              <?php endforeach;?>
            </select>
          </div>


          <div>
            <label><h6>Type</h6></label>
            <?php 
              // lay du lieu tu bang
                  $res = mysqli_query($conn, "SELECT * from type");
                  $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <select name="type">
              
              <?php foreach ($rows as $rows):?>
                  <html>
                      <option value="<?php echo $rows['name']; ?>">
                          <?php echo $rows['name']; ?>
                      </option>
                  </html>
              <?php endforeach;?>
            </select>
          </div>


          <div>
            <label><h6>Anatomy</h6></label>
            <?php 
              // lay du lieu tu bang
                  $res = mysqli_query($conn, "SELECT * from anatomy");
                  $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <select name="anatomy">
              
              <?php foreach ($rows as $rows):?>
                  <html>
                      <option value="<?php echo $rows['name']; ?>">
                          <?php echo $rows['name']; ?>
                      </option>
                  </html>
              <?php endforeach;?>
            </select>
          </div>


          <div>
            <label><h6>Benefit</h6></label>
            
            <?php 
              // lay du lieu tu bang
                  $res = mysqli_query($conn, "SELECT * from benefit");
                  $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
            ?>
            <select name="benefit">
              
              <?php foreach ($rows as $rows):
                $selected = ($options == $selection) ? "selected" : "";
              ?>
                
                <option <?php echo $selected ?>value='<?php echo $rows['name'];?>'> 
                  <?php echo $rows['name'];?>
                </option>
              <?php endforeach;?>


            </select>
          </div>
          <br>
          <br>

          
          <button type="submit" class="add" name="submit" >Add</button>

        </div>
      


      </form>
    </div> 



  </section>
  <script src="./js/admin.js"></script>
  <script>
      $('#summernote').summernote({
        placeholder: 'Enter Your Input Here',
        tabsize: 2,
        height: 100
        
      });

      // function postForm() {

      //   $('textarea[name="content"]').html($('#summernote').code());
      // }
    </script>
    <script type="text/javascript">
      
        function updateThumbnail(){
          $('#img_thumbnail').attr('src', $('#thumbnail').val())
        
        }
    </script>
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