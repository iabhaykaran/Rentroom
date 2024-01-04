<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Document</title>
</head>





<?php
//Start Session
session_start();


//Create Constants to Store Non Repeating Values
// define('SITEURL', 'http://localhost/onl/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rooms');   //replace room with ur db name

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database


?>


<?php
// Assuming you have already established a database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $description = $_POST['description'];
  $price = $_POST['price'];
  $location = $_POST['location'];

  // Handle the uploaded picture
  $picture = $_FILES['picture'];
  $pictureName = $picture['name'];
  $pictureTmpName = $picture['tmp_name'];
  $pictureError = $picture['error'];

  // Check if there are no errors in the uploaded picture
  if ($pictureError === UPLOAD_ERR_OK) {
    // Specify the destination directory to store the uploaded picture
    $destination = 'uploads/' . $pictureName;

    // Move the uploaded picture to the destination directory
    if (move_uploaded_file($pictureTmpName, $destination)) {
      // Picture uploaded successfully, perform further actions (e.g., save to a database)

      // Store the record in the database
      $sql = "INSERT INTO room (picture, description, price, location) 
                    VALUES ('$destination', '$description', '$price', '$location')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        // Record inserted successfully
        echo "Picture uploaded and record saved in the database.";
      } else {
        // Failed to insert the record
        echo "Failed to save the record in the database.";
      }
    } else {
      // Failed to move the uploaded picture
      echo "Failed to upload the picture.";
    }
  } else {
    // An error occurred during picture upload
    echo "Error uploading the picture: " . $pictureError;
  }
}
?>

<div class="form">

<h3>List your room</h3>

  <!-- HTML form for uploading picture, description, price, and location -->
  <form method="POST" action="" enctype="multipart/form-data">
    <!-- <label for="picture">Picture:</label> -->
    <input type="file" name="picture" id="picture"  required>
    <br>
    <!-- <label for="location">Location:</label> -->
    <input class="des" type="text" name="location" id="location" placeholder="Address" required>
    <br>
    <!-- <label for="description">Description:</label> -->
    <textarea class="des2 des" name="description" id="description" placeholder="Add Amenities" required></textarea>
    <br>
    
    <input class="des" type="text" name="price" id="price" placeholder="Price/month" required>

    <br>
    
      <input class="submit-btn" type="submit" value="Upload">
  
      
  </form>

</div>