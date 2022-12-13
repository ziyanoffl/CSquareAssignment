<?php

include 'con.php';

$Id = $_GET['id'];

// this is to get the information from the database
$sql = "SELECT * FROM customer WHERE  id = '$Id'";

$results = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($results)) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $contact_no = $row['contact_no'];
    $cust_district = $row['district'];
}

if(isset($_POST['submitbtn'])){
    $title = $_POST['selectTitle'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $contact = $_POST['contact'];
    $district = $_POST['district'];


    $sql_registration = "UPDATE `customer` SET `title` = '$title', `first_name` = '$firstName', `last_name` = '$lastName', `contact_no` = '$contact', `district` = '$district' WHERE `customer`.`id` = $Id;";
    
    $sql_status = mysqli_query($con, $sql_registration);

    echo"
        <script>
            alert('Customer updated successfully!');
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
    <title>Update Customer</title>


</head>
    <div class=""> 
        <!-- Navbar comes here -->
        <?php include 'navbar.php'; ?>
    </div>
 
<body style="background-color: #aee4ff;">
<div class="container">
    <h2 class="text-center">Update Customer Information</h2>
    <form class="row needs-validation" method="POST">
        <div class="row ">
            
                <div class="form-group  col-md-6">
                    <label class="form-label">Select Title</label><br>
                    <select name="selectTitle" class="form-select" name="title">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Dr">Dr</option>
                    </select>
                </div>

                <div class="form-group  col-md-6">
                    <label class="form-label ">First name</label>
                    <input type="text" class="form-control" name="firstName" value="<?php echo $first_name ?>"   required>
                    <div class="invalid-feedback">
                        Please enter a valid First Name
                    </div>
                </div>
        </div>

        <div class="row">
                
                <div class="form-group  col-md-6">
                    <label class="col-form-label">Last Name</label>
                    <input type="text" class="form-control" id="" name="lastName" value="<?php echo $last_name ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid Last Name
                    </div>
                </div> 

                <div class="form-group  col-md-6">
                    <label class="col-form-label">Contact No.</label>
                    <input type="number" class="form-control" id="" name="contact" value="<?php echo $contact_no ?>" required>
                    <div class="invalid-feedback">
                        Please enter valid Contact No
                    </div>
                </div>
        </div>

        <div class="row">
                
                <div class="form-group  col-md-6">
                    <label class="col-form-label">District</label>
                    <input type="number" class="form-control" id="" name="district" value="<?php echo $cust_district ?>" required>
                    <div class="invalid-feedback">
                        Please enter valid District No
                    </div>
                </div> 

                <div class="col-12">
                    <button class="btn btn-primary btn-xl mt-4" type="submit" name="submitbtn">UPDATE</button>
                </div>
        </div>
        

        <!-- Submit Button-->

                
           
            
    </form>
        
</div>
</body>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
