<?php

function testMessage($condition , $mess){
    if($condition){
        echo "<div class='alert alert-info col-6 mx-auto'>
        $mess is True
        </div>";
    }else{
        echo "<div class='alert alert-danger col-6 mx-auto'>
        $mess is False
        </div>";
    }
}

function auth(){
    if($_SESSION['admin']){
    }else{
        header("Location:http://localhost/hospital/admin/login.php");
    }
}



?>