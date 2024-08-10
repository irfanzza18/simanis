<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Choose a Position:</label>
              <select class="form-control" name="position" id="exampleFormControlSelect1">
              <option value=""></option>  
              <option value="Kominter">Kominter</option>
                <option value="Jatinter">Jatinter</option>
                <option value="Konvinter">Konvinter</option>
                <option value="Lotas">Lotas</option>
                <option value="Damkeman">Damkeman</option>
                <option value="Bangtas">Bangtas</option>
                <option value="Renmin">Renmin</option>
                <option value="Protokol">Protokol</option>
              </select>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-success">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addadminprofile">
              Add User
            </button>
    </h6>
  </div>

  <div class="card-body">
    <?php
      if(isset($_SESSION['success'])&& $_SESSION['success'] !='')
      {
        echo '<h2 class="bg-primary"> '.$_SESSION['success'].'</h2>';
        unset($_SESSION['success']);
      }

      if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
          echo '<h2 class="bg-danger">'.$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
      }


    ?>
    <div class="table-responsive">

    <?php
        $connection = mysqli_connect("localhost","root","","adminpanel");
        $query      = "SELECT * FROM register";
        $query_run  = mysqli_query($connection,$query);
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th> No </th>
            <th> Username </th>
            <th> Position </th>
            <th> EDIT </th>
            <th> DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php
          if(mysqli_num_rows($query_run) > 0)
          {
            $no=1;
            while($row = mysqli_fetch_assoc($query_run))
            {
                ?>
                <tr>
            <td> <?php echo $no?> </td>
            <td> <?php echo $row['username']?> </td>
            <td> <?php echo $row['position']?> </td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>

              <td>
                <form action="code.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
              </td>

          </tr>
                <?php    
                $no++; 
            }
          }
          else{
            // echo "No Record Found";
          }
        ?>
          
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" /> -->
  
<script src="js/demo/datatables-demo.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap4.min.js"></script>
   
    <script>
      new DataTable('#dataTable');
      
    </script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>