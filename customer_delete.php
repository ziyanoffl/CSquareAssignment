<?php

include 'con.php';

$Id = $_GET['id'];

$sql = "DELETE FROM customer WHERE id = $Id";

$status = mysqli_query($con,$sql);


if($status){
    echo "Customer has been deleted!";
    header('Location: customer_view.php');
}else{
    echo "Error!";
}