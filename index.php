<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Document</title>
</head>

<body>
  <div class="nav">


    <h1>
      Rentroom.com
    </h1>
    <div style="display:flex;">

      <h4><a href="addroom.php">Admin</a></h4>
      <h4 style="margin-left:5px;"><a href="addroom.php">Contact</a></h4>
    </div>
  </div>
  <?php
  //Start Session
  
  session_start();


  //Create Constants to Store Non Repeating Values
// define('SITEURL', 'http://localhost/online/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'rooms');

  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database
  

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  // Fetch and display the stored data 
  $sql = "SELECT * FROM room";
  $result =
    $conn->query($sql);
  if ($result->num_rows > 0) {
    while (
      $row =
      $result->fetch_assoc()
    ) {

      $picture = $row['picture'];
      $description =
        $row['description'];
      $price = $row['price'];
      $location = $row['location'];
      ?>

      <!-- product start -->
 <div class="content">
  <div>

    <img src="<?php echo "$picture"; ?>" alt="">
  </div>
          <div class="information">
            <h4>
              <?php echo "$location<br>"; ?>
            </h4>
            
            <?php echo "$description<br>"; ?>
            <?php echo " $price<br>"; ?>
            <br>
        <a class="call-btn" href="">Contact</a>
          </div>
        </div>
   

    <?php }
  } else {
    echo "No records found.";
  }

  // Close the connection
  $conn->close(); ?>
  <!-- <h3>created by - github.com/iabhaykaran</h3> -->
</body>

</html>