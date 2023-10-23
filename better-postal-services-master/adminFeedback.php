<?php
include('db_con.php');

// $telimailList = "SELECT  telemails.sender_name, telemails.sender_address, telemails.receiver_name telemails.receiver_address post_offices.post_office 
// FROM telemails
// INNER JOIN post_offices
// ON telemails.receiver_post_office = post_offices.id";

$feedBacks = "SELECT * FROM customer_feedback";


// Execute the query
$result = $mysqli->query($feedBacks);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>MySQL Data Display</title>
</head>
<style>
    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
  padding:40px;
  margin-left: auto;
  margin-right: auto;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.row.content{
    height: 500px; 
    margin-top:20px;

}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
</style>
<body>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <ul class="nav nav-pills nav-stacked">
        <br>
        <li style="magin-top:10px"><a href="adminDashboard.php">Dashboard</a></li>
        <li><a href="adminTelimail.php">Telemails</a></li>
        <li><a href="adminMoneyOrder.php">Money Orders</a></li>
        <li><a href="">Banking</a></li>
        <li class="active"><a href="adminFeedback.php">Customer Feedbacks</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
        <div><h4><a href="#"><img src="Images\bookmark.png" width="25" height="35" alt=""></a>Telemail Records</h4></div>
        <br>
    <table border="1" id="customers">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Rate</th>
            <th>Comment</th>
            <th>Feedback Date</th>
        
            <!-- Add more table headers for your specific data -->
        </tr>
        <?php
        // Check if there are any rows in the result set
        if ($result->num_rows > 0) {
            // Loop through the result set and output data into the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["rate"] . "</td>";
                echo "<td>" . $row["comment"] . "</td>";
                echo "<td>" . $row["feedback_date"] . "</td>";

                // Add more table cells for your specific data
                echo "</tr>";
            }
        } else {
            echo "No records found.";
        }

        // Close the database connection
        $mysqli->close();
        ?>
    </table>
    </div>
  </div>
</div>
</body>
</html>