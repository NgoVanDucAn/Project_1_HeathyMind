<?php
require_once('utilss.php');

error_reporting(E_ALL);
ini_set('display_error',1);
mysqli_report(MYSQLI_REPORT_ERROR);



include('connet.php');



    session_start();
    $_SESSION['login']= '';
    $fail = '';
    $error = '';
    
    if ($_POST){
      // check thong tin user
      $user = $_POST['user_name'];
      $pass_word = md5($_POST['pass_word']);
      $sql = "SELECT * FROM admin WHERE pass_word = ?  and user_name = ?";
      // $res = mysqli_query($conn, "SELECT * FROM users WHERE pass_word = '$pass_word' and user_name = '$user'");
      // echo "SELECT * FROM users WHERE pass_word = '$pass_word' and user_name = '$user'";
      
      
      if (sqlGetAll($sql, 'ss', $pass_word, $user)){
          $_SESSION['login'] = 'done';
          $_SESSION['user'] = $user;
          redirect("./adminserver.php");
        }else{
            //
            $error = 'Login fail!';
        }
    
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
    <style>
  .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
    }

    @media (min-width: 1025px) {
        .h-custom-2 {
        height: 100%;
        }
    }

</style>
<?php if ($error) {
    echo '<script>alert("login false")</script>';
} ?>
</head>
  <body>

<section class="vh-100" id="myForm" >
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
        <br>
        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <img src="./img/cropped-Healthy-Mind-Logo-4.png" alt="" srcset="" width="300" height="50">
          
        </div>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" method = "POST" action="#">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name="user_name"/>
              <label class="form-label" for="form2Example18">Admin name</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name ="pass_word"/>
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="submit">Login</button>
            </div>
            <br>
            <br>
            <div>
              <H5>Create by TheBigCorn (～￣▽￣)~</H5>
            </div>
            </form>
            <p><?php echo $fail;?></p>
        </div>
      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="./img/Download-Computer-PC-Best-Full-HD-Pictures.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
  
  
    
  
  
  
  
  
  </body>
</html>