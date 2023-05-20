<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (!isset($_GET['id'])) {

  header('Location: descs.php');
  die();
}

if (isset($_POST['refid'])) {

  if ($_POST['refid'] and $_POST['description']) {

    $query = 'UPDATE descs SET
      refid = "' . mysqli_real_escape_string($connect, $_POST['refid']) . '",
      description = "' . mysqli_real_escape_string($connect, $_POST['description']) . '",

      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Description has been updated');
  }

  header('Location: descs.php');
  die();
}




if (isset($_GET['id'])) {

  $query = 'SELECT *
    FROM descs
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (!mysqli_num_rows($result)) {

    header('Location: descs.php');
    die();
  }

  $record = mysqli_fetch_assoc($result);
}

include('includes/header.php');

?>

<h2>Edit Description</h2>

<form method="post">

  <label for="refid">ReferenceId:</label>
  <input type="text" name="refid" id="refid" value="<?php echo htmlentities($record['refid']); ?>">

  <br>

  <label for="description">Description:</label>
  <input type="text" name="description" id="description" value="<?php echo htmlentities($record['description']); ?>">

  <br>

  <input type="submit" value="Edit Description">

</form>

<p><a href="descs.php"><i class="fas fa-arrow-circle-left"></i> Return to Description List</a></p>


<?php

include('includes/footer.php');

?>