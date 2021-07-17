<?php 
include "admin/includes/init.php";
$msg = "";
if(isset($_POST['create'])){


$name = $_POST["name"];
$money = $_POST["money"];

if(!is_numeric($money)){
    die("Enter Number");
}


$info = new Info();

if($info->check_name($name) > 0){
  $msg = ' <div class="bg-gradient-danger p-2 m-2 text-center text-lg text-light">عذراً أسمك مسجل مسبقاً</div><br>';
}else{
  
$info->name = $name;
$info->money = $money;

$info->save();
$msg = ' <div class="bg-gradient-success p-2 m-2 text-center text-lg text-light">شكرا لك لقد تم الارسال بنجاح</div><br>';
}
}


?>

<?php 
$states = new Db_object();


if($states->states() == 1){

?>
<!DOCTYPE html>
<html lang="en">
  

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>الصفحة الرئيسية</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/process.js"></script>
  
  <!-- Custom styles for this template-->
  <link href="css/mystyle.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body style="background: #f6f7fa;" id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <!-- Topbar -->

      <!-- End of Topbar -->


       <!-- Begin Page Content -->
      
       <!-- Content Row -->
       <div class="container-fluid">

       <div class="row">
       <div class="col-lg-12">

       <br>
       <br>
       
       
                     <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-center Font-tajawal ">المشاركة في المساعدة</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div   class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                 <?php echo $msg ?>
                  <form action="" method="post" class="text-right">

                <label for="title" class="pull-right">الاسم الثلاثي</label>
                <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-user" required="">
                    </div>

                    <label for="title" class="pull-right">المبلغ</label>
                <div class="form-group">
                      <input type="number" name="money" class="form-control form-control-user" required="">
                    </div>


                    <input type="submit" name="create" value="ارسال" class="btn btn-primary  btn-block">

                </form>

              
                 </div>
                </div>



       </div>

        <!-- /.container-fluid -->


      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
            <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    <!-- Logout Modal-->   <!-- Scroll to Top Button-->


  

  <!-- /Logout Modal-->   <!-- /Scroll to Top Button-->

  <!-- Secript Write here -->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script> <!--/ Secript Write here -->
</body>

</html>
<?php }else{ ?>

  <!DOCTYPE html>
<html lang="en">
  

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>الصفحة الرئيسية</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/process.js"></script>
  
  <!-- Custom styles for this template-->
  <link href="css/mystyle.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head><body id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <!-- Topbar -->

      <!-- End of Topbar -->


       <!-- Begin Page Content -->
      
       <!-- Content Row -->
       <div class="container-fluid">

       <div class="row">
       <div class="col-lg-12">

       <br>
       <br>
       
       
                     <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary text-center Font-tajawal ">المساعدة في المشاركة</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div   class="collapse show" id="collapseCardExample">
                  <div class="card-body">

                  <div class="text-center h3"> نعتذر تم أيقاف التسجيل </div>

              
                 </div>
                </div>



       </div>

        <!-- /.container-fluid -->


      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
            <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    <!-- Logout Modal-->   <!-- Scroll to Top Button-->


  

  <!-- /Logout Modal-->   <!-- /Scroll to Top Button-->

  <!-- Secript Write here -->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script> <!--/ Secript Write here -->
</body>

</html>

<?php } ?>
