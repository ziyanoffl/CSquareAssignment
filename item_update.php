<?php

include 'con.php';

$Id = $_GET['id'];

// this is to get the information from the database
$sql = "SELECT * FROM item WHERE id = '$Id'";

$results = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($results)) {
    $item_code = $row['item_code'];
    $item_name = $row['item_name'];
    $item_quantity = $row['quantity'];
    $item_price = $row['unit_price'];
}

if(isset($_POST['submitbtn'])){

    $itemCode = $_POST['itemCode'];
    $itemName = $_POST['itemName'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];


    $sql_registration = "UPDATE `item` SET `item_name`='$itemName',`item_code`='$itemCode',`item_category`='$category',`item_subcategory`='$subcategory', `quantity`='$quantity', `unit_price`='$price'  WHERE `item`.`id` = $Id;";
    
    $sql_status = mysqli_query($con, $sql_registration);

    echo"
        <script>
            alert('Item updated successfully!');
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
    <title>View Customers</title>


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
                    <input type="text" class="form-control" name="itemCode" value="<?php echo $item_code ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid Item Code
                    </div>
                </div>

                <div class="form-group  col-md-6">
                    <label class="form-label ">Item name</label>
                    <input type="text" class="form-control" name="itemName" value="<?php echo $item_name ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid Item Name
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
                    <input type="number" class="form-control" id="" name="quantity" value="<?php echo $item_quantity ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid quantity
                    </div>
                </div> 

                <div class="form-group  col-md-6">
                    <label class="col-form-label">Price</label>
                    <input type="number" class="form-control" id="" name="price" value="<?php echo $item_price ?>" required>
                    <div class="invalid-feedback">
                        Please enter a valid Price
                    </div>
                </div> 
                
        </div>      

        <!-- Submit Button-->
        <div class="col-12">
                    <button class="btn btn-primary btn-xl mt-4" type="submit" name="submitbtn">UPDATE</button>
                </div>

                
           
            
    </form>
        
</div>
</body>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
