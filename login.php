<?php
session_start();
include('includes/header.php'); 
?>

<div class="container ">

<!-- Outer Row -->
<div class="row justify-content-center ">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row bg-gradient-primary">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
              <img src="logo/simanis.png" width="100px" height="100px"  />
              <br><br>
                <h1 class="h4 text-gray-900 mb-4">SI MANIS</h1>
                <h4 class="h6 text-gray-900 mb-4">Sistem Manajemen Arsip Praktis</h4>
              </div>

                <form class="user" action="code.php" method="POST">

                    <div class="form-group">
                    <input type="username" name="username" class="form-control form-control-user" placeholder="Enter username...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-warning btn-user btn-block"> Login </button>
                    <hr>
                </form>
        
                <div class="row">
    <div class="col-sm">
                      <img src="assets/dhi.png" width="100px" height="100px"  />
    </div>
    <div class="col-sm">
                   
    </div>
    <div class="col-sm">
    <img src="assets/tribrata.png" width="100px" height="100px"  />
    </div>
  </div>
             
               
            </div>
            
          </div>
          
        </div>
        
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>