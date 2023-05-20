<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_GET['delete'])) {
  // Prompt the user for confirmation
  if (isset($_GET['confirm'])) {
    $query = 'DELETE FROM msg
      WHERE id = ' . $_GET['delete'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    // If there are existing joins, they should be deleted
    // here as well/

    set_message('Message has been deleted');

    header('Location: msg.php');
    die();
  } else {
    // If confirm parameter is not set, show a confirmation message
    set_message('Are you sure you want to delete this message? <a href="?delete=' . $_GET['delete'] . '&confirm=1">Yes</a>');
    header('Location: msg.php');
    die();
  }
}









include('includes/header.php');

$query = 'SELECT * FROM msg';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Messages</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Name</th>
    <th align="center">Email</th>
    <th align="center">Message</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['name']; ?></td>
      <td align="left">
        <?php echo htmlentities($record['email']); ?>
      </td>
      <td align="left"><?php echo $record['message']; ?>
      </td>
      <td align="center"><a href="msg_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="msg.php?delete=<?php echo $record['id']; ?>">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>



<?php

include('includes/footer.php');

?>