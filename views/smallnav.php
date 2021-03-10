<?php
?>
<div class="small">
  <?php if (!isset($_SESSION['is_connected'])): ?>
      <a href="../views/login.php" class="login btn btn-sm">Login</a>
  <?php else: ?>
        <a href="logout.php" class=" logout btn btn-sm">logout</a>
        <?php if ($_SESSION['role'] == 1): ?>
        <a href="admin_dash.php" class="reserve btn btn-sm">Reservation</a>
        <?php elseif ($_SESSION['role'] == 0): ?>
        <a href="client_dash.php" class="reserve btn btn-sm">Mes Reservation</a>
        <?php endif?>
    <?php endif?>
</div>