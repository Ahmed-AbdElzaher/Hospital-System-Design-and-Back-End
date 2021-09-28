<?php include('../shared/head.php') ;
 include('../shared/nav.php');
 include('../general/configDatabase.php');
 include('../general/function.php');

 $select = "SELECT patients.id , patients.name patient ,patients.email email, doctors.name doctor FROM `patients` JOIN doctors ON patients.doctorID = doctors.id;";
 $s = mysqli_query($conn , $select);

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete= "DELETE FROM `patients` WHERE id=$id";
    $d = mysqli_query($conn , $delete);
    // testMessage($d , "Deleted");
    header("Location:http://localhost/hospital/patient/list.php");
}
auth();
?>


<div class="container col-md-8 col-12">
    <h1 class="text-info text-center">Patients List</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DoctorID</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php foreach($s as $data){?>
                <tr>
                    <th><?php echo $data['id'] ?></th>
                    <td><?php echo $data['patient'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['doctor'] ?></td>
                    <td><a href="list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a></td>

                <?php }?>
                </tr>
            </table>
        </div>
    </div>
</div>


<?php include('../shared/script.php') ?>
