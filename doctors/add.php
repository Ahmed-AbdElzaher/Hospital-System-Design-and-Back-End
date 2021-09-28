<?php 
 include('../shared/head.php') ;
 include('../shared/nav.php');
//  أمر الكونكت موجود هنا:
 include('../general/configDatabase.php');
 include('../general/function.php');

 if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $fieldID = $_POST['fieldID'];

    $insert = "INSERT into `doctors` values(NULL , '$name', '$email' , '$fieldID')";
    $i = mysqli_query($conn,$insert);
    testMessage($i, "Insert");
 }

 $select = "SELECT * FROM `fields`";
 $s = mysqli_query($conn , $select);
$name ="";
$email ="";
$update =false;

 if(isset($_GET['edit'])){
  $update =true;
  $id = $_GET['edit'];
  $select = "SELECT * from `doctors` where id = $id";
  $ss = mysqli_query($conn,$select);
  $row = mysqli_fetch_assoc($ss);
  $name = $row['name'];
  $email = $row['email'];
  

 }

 if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $fieldID = $_POST['fieldID'];


    $update = "UPDATE `doctors` set name = '$name' , email = '$email' , fieldID ='$fieldID' WHERE id = $id";
    $u = mysqli_query($conn,$update);
    header("Location:http://localhost/hospital/doctors/list.php");
    // testMessage($u, "update");
 }
auth();
?>


<div class="container col-6">
    <?php if($update):?>
    <h1 class="text-center text-info">Update Doctor</h1>
    <?php else :?>
    <h1 class="text-center text-info">Add Doctor</h1>
    <?php endif;?>
    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label>Doctor Name</label>
                    <input type="text" value="<?php echo $name ?>"name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Doctor Email</label>
                    <input type="text" value="<?php echo $email ?>" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Doctor fieldID</label>
                    <select name="fieldID" class="form-control">
                    <?php foreach($s as $data){?>
                    <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?> </option>
                    <?php } ?>
                    </select>
                </div>
                
                <?php if($update):?>
                <button name="update" class="btn btn-primary">Update Data</button>
                <?php else :?>
                <button name="send" class="btn btn-info">Send Data</button>
                <?php endif;?> 
            </form>

        </div>
    </div>
</div>


<?php include('../shared/script.php') ?>
