<?php

include('db_con.php');

$id = $_GET['id'];


$sql = "SELECT * FROM telemails WHERE id = $id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();
} else {
    echo "No data found for ID: $id_to_edit";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="login">
  <h1>Telemail Edit Form</h1>
  <form action="updateTelimail.php" method="post">
    <p><input type="hidden" name="id" value="<?php echo $row['id']; ?>" ></p>
    <p><input type="text" name="sender_name" value="<?php echo $row['sender_name']; ?>" placeholder="Sender Name"></p>
    <p><input type="text" name="sender_address" value="<?php echo $row['sender_address']; ?>" placeholder="Sender Address"></p>
    <p><input type="text" name="receiver_name" value="<?php echo $row['receiver_name']; ?>" placeholder="Receiver Name"></p>
    <p><input type="text" name="receiver_address" value="<?php echo $row['receiver_address']; ?>" placeholder="Receiver Address"></p>
    <p class="submit"><input type="submit" name="commit" value="Update"></p>
  </form>
</div>
</body>
</html>