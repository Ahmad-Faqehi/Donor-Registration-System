<?php include "includes/init5.php"; ?>
<?php 

if(!$session->is_signed_in()){redirect("login.php"); die();}
if(isset($_GET["do"])){
 $delete = Info::find_by_id($_GET["id"]);
 $delete->delete();
 redirect("index.php");
}
if(isset($_GET["id"])){

$infos = Info::find_by_id($_GET["id"]);

}else{

    redirect("index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
  

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>حذف المستخدم</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/process.js"></script>
  
  <!-- Custom styles for this template-->
  <link href="../css/mystyle.css" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head><body id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <!-- Sidebar -->

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
                     <!-- Collapsable Card Example -->
                <div class="card shadow mb-4 text-center">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-info Font-tajawal "> حذف البيانات </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div   class="collapse show" id="collapseCardExample">
                  <div class="card-body">

                  <div class="h3 Font-tajawal" >

                  هل تريد حقاً حذف المشارك <b><?php echo $infos->name ?></b> ؟

                  <br> <br>
                  <a href="delete.php?do=<?php echo $_GET["id"]; ?>&id=<?php echo $_GET["id"]; ?>" class="btn btn-info">نعم</a>
                  <a href="index.php" class="btn btn-danger">لا</a>

                  </div>
                  
                  </div>
                </div>
              </div>

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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./js/sb-admin-2.min.js"></script> <!--/ Secript Write here -->
</body>

</html>
