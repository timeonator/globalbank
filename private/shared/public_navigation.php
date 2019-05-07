<navigation>

  <?php $nav_subjects = find_all_subjects(['visible' => true]); ?>
  <ul class="subjects">
    <?php while($nav_subject = mysqli_fetch_assoc($nav_subjects)) { ?>
      <li>
        <a href="<?php echo url_for('index.php'); ?>">
          <?php echo h($nav_subject['menu_name']); ?>
        </a>
        <?php $nav_pages = find_pages_by_subject_id($nav_subject['id'],['visible' => true]); ?>
          <ul class="pages">
            <?php while($nav_page = mysqli_fetch_assoc($nav_pages)) { ?>
            <li class=<?php if($page_id == $nav_page['id']) { echo 'selected'; } ?>>
              <a href="<?php echo url_for('index.php?id='. $nav_page['id']); ?>">
                <?php echo h($nav_page['menu_name']); ?>
              </a>
            </li>
            <?php } // while $nav_page ?>
          </ul>
      </li>
    <?php } // while $nav_subjects ?>
  </ul>
  <?php mysqli_free_result($nav_subjects); ?>
</navigation>
