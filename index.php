<?php

include 'con.php';




// this is to get the information from the database




if(isset($_POST['searchBtn'])){
    $valueToSearch = $_POST['valueToSearch'];
    $sql = "SELECT * FROM `customer` WHERE CONCAT(`id`, `title`, `first_name`, `last_name`, `contact_no`, `district`) LIKE '%".$valueToSearch."%'";
}else{
    $sql = "SELECT * FROM customer";
}

$results = mysqli_query($con, $sql);

if(isset($_POST['submitbtn'])){
    $title = $_POST['selectTitle'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contact = $_POST['contact'];
    $district = $_POST['district'];


    $sql_registration = "INSERT INTO `customer` (`id`, `title`,`first_name`,`middle_name`,`last_name`, `contact_no`, `district`) VALUES ('', '$title', '$firstName', '', '$lastName', '$contact', '$district');";
    
    $sql_status = mysqli_query($con, $sql_registration);

    echo"
        <script>
            alert('Customer added successfully!');
            window.location.href='customer_view.php';
        </script>";
       
    }

?>

<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>


</head>
    <div class=""> 
        <!-- Navbar comes here -->
        <?php include 'navbar.php'; ?>
    </div>
 
<body style="background-color: #aee4ff;">


<!-- Table -->
<div class="container">
    <div class="row mt-5">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Customer Information</h5>
            <p class="card-text">This page can be used to add new customers and to also view, update and delete added Customers.</p>
            <a href="customer_view.php" class="btn btn-primary">View Page</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Item Information</h5>
            <p class="card-text">This page can be used to add new items and to also view, update and delete added Items.</p>
            <a href="#" class="btn btn-primary">View Page</a>
        </div>
        </div>
    </div>
    </div>

    <div class="row mt-5">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">View Page</a>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">View Page</a>
        </div>
        </div>
    </div>
    </div>
</div>

<script>


</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>

</html>
