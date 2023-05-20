<?php
include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');


// Check to see if the form has been submitted
if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
  // Confirm required form data is complete
  if ($_POST['name'] && $_POST['email'] && $_POST['message']) {
    $query = "INSERT INTO msg (
        name,
        email,
        message
      ) VALUES (
         '" . mysqli_real_escape_string($connect, $_POST['name']) . "',
         '" . mysqli_real_escape_string($connect, $_POST['email']) . "',
         '" . mysqli_real_escape_string($connect, $_POST['message']) . "'
      )";
    mysqli_query($connect, $query);

    // Redirect to index.php
    header('Location: ../index.php');
    exit;
  }
}


//INSERT INTO `msg` (`id`, `name`, `email`, `message`) 