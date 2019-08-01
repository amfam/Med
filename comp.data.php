 <?php

$host = "localhost";
$user = "root";
$password ="";
$database = "med.directory";

$comp_name = "";
$address = "";
$contact_no = "";

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
   
    $posts[0] = $_POST['comp_name'];
    $posts[1] = $_POST['address'];
    $posts[2] = $_POST['contact_no'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM `comp_data` WHERE  `comp_name` = '$data[0]'";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                
                $comp_name = $row['comp_name'];
                $address = $row['address'];
                $contact_no = $row['contact_no'];
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
    $insert_Query = "INSERT INTO `comp_data`(`comp_name`,`address`, contact_no) VALUES ('$data[0]','$data[1]','$data[2]')";
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
    $delete_Query = "DELETE FROM `comp_data` WHERE `comp_name` = '$data[0]'";
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
    $update_Query = "UPDATE `comp_data` SET `comp_name`='$data[0]',`address`='$data[1]',`contact_no`='$data[2]' WHERE `comp_name` = '$data[0]'";
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
	<title>Company Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
      <ul class= "head">
         <li><a href="index.php">Medical Inventory</a>
         </li>
     </ul>
        <form action="comp.data.php" method="post">
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="comp_name" placeholder="Name" value="<?php echo $comp_name;?>"><br><br>
            </div>
            <div class="input-group">
                <label>Address</label>
                <input type="text" name="address" placeholder="Address" value="<?php echo $address;?>"><br><br></div>
            <div class="input-group">
                <label>contact no</label>
                <input type="text" name="contact_no" placeholder="Contact No." value="<?php echo $contact_no;?>"><br><br></div>
            <div>
                <!-- Input For Add Values To Database-->
                <div class="input-group">
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
                </div>
            </div>
        </form>
    </body>
</html>