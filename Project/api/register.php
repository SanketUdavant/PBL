<?php
    include("connect.php");
    
    $name = $_POST['name']; 
    $security = $_POST['security'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image= $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];
    
       if($password==$cpassword){
              move_uploaded_file($tmp_name,"../uploads/$image");
              $insert = mysqli_query($connect,"INSERT INTO user (name, security, address, password, photo, role, status, votes) VALUES('$name','$security','$address','$password', '$image','$role',0,0 )");
              if($insert){
                     echo '
                     <script>
                     alert("Registration succesfull!");
                     window.location ="../";
                     </script>
              ';
              }
              else{
                     echo '
                     <script>
                            alert("Some error occured!");
                            window.location ="../Route/registration.html";
                     </script>
              ';
              }
       }
       else{
              echo '
                     <script>
                            alert("Password and Confirm password does not match!");
                            window.location ="../Route/registration.html";
                     </script>
       ';
       }   
?>