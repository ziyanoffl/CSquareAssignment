<?php

include 'con.php';

//To get the ID passed from the previous page
$Id = $_GET['id'];

$sql = "DELETE FROM customer WHERE id = $Id";

$status = mysqli_query($con,$sql);

//This wil display a notification and relocate to customer view page
if($status){
    echo "Customer has been deleted!";
    header('Location: customer_view.php');
}else{
    echo "Error!";
}