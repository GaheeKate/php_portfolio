<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();
//Check to see if the form has been submitted
if (isset($_POST['SchoolName'])) {
  //Confirm required form data is complete
  if ($_POST['SchoolName'] and $_POST['CourseName']) {

    $query = 'INSERT INTO education (
        SchoolName,
        CertType,
        CourseName,
        Period

      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['SchoolName']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['CertType']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['CourseName']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['Period']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Education has been added');
  }

  header('Location: education.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Education</h2>

<form method="post">

  <label for="SchoolName">SchoolName:</label>
  <input type="text" name="SchoolName" id="SchoolName">

  <br>

  <label for="CertType">CertType:</label>
  <input type="text" name="CertType" id="CertType">

  <br>

  <label for="CourseName">CourseName:</label>
  <input type="text" name="CourseName" id="CourseName">

  <br>

  <label for="Period">Period:</label>
  <input type="text" name="Period" id="Period">

  <br>

  <input type="submit" value="Add Education">

</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include('includes/footer.php');

?>