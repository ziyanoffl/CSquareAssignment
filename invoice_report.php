<?php

include 'con.php';

if(isset($_POST['searchBtn'])){

    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $valueToSearch = $_POST['valueToSearch'];
    $sql = "SELECT invoice.date, invoice.invoice_no, invoice.customer, invoice.item_count, invoice.amount, customer.district, customer.first_name FROM `invoice` LEFT JOIN customer on invoice.customer = customer.id 
        WHERE CONCAT(`invoice_no`, `customer`, `district`) LIKE '%".$valueToSearch."%' AND invoice.date BETWEEN '$from_date' AND '$to_date'";
}else{
    // this is to get the information from the database
    $sql = "SELECT invoice.date, invoice.invoice_no, invoice.customer, invoice.item_count, invoice.amount, customer.district, customer.first_name FROM `invoice` LEFT JOIN customer on invoice.customer = customer.id";
}

                  
$results = mysqli_query($con, $sql);

?>

<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>


</head>
    <div class=""> 
        <!-- Navbar comes here -->
        <?php include 'navbar.php'; ?>
    </div>
 
<body style="background-color: #aee4ff;">

<!-- Table -->
<div class="container">
    <div class="row justify-content-center">
        <p></p>
        <h2 class="text-center">Item Information</h2>                
        <Form class="needs-validation" method="POST" novalidate>
            <input class="form-control mt-4" type="text" name="valueToSearch" placeholder="Search table..." required>
            <div class="invalid-feedback">
                Please enter a valid Search
            </div>

            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">From Date</label>
                                    <input type="date" name="from_date" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please select a date
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">To Date</label>
                                    <input type="date" name="to_date" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please select a date
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Click to Search</label><br>
                                    <button type="submit" name="searchBtn" class="btn btn-primary btn-xl">Search</button>
                                </div>
                            </div>
                        </div>
            <div class="col-12">
                

            </div>
        </Form>
    </div>


    <!-- Customer View Table-->
    <div class="row justify-content-center">
  
        <p></p>
        <table id="table" class="table center">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Invoice number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Customer district</th>
                    <th scope="col">Item count</th>
                    <th scope="col">Invoice amount</th>
                    <th scope="col" class="text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // the given loop fetches the required information to display in the table
                    while($row = mysqli_fetch_assoc($results)){

                        echo   "<tr style='vertical-align:middle';>";
                        echo   "<td>".$row["invoice_no"]."</td>";
                        echo   "<td>".$row["date"]."</td>";
                        echo   "<td>".$row["customer"]."</td>";
                        echo   "<td>".$row["first_name"]."</td>";
                        echo   "<td>".$row["district"]."</td>";
                        echo   "<td>".$row["item_count"]."</td>";
                        echo   "<td>".$row["amount"]."</td>";

                        echo "
                            <td class='text-center'><a class='btn btn-danger' href='item_delete.php?id=".$row["invoice_no"]."'>DELETE</a>
                            <a class='btn btn-warning' href='item_update.php?id=".$row["invoice_no"]."'>UPDATE</a></td>";
                        
                        echo   "</tr>";
                    }
                    
                    ?>

            </tbody>
        </table>
    </p>
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
