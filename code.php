<?php
// session_start();
include('security.php');

$connection = mysqli_connect("localhost","root","","adminpanel");


if(isset($_POST['save_uploadfile'])){
    // die("irfan ganteng");
    $judul = $_POST['judul'];
    $description = $_POST['description'];
    $tanggal_input =  $_POST['tanggal_input'];
    $created_by =  $_POST['created_by'];
    $laporan_kategori =  $_POST['laporan_kategori'];
    $files = $_FILES['upload_file']['name'];
   
    

    $query = "INSERT INTO upload_file(judul,description,files,tanggal_input,created_by,laporan_kategori) VALUES('$judul','$description','$files','$tanggal_input','$created_by','$laporan_kategori')";
    
    $query_run= mysqli_query($connection,$query);
    
    if($query_run){
       
        move_uploaded_file($_FILES["upload_file"]["tmp_name"],"upload/".$_FILES["upload_file"]["name"]);
        $_SESSION['success'] = "File Added";
        header('Location: upload_file.php');
    }
    else{
       
        $_SESSION['success'] = "File Not Added";
        header('Location: upload_file.php');
    }

}



if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $position = $_POST['position'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];


    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,password,position) VALUES ('$username','$password','$position')";
            // echo $query;die;
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}


    if(isset($_POST['edit_btn'])){
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM register WHERE id='$id'";
        $query_run = mysqli_query($connection,$query);
        

    }

    if(isset($_POST['updatebtn'])){
        $id = $_POST['edit_id'];    
        $username = $_POST['edit_username'];
        $position = $_POST['position'];
        $password = $_POST['edit_password'];

        $query = "UPDATE register SET username='$username',position = '$position',password='$password'WHERE id = '$id'";
        $query_run = mysqli_query($connection,$query);

        if($query_run){
            $_SESSION['success'] = "Your Data is Update";
            header('Location: register.php');
        }else{
            $_SESSION['success'] = "Your Data NOT is Updated";
            header('Location: register.php');
        }

    }
    if(isset($_POST['delete_btn'])){
        
            $id = $_POST['delete_id'];
            
            $query = "DELETE FROM register WHERE id='$id'";
            $query_run =mysqli_query($connection,$query);
            // die("masuk delete");
            // header('Location : register.php');
            header('Location: register.php');
           
    }

    if(isset($_POST['login_btn'])){
        
            $username = $_POST['username'];
            $password_login = $_POST['password'];
            
            $query = "SELECT * FROM register WHERE username='$username' AND password='$password_login' LIMIT 1";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_fetch_array($query_run))
                {   
                        $_SESSION['username'] = $username; 
                        if($_SESSION['username']=="admin"){                      
                        header("Location: index.php");
                    }else{
                        header("Location: index.php");
                    }
                } 
            else
                {
                        $_SESSION['status'] = "Username / Password is Invalid";
                        header('Location: login.php');
                }


    }

    if(isset($_POST['logout_btn'])){
        session_destroy();
        unset($_SESSION['username']);
    }

    if(isset($_POST['uploadfile_update_btn'])){

        $edit_id = $_POST['edit_id'];
        $edit_judul = $_POST['edit_judul'];
        $edit_description = $_POST['edit_description'];
        $edit_upload_file = $_FILES['upload_file']['name'];
        // print_r($edit_upload_file);die;
        // die($edit_upload_file);
        $query = "UPDATE upload_file SET judul='$edit_judul',description='$edit_description',files='$edit_upload_file' WHERE id='$edit_id'";
        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            move_uploaded_file($_FILES["upload_file"]["tmp_name"],"upload/".$_FILES["upload_file"]["name"]);
            // $_SESSION['success'] = 'Files Updated';
            header('Location: upload_file.php');
            // header('Location : upload_file.php');
        }else{
            // $_SESSION['status'] = "Files Not Added";
            header('Location: upload_file.php');
            // header('Location: upload_file.php');
        }

    }

    if(isset($_POST['file_delete_btn'])){
        // die("irfan ganteng");
        $id= $_POST['delete_id'];
        // die($id);
        $query = "DELETE FROM upload_file WHERE id='$id'";
        $query_run = mysqli_query($connection,$query);

        // die($query);

        if($query_run)
        {
            // die("irfan ganteng");
            $_SESSION['success']="Files data is Deleted";
            header('Location: upload_file.php');
        }
        else{
            $_SESSION['success']="Files data is Not Deleted";
            header('Location: upload_file.php');
        }

    }

?>
