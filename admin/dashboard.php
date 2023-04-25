<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
<header class="header">
  <h1>Event <span>Organize fast</span></h1>
  <nav>
    <ul class="nav">
      <li><a  class="event" href="#0"><i class="fa fa-plus" aria-hidden="true"></i>  New Event</a></li>  <li><a class="profilephoto" href="#0"><img src="https://dl.dropboxusercontent.com/u/99892820/male-users/men48-photo-by-Tom-Coates.jpg" alt="" /></a></li>
    </ul>
  </nav>
</header>
<style>
    
</style>

<div class="container">
  
  <section class="titlesection">
    <h1>Your Events</h1>
    <nav>
      <ul class="subnav">
        <li><a href="#0"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
      </ul>
    </nav>
  </section>
  
  <section class="main">
  <?php
    include '../database/dbcon.php';
    // Fetch the form data from the database
    $sql = "SELECT `formID`, `formName`, `image`, `formDesc` FROM `form`";
    $result = $con->query($sql);

    // Loop through the forms and create card elements
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        // Create anchor tag and card element
        echo '<div class="card">';
        echo '<ul class="details">';
        echo '<li>';
        // Create anchor tag and image element
        echo '<a href="form.php?formID=' . $row["formID"] . '"><img class="image" src="' . $row["image"] . '"></a>';
        // Create form name element
        echo '<div class="formName">' . $row["formName"] . '</div>';
        // Create form description element
        echo '<div class="formDesc">' . $row["formDesc"] . '</div>';
        // Close list element
        echo '</li>';
        echo '</ul>';
       
        echo '</div>';
      }
    } else {
      echo "No forms found";
    }

 

    // Close database connection
    $con->close();
  ?>
</section>

  
</div>
    
</body>
</html>