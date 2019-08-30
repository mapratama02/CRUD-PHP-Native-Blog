<div id="sidebar">
  <span class="sidebar-header">
    Uji Level
  </span>

  <?php if ($_SESSION['user_role'] == 1) : ?>
    <ul class="tree">
      <li class="tree-menu">
        <span class="tree-header">Admin</span>
      </li>
      <li class="tree-menu"><a href="dashboard.php" class="tree-link">Dashboard</a></li>
      <li class="tree-menu"><a href="add_user.php" class="tree-link">Add User</a></li>
    </ul>
  <?php endif; ?>

  <ul class="tree">
    <li class="tree-menu"><span class="tree-header">User</span></li>
    <li class="tree-menu"><a href="user.php" class="tree-link">User</a></li>
    <li class="tree-menu"><a href="user_edit.php" class="tree-link">Edit user</a></li>
    <!-- <li class="tree-menu"><a href="user_password.php" class="tree-link">Edit password</a></li> -->
    <li class="tree-menu"><a href="subscription.php" class="tree-link">Subscription</a></li>
    <li class="tree-menu"><a href="logout.php" class="tree-link">Logout</a></li>
  </ul>

  <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 3) : ?>
    <ul class="tree">
      <li class="tree-menu"><span class="tree-header">Writter</span></li>
      <li class="tree-menu"><a href="post.php" class="tree-link">Create post</a></li>
      <li class="tree-menu"><a href="all_post.php" class="tree-link">All post</a></li>
      <li class="tree-menu"><a href="deleted_post.php" class="tree-link">Deleted post</a></li>
    </ul>
  <?php endif; ?>
</div>