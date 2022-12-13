<?php

include 'con.php';

if(isset($_POST['searchBtn'])){
    $valueToSearch = $_POST['valueToSearch'];
    $sql = "SELECT * FROM `item` WHERE CONCAT(`id`, `item_code`, `item_category`, `item_subcategory`, `item_name`, `quantity`, `unit_price`) LIKE '%".$valueToSearch."%'";
}else{
    // this is to get the information from the database
    $sql = "SELECT * FROM item";
}



$results = mysqli_query($con, $sql);

if(isset($_POST['submitbtn'])){

    $itemCode = $_POST['itemCode'];
    $itemName = $_POST['itemName'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];


    $sql_registration = "INSERT INTO `item` (`id`, `item_name`,`item_code`,`item_category`,`item_subcategory`, `quantity`, `unit_price`) VALUES ('', '$itemName', '$itemCode', '$category', '$subcategory', '$quantity', '$price');";
    
    $sql_status = mysqli_query($con, $sql_registration);

    echo"
        <script>
            alert('Item added successfully!');
            window.location.href='item_view.php';
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
    <title>Items</title>


</head>
    <div class=""> 
        <!-- Navbar comes here -->
        <?php include 'navbar.php'; ?>
    </div>
 
<body style="background-color: #aee4ff;">

<div class="container">
    <h2 class="text-center">Add Item</h2>
    <form class="row needs-validation" method="POST" novalidate>
        <div class="row">
            
                <div class="form-group  col-md-6">
                    <label class="form-label">Item Code</label><br>
                    <input type="text" class="form-control" name="itemCode" required>
                    <div class="invalid-feedback">
                        Please enter a valid Item Code
                    </div>
                </div>

                <div class="form-group  col-md-6">
                    <label class="form-label ">Item name</label>
                    <input type="text" class="form-control" name="itemName" required>
                    <div class="invalid-feedback">
                        Please enter a valid First Name
                    </div>
                </div>
        </div>

        <div class="row">

                <div class="form-group  col-md-6">
                    <label class="form-label">Select Category</label><br>
                    <select class="form-select" name="category">
                        <?php

                            $sqlCat = "SELECT * FROM item_category";
                            $resultCat = mysqli_query($con, $sqlCat);
                            // the given loop fetches the required information to display
                            while($row = mysqli_fetch_assoc($resultCat)){
                                echo   '<option value="'.$row["id"].'">'.$row["category"].'</option>';
                            }

                        ?>
                    </select>
                </div>

                <div class="form-group  col-md-6">
                    <label class="col-form-label">Select Item Subcategory</label>
                    <select class="form-select" name="subcategory">
                        <?php

                            $sqlSub = "SELECT * FROM item_subcategory";
                            $resultSub = mysqli_query($con, $sqlSub);
                            // the given loop fetches the required information to display
                            while($row = mysqli_fetch_assoc($resultSub)){
                                echo   '<option value="'.$row["id"].'">'.$row["sub_category"].'</option>';
                            }
                            
                            ?>
                    </select>
                </div>
                
        </div>

        <div class="row">
                
                
                <div class="form-group  col-md-6">
                    <label class="col-form-label">Quantity</label>
                    <input type="number" class="form-control" id="" name="quantity" required>
                    <div class="invalid-feedback">
                        Please enter a valid Last Name
                    </div>
                </div> 

                <div class="form-group  col-md-6">
                    <label class="col-form-label">Price</label>
                    <input type="number" class="form-control" id="" name="price" required>
                    <div class="invalid-feedback">
                        Please enter a valid Price
                    </div>
                </div> 
                
        </div>      

        <!-- Submit Button-->
        <div class="col-12">
                    <button class="btn btn-primary btn-xl mt-4" type="submit" name="submitbtn">Add Item</button>
                </div>

                
           
            
    </form>
        
</div>


<!-- Table -->
<div class="container">
  <div class="row">
            <!-- Customer View Table-->
            <div class="row justify-content-center">
                <p></p>
            <h2 class="text-center">Item Information</h2>                
            <Form method="POST">
                <input class="form-control mt-4" type="text" id="myInput" name="valueToSearch" placeholder="Search table..">
                <div class="col-12">
                    <button type="submit" name="searchBtn" class="btn btn-primary btn-xl mt-4">Search</button>

                </div>
            </Form>
                    
                    <p></p>
             
                
                    <table class="table center ">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Id</th>
                                <th scope="col">item code</th>
                                <th scope="col">Category</th>
                                <th scope="col">Subcategory</th>
                                <th scope="col">Item name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col" class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // the given loop fetches the required information to display in the table
                                while($row = mysqli_fetch_assoc($results)){

                                    echo   "<tr style='vertical-align:middle';>";
                                    echo   "<td>".$row["id"]."</td>";
                                    echo   "<td>".$row["item_code"]."</td>";
                                    echo   "<td>".$row["item_category"]."</td>";
                                    echo   "<td>".$row["item_subcategory"]."</td>";
                                    echo   "<td>".$row["item_name"]."</td>";
                                    echo   "<td>".$row["quantity"]."</td>";
                                    echo   "<td>".$row["unit_price"]."</td>";

                                    echo "
                                        <td class='text-center'><a class='btn btn-danger' href='item_delete.php?id=".$row["id"]."'>DELETE</a>
                                        <a class='btn btn-warning' href='item_update.php?id=".$row["id"]."'>UPDATE</a></td>";
                                    
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
