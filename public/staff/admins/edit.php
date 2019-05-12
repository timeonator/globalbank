<?php

require_once('../../../private/initialize.php');
require_login();


if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/admins/index.php'));
}

$id = $_GET['id'] ?? '';

if(is_post_request()) {
  $admin = [];
  $admin['id']=$id;
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['hashed_password'] = $_POST['hashed_password'] ?? '';

  $result = update_admin($admin);
  if($result === true) {
    $_SESSION['message'] =  "Admin updated successfully.";  
 //   redirect_to(url_for('/staff/admins/show.php?id=' . $id));
  } else {
    $errors = $result;
  }

} else {

  $admin = find_admin_by_id($id);

}

$admin_set = find_all_admins();
$admin_count = mysqli_num_rows($admin_set);
mysqli_free_result($admin_set);

?>

<?php $page_title = 'Edit admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Edit admin</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($id))); ?>" method="post">
    <dl>
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo $admin['first_name']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo $admin['last_name']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="email" value="<?php echo $admin['email']; ?>" /></dd>
      </dl>
      <dl>
        <dt>User Name</dt>
        <dd><input type="text" name="username" value="<?php echo $admin['username']; ?>" /></dd>
      </dl>
      <dl>

      <div id="operations">
        <input type="submit" value="Edit admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
