<?php

include 'con.php';

$sql = "SELECT item_name, SUM(quantity) as item_quantity, item_category, item_subcategory FROM item GROUP BY item_name";



                  
$results = mysqli_query($con, $sql);

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

<!-- Table -->
<div class="container">
    <h2 class="text-center">Item Report</h2>  
    <!-- Customer View Table-->
    <div class="row justify-content-center">
  
        <p></p>
        <table id="table" class="table center">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Category</th>
                    <th scope="col">Item Subcategory</th>
                    <th scope="col">Item Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // the given loop fetches the required information to display in the table
                    while($row = mysqli_fetch_assoc($results)){

                        echo   "<tr style='vertical-align:middle';>";
                        echo   "<td>".$row["item_name"]."</td>";
                        echo   "<td>".$row["item_category"]."</td>";
                        echo   "<td>".$row["item_subcategory"]."</td>";
                        echo   "<td>".$row["item_quantity"]."</td>";
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
