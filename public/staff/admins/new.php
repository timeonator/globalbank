<?php

require_once('../../../private/initialize.php');
require_login();

if(is_post_request()) {

  $admin = [];
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_passward'] =  $_POST['confirm_passward'] ?? '';

  $result = insert_admin($admin);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = "New admin was successfully added.";
    redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $admin = [];
  $admin['first_name'] =  '';
  $admin['last_name'] =  '';
  $admin['email'] =  '';
  $admin['username'] =  '';
  $admin['password'] =  '';
  $admin['confirm_passward'] =  '';
}



?>

<?php $page_title = 'Create admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin new">
    <h1>Create admin</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/admins/new.php'); ?>" method="post">
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
        <dt>Password</dt>
        <dd><input type="password" name="password" value="<?php echo $admin['password']; ?>" /></dd>
      </dl>
      <dt>Password</dt>
        <dd><input type="password" name="confirm_passward" value="<?php echo $admin['confirm_passward']; ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create admin" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
