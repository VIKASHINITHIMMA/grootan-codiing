
<!DOCTYPE html>
<html>
 <head>
  <title>CSV to Database</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Update Mysql Database through Upload CSV File using PHP</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data' action="index.php">
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="product_file" required/></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>id</th>
      <th>Product Name</th>
      <th>password</th>
     </tr>
     <?php $conn=mysqli_connect("localhost","root","","grootan");  $q="SELECT * FROM records"; $run=mysqli_query($conn, $q); while($row=mysqli_fetch_array($run)){ $id=$row[0]; $name=$row[1]; $password=$row[2]; 
     
      echo '
      <tr>
       <td>'.$id.'</td>
       <td>'.$name.'</td>
       <td>'.$password.'</td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
  </div>
 </body>
</html>