<?php 
 include('../shared/head.php') ;
 include('../shared/nav.php');
 include('../general/configDatabase.php');
 include('../general/function.php');
 
 if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `admin` where email = '$email' and password = '$password'";
    $s = mysqli_query($conn, $select);
    $numRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    if($numRows > 0){
        echo "True Admin";
        $_SESSION['admin'] = $email;
        header("Location:http://localhost/hospital/index.php");

    }else{
        echo "False Admin";
    }

}
// أمر البرنت سيشن دا عشان يوريك حالة السيشن في المتصفح
//  print_r($_SESSION); 
 ?>


<div class="container col-6">
    <h1 class="text-center text-info">Login Page</h1>

    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">User Email</label>
                    <input type="text" name="email" class="form-control" placeholder=""> 
                </div>
                <div class="form-group">
                    <label for="">User Password</label>
                    <input type="text" name="password" class="form-control" placeholder=""> 
                </div>
                <button name="login" class="btn btn-info btn-block">Login</button>
            </form>
        </div>
    </div>
</div>



<?php include('../shared/script.php'); ?>

