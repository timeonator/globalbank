<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php $page_id = $_GET['id'] ?? ''; ?>
<div id="main">
<?php 
  if(isset($_GET['id'])){
    $page_id = $_GET['id'];
    $page = find_page_by_id($page_id, ['visible' => true]);
    if(!$page){
      redirect_to('/index.php');
    }
    $subject_id = $page['subject_id'];
    $subject = find_subject_by_id($subject_id,['visible' => true]);
    if(!$subject){
      redirect_to('/index.php');
    }    
  } else {

  }


?>
  <?php include(SHARED_PATH . '/public_navigation.php'); ?>

  <div id="page">
    <?php 
    if (isset($page)){
      // TODO add html escaping back in
      echo $page['content'];
    } else {
      include(SHARED_PATH . '/static_homepage.php'); 
    }
    ?>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
