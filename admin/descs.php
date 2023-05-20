<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_GET['delete'])) {

  $query = 'DELETE FROM descs
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);

  // If there are existing joins, they should be deleted
  // here as well/

  set_message('Education has been deleted');

  header('Location: descs.php');
  die();
}

include('includes/header.php');

$query = 'SELECT *
  FROM descs';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Descriptions</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">ReferenceId</th>
    <th align="left">Descriptions</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['refid']; ?></td>
      <td align="left">
        <?php echo htmlentities($record['description']); ?>
      </td>

      <td align="center"><a href="descs_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="descs.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this skill?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="descs_add.php"><i class="fas fa-plus-square"></i> Add Description</a></p>


<?php

include('includes/footer.php');

?>