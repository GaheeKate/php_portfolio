<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();
//Check to see if the form has been submitted
if (isset($_POST['name'])) {
  //Confirm required form data is complete
  if ($_POST['name']) {

    $query = 'INSERT INTO skills (
        name
      ) VALUES (
        "' . mysqli_real_escape_string($connect, $_POST['name']) . '"

      )';
    mysqli_query($connect, $query);

    set_message('Skill has been added');
  }

  header('Location: skills.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Skill</h2>

<form method="post">

  <label for="name">Name:</label>
  <input type="text" name="name" id="name">

  <br>


  <input type="submit" value="Add Skill">

</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skill List</a></p>


<?php

include('includes/footer.php');

?>