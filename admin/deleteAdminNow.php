<?php

if(isset($_GET['id']))
{
    $id=$_GET['id'];

    require 'connect_db.php';

    $query="DELETE FROM adminLogin WHERE id='$id'";

    if($connect->query($query))
    {
        echo '<script>alert("Deleted Successfully");</script>';
        echo '<script>window.location="deleteAdmin.php";</script>';
    }
    else
    {
        echo '<script>alert("Error while Deleting !");</script>';
    }
}

?>