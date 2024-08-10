<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');


?>

<div class="container-fluid">
    <div class="card shadow mb-4">
            <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">FILE EDIT</h6>
            </div>
    </div>

    <div class="card-body">

        <?php
            if(isset($_POST['edit_data_btn'])){
                // die("irfan ganteng");
                $id= $_POST['edit_id'];
                
                $query = "SELECT * FROM upload_file WHERE id='$id'";
                $query_run = mysqli_query($connection,$query);
                // print_r($query_run) ;die;
                foreach($query_run as $row)
                {
                    ?>
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>"> 

                <div class="form-group">
                    <label> Judul </label>
                    <input type="text" name="edit_judul" value="<?php echo $row['judul']?>" class="form-control" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="edit_description" value="<?php echo $row['description']?>" class="form-control" placeholder="Enter Description" required>
                </div>

                <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="upload_file" class="form-control" placeholder="form-control"  required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pilih Position:</label>
                    <select class="form-control" name="created_by" id="exampleFormControlSelect1" required>
                    <option value="<?php echo $row['created_by'];?>"><?php echo $row['created_by'];?></option>
                    <option value="">----</option>
                    <option value="kominter">kominter</option>
                      <option value="jatinter">jatinter</option>
                      <option value="konvinter">konvinter</option>
                      <option value="damkeman">damkeman</option>
                      <option value="bangtas">bangtas</option>
                      <option value="renmin">renmin</option>
                      <option value="protokol">protokol</option>
                    </select>
              </div>
                    
              <div class="form-group">
                    <label for="exampleFormControlSelect1">Kategori Arsip:</label>
                    <select class="form-control" name="laporan_kategori" id="exampleFormControlSelect1" required>
                    <option value="<?php echo $row['laporan_kategori']?>"><?php echo $row['laporan_kategori'];?></option>  
                    <option value="">----</option>
                    <option value="Laporan Bulanan">Laporan Bulanan</option>
                      <option value="Laporan LKIP">Laporan LKIP</option>
                    </select>
              </div>

              <div class="form-group">
                  <label >Tanggal input:</label>
                  <input type="datetime-local" id="tanggal_input" class="form-control" name="tanggal_input" required>
                </div>

                    <a href="upload_file.php" class="btn btn-danger"> CANCEL</a>
                    <button type="submit" name="uploadfile_update_btn" class="btn btn-primary">Update</button>

            </form>
                    <?php

                }

            }
        ?>

            
    </div>

</div>

<?php
    include('includes/scripts.php');
    include('includes/footer.php');
?>