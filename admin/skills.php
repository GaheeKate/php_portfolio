<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();
if (isset($_GET['delete'])) {
  // Prompt the user for confirmation
  if (isset($_GET['confirm'])) {
    $query = 'DELETE FROM skills
      WHERE id = ' . $_GET['delete'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    // If there are existing joins, they should be deleted
    // here as well/

    set_message('Message has been deleted');

    header('Location: skills.php');
    die();
  } else {
    // If confirm parameter is not set, show a confirmation message
    set_message('Are you sure you want to delete this Description? <a href="?delete=' . $_GET['delete'] . '&confirm=1">Yes</a>');
    header('Location: skills.php');
    die();
  }
}

include('includes/header.php');

$query = 'SELECT *
  FROM skills
  ORDER BY name ASC';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Skills</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="center">URL</th>
    <th align="center">Percent</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td align="center">
        <?php echo $record['id']; ?>
      </td>
      <td align="left">
        <?php echo htmlentities($record['name']); ?>
      </td>

      <td align="center"><a href="skills_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="skills.php?delete=<?php echo $record['id']; ?>">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="skills_add.php"><i class="fas fa-plus-square"></i> Add Skill</a></p>


<?php

include('includes/footer.php');

?>