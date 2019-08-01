 <?php

$host = "localhost";
$user = "root";
$password ="";
$database = "med.directory";

$med_name = "";
$comp_name = "";
$generic_name = "";
$price = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['med_name'];
    $posts[1] = $_POST['comp_name'];
    $posts[2] = $_POST['generic_name'];
    $posts[3] = $_POST['price'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM `med_data` WHERE  `med_name` = '$data[0]'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $med_name = $row['med_name'];
                $comp_name = $row['comp_name'];
                $generic_name = $row['generic_name'];
                $price = $row['price'];
            }
        }else{
            echo 'No Data For This Name';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `med_data`(`med_name`, `comp_name`,`generic_name`, price) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `med_data` WHERE `med_name` = '$data[0]'";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `med_data` SET `med_name`='$data[0]',`comp_name`='$data[1]',`generic_name`='$data[2]',`price`='$data[3]' WHERE `med_name` = '$data[0]'";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        	<title>Medicine Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
      <ul class= "head">
         <li><a href="index.php">Medical Inventory</a>
         </li>
     </ul>
        <form action="med.data.php" method="post">
            <div class="input-group">
                <label>Name</label>
            <input type="text" name="med_name" placeholder="Name" value="<?php echo $med_name;?>"><br><br>
            </div>
            <div class="input-group">
                <label>Company Name</label>
                <input type="text" name="comp_name" placeholder="Company" value="<?php echo $comp_name;?>"><br><br>
            </div>
            <div class="input-group">
                <label>Generic Name</label>
            <input type="text" name="generic_name" placeholder="Generic Name" value="<?php echo $generic_name;?>"><br><br>
            </div>
            <div class="input-group">
                <label>price</label>
                <input type="text" name="price" placeholder="Price" value="<?php echo $price;?>"><br><br> </div>
            <div>
                <!-- Input For Add Values To Database-->
                <div class="input-group">
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given Data -->
                <input type="submit" name="search" value="Find">
                </div>
            </div>
        </form>
    </body>
</html>