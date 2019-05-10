<!doctype html>

<html lang="en">
  <head>
    <title>Globe Bank <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          <img src="<?php echo url_for('/images/gbi_logo.png'); ?>" width="298" height="71" alt="" />
        </a>
      </h1>
    </header>
    <navigation>
      <ul>
        <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
        <li><a href="<?php echo url_for('/admin/index.php'); ?>">Menu</a></li>
        <li><a href="<?php echo url_for('/staff/logout.php'); ?>">Logout</a></li>
      </ul>
    </navigation>
    display_session_message();
