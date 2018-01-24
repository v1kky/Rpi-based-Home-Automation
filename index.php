<?php
$servername = "localhost";
$username = "root";
$password = "user123";
$dbname = "relaypi";

$values = $_POST['motor'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["form"]) ){

  $sql = "UPDATE records SET r_value='$values' WHERE id=1";

  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }


}
$sql1 = "SELECT r_value FROM records  WHERE id=1";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  // output data of each row
   while($row = $result->fetch_assoc()) {
        $r_value = $row["r_value"];
    }
} else {
  echo "Error. Contact to server administrator";
}
?>
<?php

//    $conn->close();
?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="sample.min.css">

</head>
<body>
  <h2> Raspberry Control System</h2>

  <form action="" method="post">

      <div class="form-group">
          <label for="name">GPIO</label>
          <select class="form-control" name="motor">

            <?php if($r_value == 0){
                echo "<option selected>0</option>";
                echo "<option>1</option>";
            } else {
                echo "<option selected>1</option>";
                echo "<option>0</option>";
            }
            ?>
          </select>
      </div>

      <button type="submit" class="btn btn-primary" name="form">Submit</button>
  </form>

</body>

</html>
