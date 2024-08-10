<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');


?>

<div class="container-fluid">
    <div class="card shadow mb-4">
            <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">FILE VIEW</h6>
            </div>
    </div>

    <div class="card-body">

        <?php
            if(isset($_POST['view_data_btn'])){
                // die("irfan ganteng");
                $id= $_POST['view_id'];
                
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
                    <input type="text" name="edit_judul" value="<?php echo $row['judul']?>" class="form-control" placeholder="Enter Username" disabled>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="edit_description" value="<?php echo $row['description']?>" class="form-control" placeholder="Enter Description" disabled>
                </div>

                <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="upload_file" class="form-control"  required>
                </div>

                <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="edit_description" value="<?php echo $row['created_by'];?>" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label>Kategori Arsip:</label>
                    <input type="text" name="edit_description" value="<?php echo $row['laporan_kategori'];?>" class="form-control" disabled>
                </div>
                    
                <div class="form-group">
                    <label>Tanggal Input:</label>
                    <input type="text" name="edit_description" value="<?php echo $row['tanggal_input'];?>" class="form-control" placeholder="Enter Description" disabled>
                </div>

                    <a href="upload_file.php" class="btn btn-success"> < BACK</a>
                  

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