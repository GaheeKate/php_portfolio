<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_GET['delete'])) {

  $query = 'DELETE FROM education
    WHERE id = ' . $_GET['delete'] . '
    LIMIT 1';
  mysqli_query($connect, $query);

  // If there are existing joins, they should be deleted
  // here as well/

  set_message('Education has been deleted');

  header('Location: education.php');
  die();
}

include('includes/header.php');

$query = 'SELECT *
  FROM education';
$result = mysqli_query($connect, $query);

?>

<h2>Manage Educations</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">SchoolName</th>
    <th align="left">Type</th>
    <th align="center">CourseName</th>
    <th align="center">Period</th>
    <th></th>
    <th></th>
  </tr>
  <?php while ($record = mysqli_fetch_assoc($result)) : ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['SchoolName']; ?></td>
      <td align="left">
        <?php echo htmlentities($record['CertType']); ?>
      </td>
      <td align="left"><?php echo $record['CourseName']; ?>
      </td>
      <td align="center"><?php echo ($record['Period']); ?></td>
      <td align="center"><a href="education_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="education.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this skill?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="education_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>


<?php

include('includes/footer.php');

?>