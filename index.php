<html>
<head>
  <title>Real Estate Listing</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvX" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // Hide the form if the user is logged in
    ?>
<!-- Echo the welcome message -->
<div class="d-flex align-items-center">
  <p class="m-0">Welcome, <?php echo $_SESSION['username']; ?>! You are logged in.</p>
  &nbsp; <a class="btn btn-primary ml-auto" href="logout.php">Logout</a>
</div>

<!-- Property Listing Form -->
<h2 class="text-center mt-5">List a Property</h2>
<form class="container mt-5" action="submit-ad.php" method="post">
  <div class="form-group">
    <label for="price">Price:</label>
    <input type="text" class="form-control" id="price" name="price" required>
  </div>

  <div class="form-group">
    <label for="region">Region:</label>
    <select class="form-control" id="region" name="region" required>
      <option value="Athens">Athens</option>
      <option value="Thessaloniki">Thessaloniki</option>
      <option value="Patras">Patras</option>
      <option value="Heraklion">Heraklion</option>
    </select>
  </div>

  <div class="form-group">
    <label for="availability">Availability:</label>
    <select class="form-control" id="availability" name="availability" required>
      <option value="sale">Sale</option>
      <option value="rental">Rental</option>
    </select>
  </div>

  <div class="form-group">
    <label for="square">Square:</label>
    <input type="text" class="form-control" id="square" name="square" required>
  </div>

  <input class="btn btn-primary mt-3" type="submit" value="Submit">
</form>


 <!-- test -->
 <div class="container">
<h2>List of ads</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Region</th>
            <th>Price</th>
            <th>Availability</th>
            <th>Square m<sup>2</sup></th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php

// Include the database connection file
include 'database_connection.php';

// Select data for the logged-in user from the database
$sql = "SELECT * FROM listings WHERE username = '" . $_SESSION['username'] . "'";
$result = $conn->query($sql);

// Display data in the table
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["region"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["availability"] . "</td>";
        echo "<td>" . $row["square"] . "</td>";
        echo "<td><a href='delete.php?id=" . $row["id"] . "' class='btn btn-primary'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}

// Close the database connection
$conn->close();


// We declare to the user that he deleted an entry
if (isset($_SESSION['message'])) {
  echo "<script>
  alert('" .$_SESSION['message']. ".');
  setTimeout(function() {
      window.location.href = 'index.php';
  }, 1500);
</script>";
  unset($_SESSION['message']);
}

}

else {
  echo '<form action="authenticate.php" method="post" class="container mt-5">';
  echo '<div class="form-group">';
  echo '<label for="username">Username:</label>';
  echo '<input type="text" id="username" name="username" class="form-control" required>';
  echo '</div>';
  echo '<div class="form-group">';
  echo '<label for="password">Password:</label>';
  echo '<input type="password" id="password" name="password" class="form-control" required>';
  echo '</div>';
  echo '<div class="form-group mt-3">';
  echo '<input type="submit" class="btn btn-primary" value="Submit">';
  echo '</div>';
  echo '</form>';
}


?>
</div>

</tbody>
</table>
</body>
</html>