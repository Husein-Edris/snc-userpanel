<?php
    include('../security.php');
    $connection = mysqli_connect("localhost","root","","snc-database");
    $userid =  $_SESSION['userid'];
    $query = "SELECT  * FROM users WHERE id = $userid";
    $query_run = mysqli_query($connection,$query);
    if(isset($_POST['editbtn']))
    {
        $id= $_POST['edit_id'];
        $fullName= $_POST['editname'];
        $jop= $_POST['editjop'];
        $phone= $_POST['editphone'];
        $email= $_POST['editemail'];
        $salary= $_POST['editsalary'];

        $img_name= $_FILES['image']['name'];
        $img_tmp= $_FILES['image']['tmp_name'];
        $location= "./assets/img/" . $img_name;
        if(move_uploaded_file($img_tmp,$location)){
            $ubdataimage = "UPDATE users SET image =$img_name  WHERE id='$id' ";
            $query_runimage = mysqli_query($connection,$ubdataimage);
        }
        
        
        // $query = "UPDATE `admin` SET username='$username', phone='$phone', email='$email', password='$password' WHERE id='$id' ";
        $queryubdate = "UPDATE users SET username= '$fullName', phone= '$phone', email= '$email' ,jop= '$jop',salary=$salary  WHERE id='$id' ";
        $query_runubdata = mysqli_query($connection,$queryubdate);
        if($query_runubdata){
            header('Location: user-profile.php');
            }
    }
?>