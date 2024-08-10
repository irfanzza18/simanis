<?php
    include('security.php');

    include('includes/header.php');
    include('includes/navbar.php');

    
    $username= $_SESSION['username'];
                  
    $query="SELECT * from register where username='$username'";
    $query_run = mysqli_query($connection,$query);
    $bagian = mysqli_fetch_array($query_run);
    
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">Upload File</h5>
        <button type="button" class="btn-success" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

            <div class="modal-body">
                <div class="form-group">
                    <label> Judul </label>
                    <input type="text" name="judul" class="form-control" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter Description" required>
                </div>

                <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="upload_file" class="form-control" placeholder="form-control" required>
                </div>

              <?php
                  if($bagian['position'] != "admin"){
                    ?>
                     <input type="hidden" value="<?php echo $bagian['position'] ?>" name="created_by"/>
                     <input type="hidden" value="Laporan Bulanan" name="laporan_kategori"/>
                    <?php
                  }else{
                    ?>
                     <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Position:</label>
                    <select class="form-control" name="created_by" id="exampleFormControlSelect1" required>
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
                    <label for="exampleFormControlSelect1">Kategori Arsip:</label>
                    <select class="form-control" name="laporan_kategori" id="exampleFormControlSelect1" required>
                    <option value=""></option>  
                    <option value="Laporan Bulanan">Laporan Bulanan</option>
                      <option value="Laporan LKIP">Laporan LKIP</option>
                    </select>
              </div>
                    <?php

                  }
              ?>
                <div class="form-group">
                  <label >Tanggal input:</label>
                  <input type="datetime-local" id="tanggal_input" class="form-control" name="tanggal_input" required>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="save_uploadfile" class="btn btn-primary">Save</button>
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
              Upload File
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
        $query      = "SELECT * FROM upload_file";
        $query_run  = mysqli_query($connection,$query);
    ?>

      <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
          <thead>
          <tr>
            <th> No </th>
            <th> Judul Laporan </th>
            <th> Waktu </th>
            <th> File</th>
            <th> Bagian</th>
            <th> View</th>
            <th> Edit</th>
            <th> Delete</th>
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
            <td> <?php echo $row['judul']?> </td>
            <td> <?php echo $row['tanggal_input']?> </td>
            <td> <a href="upload/<?php echo $row['files']?>"><?php echo $row['files']?></a> 
          </td>
            <td> <?php echo $row['created_by']?> </td>

            <?php
                     if($bagian['position'] == "admin"){
                      $disabled="enabled";
                    }else if($bagian['position'] != $row['created_by']){
                      $disabled="disabled";
                    }else{
                      $disabled="enabled";
                    }
            ?>
            <td>
                <form action="uploadfile_view.php" method="post">
                    <input type="hidden" name="view_id" value="<?php echo $row['id'] ?>">
                    <button  type="submit" name="view_data_btn" class="btn btn-primary"> VIEW</button>
                </form>
            </td>
            <td>
                <form action="uploadfile_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                    <button  type="submit" name="edit_data_btn" class="btn btn-success"<?php echo $disabled ?>> EDIT</button>
                </form>
            </td>

              <td>
                <form action="code.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
                    <button type="submit" name="file_delete_btn" class="btn btn-danger" <?php echo $disabled ?> > DELETE</button>
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
    <!-- Page level custom scripts -->
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