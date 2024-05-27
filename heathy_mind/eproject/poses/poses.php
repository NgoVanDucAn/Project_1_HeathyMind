

<?php 
    require_once('utilss.php');
    include('connet.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/page.css">
    <script src="https://kit.fontawesome.com/aaa6273165.js" crossorigin="anonymous"></script>
    
    <link rel="shortcut icon" href="../image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
    <title>STAIR CLIMBING</title>
</head>
<body>
<!-- <script type="text/javascript" src="../js/ja.js"></script> -->
<section class="top">
        <div class="container">
            <div class="row justify-content">
                <div class="logo">                   
                    <a href="../index.php"><img src="../image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png"></a>
                </div>
                
                <div class="search">
                    <form method="get" action="http://www.google.com/search">
                    <input type="text" name="query" class="search-txt" placeholder="Search">
                    <input type="hidden" name="sitesearch" value="healthymind.vn">
                    <button type="submit" value="" class="icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>

                    
                    </form>
                </div>
                <div class="menu-bar">
                    <span></span>
                </div>
                <div class="menu-items">
                <nav>
                    <ul>
                        <li class="menu-item"><a href="index.php"><h3>Home</h3></a></li>
                            
                            <li class="menu-item"><a href="../Poses.php"><h3>All Poses</h3></a></li>
                            
                        
                            <ul>
                                <li><a href="2.General.php"><h3>Poses.General</h3></a>
                              
                                    <!-- menu con sổ xuống cấp 1 -->
                                    <ul>
                                        <li>
                                            <a href="2.General.php#benefit">Poses by benefit</a>
                                            <!-- menu con sổ ngang cấp 2 -->
                                            <ul>
                                                <li><a href="3.weigth_loss.php">Weight loss</a></li>
                                                <li><a href="3.reduce_stress.php">Reduce stress</a></li>
                                                <li><a href="3.health_promotion.php">Health promotion</a></li>
                                            </ul>
                                        </li>
                    
                                        <li>
                                          <a href="2.General.php#type">Poses by type</a>
                                          <!-- menu con sổ ngang cấp 2 -->
                                          <ul>
                                              <li><a href="4.indoor.php">Indoor</a></li>
                                              <li><a href="4.outdoor.php">Outdoor</a></li>
                                          </ul>
                                      </li>
                    
                                      <li>
                                        <a href="2.General.php#anatomy">Poses by anatomy</a>
                                        <!-- menu con sổ ngang cấp 2 -->
                                        <ul>
                                            <li><a href="5.Cardiovascular.System.php"><h5>Cardiovascular.System</h5></a></li>
                                            <li><a href="5.Musculoskeletal.System.php"><h5>Musculoskeletal.System</h5></a></li>
                                            <li><a href="5.Nervous.System.php"><h5>Nervous.System</h5></a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </li>
                            </ul>
                        <li class="menu-item"><a href="../../../admin/adminserver.php"><h3>Admin</h3></a></li>

                        <li class="menu-item"><a href="index.php#aboutus"><h3>About us</h3></a></li>
                        
                    </ul>
                        
                </nav>
                        <li class="logo" style="margin-left: 25px; margin-top: 50px;">
                            <img src="../image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
                        </li> 
                        <li style="list-style: none;">Healthy Mind</li>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container2">
        <div class="layout">
            <div class="layout-item">
                
            <?php 
                //neu edit lay du lieu tu db
                    $poses_id = intval($_GET['poses_id'] ?? 0);
                    $row = [];
                    if ($poses_id) {
                    $sql = "SELECT * FROM `poses` WHERE `poses_id` = ?";
                    $result = sqlExecute($sql, 'd', $poses_id);
                    $rows = sqlGetAll($sql, 'd', $poses_id);
                    $row = $rows[0];
                }
                //do du lieu vao form
            ?>

                <h1>
                    <?php echo ($row['poses_name'] ?? '')?>
                </h1>
                <br>
                <br>
                
                <hr width="100%">
                <div>
                    <?php echo ($row['information'] ?? '')?>
                </div>
                <div>

                <?php 
                $video = $row['video_file'];
                if ($video != '') {
                   
                ?>
                <h1>Video Example</h1>
                <video width="600" height="400" controls>
                    <source src="<?php echo "../video/".($row['video_file'] ?? '')?>" type="video/mp4">
                    <source src="<?php echo "../video/".($row['video_file'] ?? '')?>" type="video/ogg">

                    Your browser does not support the video tag.
                </video>
                <?php }?>

                </div>

                
                

            </div>
            <div></div>
            <div class="layout-item">

                <h2 class="special">Recommend</h2>
                <?php $r = mysqli_query($conn, "SELECT * FROM `poses` WHERE general = general ORDER BY RAND()");
                        $i = -1;
                        while ($row = mysqli_fetch_array($r)):
                            $i++;
                ?>          
                            
                        
                    <?php if($i== 3){
                        break;
                    }

                    ?> 
                    
                    <a class="btn btn-outline-info" href="poses.php?poses_id=<?php echo $row['poses_id'] ?>">
                    <img src="<?php echo $row['thumbnail']?>" alt="">
                    </a>
                    <p><h3><?php echo $row['poses_name']?></h3></p> 
                    <hr width="100%">
                    <br>
                    <br>
                    

                <?php endwhile;?> 
            </div>

            
        </div>
    </div>

   
</form>


<footer>
         <!--Bắt Đầu Nội Dung Giới Thiệu-->
        <a href=""><img src="../image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png"></a>
        <div class="noi-dung-about">
            <h2><ins>About us</ins></h2>
            <h3>🫀Healthy Mind</h3>
            <p><ins>Create by 2ATM Team</ins></p>
            <p><ins>Html/Css:</ins> Le Duy An</p>
            <p><ins>Php/Database:</ins> Ngo Van Duc An (Leader)</p>
            <p><ins>Admin:</ins> Ta Van Mui</p>
            <p><ins>Information:</ins> Le Kim Tung</p>
            
        </div>
         <!--Kết Thúc Nội Dung Giới Thiệu-->

         <!--Bắt Đầu Nội Dung Đường Dẫn-->
         <div class="noi-dung-links">
            <h2><ins>Link</ins></h2>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../2.General.php">General</a></li>
                <li><a href="../index.php#aboutus">About us</a></li>
            </ul> 
         </div>
         
         <!--Kết Thúc Nội Dung Đường Dẫn-->
         
         
    
    </footer>
    
    
   
    
    <script src="../js/script.js"></script>

    






</body>
</html>