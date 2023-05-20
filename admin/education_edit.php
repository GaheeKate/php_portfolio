<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (!isset($_GET['id'])) {

  header('Location: education.php');
  die();
}

if (isset($_POST['SchoolName'])) {

  if ($_POST['SchoolName'] and $_POST['CourseName']) {

    $query = 'UPDATE education SET
      SchoolName = "' . mysqli_real_escape_string($connect, $_POST['SchoolName']) . '",
      CertType = "' . mysqli_real_escape_string($connect, $_POST['CertType']) . '",
      CourseName = "' . mysqli_real_escape_string($connect, $_POST['CourseName']) . '",
      Period = "' . mysqli_real_escape_string($connect, $_POST['Period']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Skill has been updated');
  }

  header('Location: education.php');
  die();
}




if (isset($_GET['id'])) {

  $query = 'SELECT *
    FROM education
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (!mysqli_num_rows($result)) {

    header('Location: education.php');
    die();
  }

  $record = mysqli_fetch_assoc($result);
}

include('includes/header.php');

?>

<h2>Edit education</h2>

<form method="post">

  <label for="SchoolName">SchoolName:</label>
  <input type="text" name="SchoolName" id="SchoolName" value="<?php echo htmlentities($record['SchoolName']); ?>">

  <br>

  <label for="CertType">CertType:</label>
  <input type="text" name="CertType" id="CertType" value="<?php echo htmlentities($record['CertType']); ?>">

  <br>

  <label for="CourseName">CourseName:</label>
  <input type="text" name="CourseName" id="CourseName" value="<?php echo htmlentities($record['CourseName']); ?>">

  <br>

  <label for="percent">Period:</label>
  <input type="text" name="Period" id="Period" value="<?php echo htmlentities($record['Period']); ?>">

  <br>

  <input type="submit" value="Edit Education">

</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include('includes/footer.php');

?>