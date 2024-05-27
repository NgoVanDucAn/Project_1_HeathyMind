
<!-- add video -->
<?php $r = mysqli_query($conn, "SELECT * FROM poses WHERE poses_id = 33");
                        while ($row = mysqli_fetch_array($r)) {
                        // echo "<br>"."-".$row['information'];
                        echo '<source src="../'.$row['video_file'].'" type="video/mp4">';
                    }
?>
<!-- add image -->
<?php $r = mysqli_query($conn, "SELECT * FROM poses WHERE poses_id = 1");
                        while ($row = mysqli_fetch_array($r)) {
                        // echo "<br>"."-".$row['information'];
                        echo '<img src="..'.'/image/'.$row['image_file'].'">';
                    }
?>
<!-- add information -->
<?php $r = mysqli_query($conn, "SELECT * FROM poses WHERE poses_id = 1");
                        while ($row = mysqli_fetch_array($r)) {
                        // echo "<br>"."-".$row['information'];
                        echo $row['information'];
                    }
?>