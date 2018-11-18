<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multiple File uploader</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple >
    <input type="submit" name="submit" value="UPLOAD">
</form>
<hr>
<?php
// Include the database configuration file
require('dbconn.php');

// Get images from the database by newest 1st
$query = $db->query("SELECT * FROM images ORDER by uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
   
?>
    <a href = "<?php echo $row['file_name']; ?>"><img src="<?php echo $row['file_name']; ?>" alt="" width="150" height="150"/></a>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 
  
</body>
</html>