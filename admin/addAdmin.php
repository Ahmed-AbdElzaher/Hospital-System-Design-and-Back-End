<?php 
 include('../shared/head.php') ;
 include('../shared/nav.php');
 include('../general/configDatabase.php');
 include('../general/function.php');
 
 if(isset($_POST['signUp'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $insert = "INSERT into `admin` values (null , '$email', '$password')";
    $i = mysqli_query($conn, $insert);
    testMessage($i , "insert admin"); 
    
 }
 auth();
 if($_SESSION['admin']=='admin@email.com'){

 ?>


<div class="container col-6">
    <h1 class="text-center text-info">Sign up Page</h1>

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
                <button name="signUp" class="btn btn-info btn-block">Sign Up</button>
            </form>
        </div>
    </div>
</div>


<?php  
}else{
    echo '<img class="w-40" src="https://www.expression-web-tutorials.com/images/forbidden.jpg">';
}

include('../shared/script.php');
?>

