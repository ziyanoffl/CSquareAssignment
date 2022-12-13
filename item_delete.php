<?php

include 'con.php';

$Id = $_GET['id'];

$sql = "DELETE FROM item WHERE id = $Id";

$status = mysqli_query($con,$sql);


if($status){
    echo "Item has been deleted!";
    header('Location: item_view.php');
}else{
    echo "Error!";
}