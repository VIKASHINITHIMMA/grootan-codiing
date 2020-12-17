<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "grootan");
$message = '';

if(isset($_POST["upload"]))
	{ 
 if($_FILES['product_file']['name'])
 { 
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  { 

$str_CSV = '"id","name","password"
"1","abc","aaa"
"2","def","bbb"';

/*$row = str_getcsv($str_CSV, "\n");
$length = count($row);
for($i=0;$i<$length;$i++) {
 $data = str_getcsv($row[$i], ",");
 print_r($data);
}	*/

   $handle = fopen($_FILES['product_file']['tmp_name'], "r");
   if(isset(fgetcsv($handle)[0]))
   {
	   $create="CREATE TABLE records (id int(100),name varchar(100),password varchar(100))";
	   mysqli_query($connect, $create);
   }
	   
   $conn=mysqli_connect("localhost","root","","grooton");  $q="SELECT * FROM records"; $run=mysqli_query($conn, $q); while($row=mysqli_fetch_array($run)){ $id=$row[0]; $name=$row[1]; $password=$row[2]; } ?>
   while($data = fgetcsv($handle))
   {
    $product_id = mysqli_real_escape_string($connect, $data[0]);
    $product_category = mysqli_real_escape_string($connect, $data[1]); 	
                $product_name = md5(mysqli_real_escape_string($connect, $data[2]));
    $query = "INSERT into records(name,password)values ('$product_category','$product_name');"; 
    /*	if (mysqli_query($connect, $query) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli_error;
}*/
    mysqli_query($connect, $query);
   }
   fclose($handle);
   header("location: sam.php");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">Product Updation Done</label>';
}

$query = "SELECT * FROM daily_product";
$result = mysqli_query($connect, $query);
?>