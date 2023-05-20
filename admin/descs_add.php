<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();
//Check to see if the form has been submitted
if (isset($_POST['refid'])) {
  //Confirm required form data is complete
  if ($_POST['refid'] and $_POST['description']) {

    $query = 'INSERT INTO descs (
        refid,
        description

      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['refid']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['description']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Description has been added');
  }

  header('Location: descs.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Description</h2>

<form method="post">

  <label for="refid">ReferenceId:</label>
  <input type="text" name="refid" id="refid">

  <br>

  <label for="description">Description:</label>
  <input type="text" name="description" id="description">

  <br>


  <input type="submit" value="Add Education">

</form>

<p><a href="descs.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include('includes/footer.php');

?>