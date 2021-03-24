<?php include "includes/init3.php"; ?>
<?php 

if(!$session->is_signed_in()){redirect("login.php"); die("fuck you");}
$infos = Info::find_all();
$detales = new Info();
?>

<!DOCTYPE html>
<html lang="en">
  

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>صفحة التحكم</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/process.js"></script>
  
  <!-- Custom styles for this template-->
  <link href="../css/mystyle.css" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body style="background: #f6f7fa;" id="page-top" class="sidebar-toggled">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand Font-tajawal text-muted" href="#">القائمة</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link Font-tajawal " href="index.php"> الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link Font-tajawal" href="old.php"> التبرعات الاولى  </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link Font-tajawal" href="old2.php"> التبرعات الثانية   </a>
      </li>
        <li class="nav-item active">
        <a class="nav-link Font-tajawal" href="old3.php"> التبرعات الثالثة  </a>
      </li>
        <li class="nav-item active">
        <a class="nav-link Font-tajawal" href="old4.php"> التبرعات الرابعة  </a>
      </li>
      
    </ul>
  </div>
</nav>
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

<br>
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-md font-weight-bold text-primary Font-tajawal text-uppercase mb-1"> أجمالي عدد المشاركين </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $detales->total_numbers(); ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>

    <br>

   <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-md font-weight-bold text-primary Font-tajawal text-uppercase mb-1"> أجمالي المبلغ </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $detales->total_money_not() ; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>

    
    <br>

    <div class="card border-left-success  shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-md font-weight-bold text-success  Font-tajawal text-uppercase mb-1"> أجمالي المبلغ المدفوع </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if($detales->total_money()){ echo $detales->total_money() ;}else{ echo 0 ;} ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    
    

       <div class="row">
       <div class="col-lg-12">

       <br>
                     <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary Font-tajawal ">بيانات المشاركين</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div   class="collapse show" id="collapseCardExample">
                  <div class="card-body">

              <div class="table-responsive">
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    
                    <tr>
                      <th>#</th>
                      <th>الاسم</th>
                      <th>المبلغ</th>
                    </tr>
                   
                  </thead>

                  <tbody>
                      <?php
                      $i = 1;
                       foreach($infos as $info) : ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td class="font-weight-bold Font-tajawal text-dark" ><?php echo $info->name; ?></td>
                      <td><?php echo $info->money; ?></td>
                      <th><?php $info->check_roal(); ?></th>
                      <th><a href="edit.php?id=<?php echo $info->id; ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a></th>
                      <th><a href="delete.php?id=<?php echo $info->id; ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></th>
                    </tr>   
                    <?php
                    $i++;
                   endforeach; ?>   
                </tbody>

                </table>
              </div>


                  </div>
                </div>
              </div>
              
              
                            <div class="text-center m-2" dir="rtl">
              <textarea name="" cols="50" rows="10" class="form-control" id="myInput" ><?php $i = 1; foreach($infos as $info) :  echo $i . " - ". $info->name . " " . $info->money ." ريال"; if($info->pay == 1){echo "  ✅";}else{echo "";} echo "\n"; ?><?php $i++; endforeach; ?></textarea>
              <br>
              <button class="btn btn-info" onclick="myFunction()" > نسخ </button>
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
  <script>

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("تم النسخ بنجاح");
}

  </script>
</body>

</html>
