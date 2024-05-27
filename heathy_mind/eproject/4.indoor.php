<?php 
    require_once('poses/utilss.php');
    include('poses/connet.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/general3.css">
    <link rel="shortcut icon" href="image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
    <script src="https://kit.fontawesome.com/aaa6273165.js" crossorigin="anonymous"></script>
    <title>Healthy Mind</title>
</head>
<body>
<section class="top">
        <div class="container">
            <div class="row justify-content">
                <div class="logo">                   
                    <a href="index.php"><img src="image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png"></a>
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
                        
                        <li class="menu-item"><a href="Poses.php"><h3>All Poses</h3></a></li>
                        
                        
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
                        <li class="menu-item"><a href="../../admin/adminserver.php"><h3>Admin</h3></a></li>

                        <li class="menu-item"><a href="index.php#aboutus"><h3>About us</h3></a></li>
                        
                    </ul>
                        
                </nav>
                        <li class="logo" style="margin-left: 25px; margin-top: 50px;">
                            <img src="image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png">
                        </li> 
                        <li style="list-style: none;">Healthy Mind</li>
                </div>
            </div>
        </div>
    </section>
    
    <div class="layout">
        <h1 style="margin-top: 100px;" class="title">Poses by Type</h1>
        <br>
        
        <br>
        <div class="content">
            <div>
            <div>   
                <a><h2 class="index">Indoor</h2></a>
            </div>
            <hr>
            <div class="layout-item" style="text-align:center">
            <?php
              //lay du lieu trong bang poses
              $per_page_record = 9;  // Number of entries to show in a page.   
              // Look for a GET variable page if not found default is 1.        
              if (isset($_GET["page"])) {    
                  $page  = $_GET["page"];    
              }    
              else {    
                $page=1;    
              }    
              
              $start_from = ($page-1) * $per_page_record;     
              $sql = "SELECT * FROM `poses` WHERE `type` = ? LIMIT $start_from, $per_page_record";     
              $rows = sqlGetAll($sql,'s', 'Indoor');
              $count =1;
                foreach ($rows as $row):
                    if($count%8 != 0){
                    if($count%4 == 0 || $count == 7){ echo "<div class='layout-item' style='text-align:center'>";}
                }?>
        
            <a class="btn btn-outline-info" href="./poses/poses.php?poses_id=<?php echo $row['poses_id'] ?>">
                <div class="div1">
                    <img src="<?php echo $row['thumbnail']?>" alt="">
                    <p><b><?php echo $row['poses_name'] ?></b></p>
                        
                    <!-- <br> -->
                </div> 
            </a> 
         
        <?php if($count%3 == 0){ echo "</div>";}
        $count++;
        endforeach;?>
           
        </div>
        <div class="pagination" id="nav">    
            <?php  

                
                     
                $query = "SELECT COUNT(*) FROM `poses` WHERE `type` = 'Indoor'";     
                $rs_result = mysqli_query($conn, $query);     
                $row = mysqli_fetch_row($rs_result);     
                $total_records = $row[0];     
                       
                    
                echo "</br>";     
                  // Number of pages required.   
                $total_pages = ceil($total_records / $per_page_record);     
                $pagLink = "";       
                
                if($page>=2){   
                      echo "<a href='4.indoor.php?page=".($page-1)."'>  Prev </a>";   
                }       
                            
                for ($i=1; $i<=$total_pages; $i++) {   
                  if ($i == $page) {   
                        $pagLink .= "<a class = 'active' href='4.indoor.php?page="  
                                                          .$i."'>".$i." </a>";   
                  }               
                  else  {   
                      $pagLink .= "<a href='4.indoor.php?page=".$i."'>   
                                                          ".$i." </a>";     
                  }   
                };     
                echo $pagLink;   
            
                if($page<$total_pages){   
                  echo "<a href='4.indoor.php?page=".($page+1)."'>  Next </a>";   
                }   
            
            ?>    
      </div>  
            <br>
      <hr width="100%">  
      <div class="inline" >   
        <p style="color:azure;"><?php echo $page."/".$total_pages; ?></p>

        
        </div>   
                            
              
                

                

            
    </div>
</div>

   
</form>
<footer>
         <!--Bắt Đầu Nội Dung Giới Thiệu-->
        <a href=""><img src="image/external-aerobic-fitness-at-home-flaticons-flat-flat-icons.png"></a>
        <div class="noi-dung-about">
            <h2><ins>About us</ins></h2>
            <h3>🫀Healthy Mind</h3>
            <p><ins>Create by 2ATM Team</ins></p>
            <p><ins>Html/Css:</ins> Le Duy An</p>
            <p><ins>Php/Database:</ins> Ngo Van Duc An (Leader)</p>
            <p><ins>Admin:</ins> Ta Van Mui</p>
            <p><ins>Information:</ins> Le Van Tung</p>
            
        </div>
         <!--Kết Thúc Nội Dung Giới Thiệu-->

         <!--Bắt Đầu Nội Dung Đường Dẫn-->
         <div class="noi-dung-links">
            <h2><ins>Link</ins></h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="2.General.php">General</a></li>
                <li><a href="index.php#aboutus">About us</a></li>
            </ul> 
         </div>
         
         <!--Kết Thúc Nội Dung Đường Dẫn-->
         
         
    
    </footer>
    <script src="./js/script.js"></script>
</body>
</html>