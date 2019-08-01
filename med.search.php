 <?php

if(isset($_POST['med_search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `med_data` WHERE CONCAT(`med_name`, `comp_name`, `generic_name`,`price`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `med_data`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "med.directory");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="style.css">
        <title>Medicine Search</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <div class="container">
    <body>
       
          <ul class= "head">
         <li><a href="index.php">Medical Inventory</a>
         </li>
     </ul>
        <form action="med.search.php" method="post">
            <div class="input-group">
            <input type="text" name="valueToSearch" placeholder="Search"><br><br>
            </div>
            <div class="input-group">
                <input type="submit" name="med_search" value="Search"><br><br></div>
            
            <table>
                <tr>
                   <!-- <th>Id</th> -->
                    <th>Name</th>
                    <th>Compan Name</th>
                    <th>Generic Name</th>
                    <th>Price</th>
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                   <!-- <td><?php echo $row['med_id'];?></td> -->
                    <td><?php echo $row['med_name'];?></td>
                    <td><?php echo $row['comp_name'];?></td>
                     <td><?php echo $row['generic_name'];?></td>
                    <td><?php echo $row['price'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
    </div>
        </html>
