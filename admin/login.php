<?php include("includes/init.php"); ?>
<?php 

//$user = new User(); 
if($session->is_signed_in()) {

    redirect("index.php");

}
$the_message = "";
if(isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user_found = User::verify_user($username, $password);
    if($user_found) {

        $session->login($user_found);
        $_SESSION["name"] = $username;

        redirect("index.php");

    } else {

       $the_message = '<div class="bg-gradient-danger m-2 text-center text-lg text-light">أسم المستخدم و كلمة المرور غير صحيحة</div>';


    
  }

} else {
    $the_message = "";
    $username = "";
    $password = "";



}


?>
<!DOCTYPE html>
<html lang="ar">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>تسجيل الدحول</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/mystyle.css" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-4 Font-tajawal font-weight-bold ">أهلاَ بعودتك</h1>
                    <?php echo $the_message ?>
                  </div>
                  <form action="" class="user" method="POST" >
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="أسم المستخدم">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="كلمة المرور">
                    </div>
                    <input type="submit" name="submit" value="دخول" class="btn btn-primary btn-user font-weight-bold Font-tajawal btn-block">
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
