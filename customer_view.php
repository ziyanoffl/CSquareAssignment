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
    <title>View Customers</title>


</head>
    <div class=""> 
        <!-- Navbar comes here -->
        <?php include 'navbar.php'; ?>
    </div>
 
<body style="background-color: #aee4ff;">

<div class="container">
    <h2 class="text-center">Add Customer</h2>
    <form class="row needs-validation" method="POST" novalidate>
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
                    <input type="text" class="form-control" name="firstName" required>
                    <div class="invalid-feedback">
                        Please enter a valid First Name
                    </div>
                </div>
        </div>

        <div class="row">
                
                <div class="form-group  col-md-6">
                    <label class="col-form-label">Last Name</label>
                    <input type="text" class="form-control" id="" name="lastName" required>
                    <div class="invalid-feedback">
                        Please enter a valid Last Name
                    </div>
                </div> 

                <div class="form-group  col-md-6">
                    <label class="col-form-label">Contact No.</label>
                    <input type="number" class="form-control" id="" name="contact" required>
                    <div class="invalid-feedback">
                        Please enter valid Contact No
                    </div>
                </div>
        </div>

        <div class="row">
                
                <div class="form-group  col-md-6">
                    <label class="col-form-label">District</label>
                    <input type="number" class="form-control" id="" name="district" required>
                    <div class="invalid-feedback">
                        Please enter valid District No
                    </div>
                </div> 
                
                <!-- Submit Button-->
                <div class="col-12">
                    <button class="btn btn-primary btn-xl mt-4" type="submit" name="submitbtn">Add Customer</button>
                </div>
        </div>   
            
    </form>
        
</div>


<!-- Table -->
<div class="container">
  <div class="row">


            <!-- Customer View Table-->
            <div class="row justify-content-center">
                <p></p>
            <h2 class="text-center">Customer Information</h2>
            <Form method="POST">
            <input class="form-control mt-4" type="text" id="myInput" name="valueToSearch" placeholder="Search table..">
                <div class="col-12">
                    <button type="submit" name="searchBtn" class="btn btn-primary btn-xl mt-4">Search</button>
                </div>
            </Form>                
                    
                    
                    <p></p>
             
                
                    <table class="table center " id="customerTable">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Contact number</th>
                                <th scope="col">District</th>
                                <th scope="col" class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // the given loop fetches the required information to display in the table
                                while($row = mysqli_fetch_assoc($results)){

                                    echo   "<tr style='vertical-align:middle';>";
                                    echo   "<td>".$row["id"]."</td>";
                                    echo   "<td>".$row["title"]."</td>";
                                    echo   "<td>".$row["first_name"]."</td>";
                                    echo   "<td>".$row["last_name"]."</td>";
                                    echo   "<td>".$row["contact_no"]."</td>";
                                    echo   "<td>".$row["district"]."</td>";

                                    echo "
                                        <td class='text-center'><a class='btn btn-danger' href='customer_delete.php?id=".$row["id"]."'>DELETE</a>
                                        <a class='btn btn-warning' href='customer_update.php?id=".$row["id"]."'>UPDATE</a></td>";
                                    
                                    echo   "</tr>";
                                }
                                
                                ?>

                        </tbody>
                    </table>
                </p>
            </div>
                    
        
    </div>
  
</div>

<script>
    var forms = document.querySelectorAll('.needs-validation');
            
            Array.prototype.slice.call( forms ).forEach( function( form )
            {
                form.addEventListener( 'submit', function ( event )
                {
                    if ( !form.checkValidity( ) )
                    {
                        event.preventDefault( )
                        event.stopPropagation( );
                    }

                    form.classList.add( 'was-validated' );
              }, false );
            } );

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>

</html>
