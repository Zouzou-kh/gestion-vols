<?php

?>
<div class="">
  <?php if (!isset($_SESSION['is_connected'])): ?>
      <a href="../views/login.php" class="login text-left btn btn-sm">Login</a>
  <?php else: ?>
      <a href="logout.php" class=" logout btn btn-sm">logout</a>
      <?php if ($_SESSION['username']): ?>
      <a href="reservation_table.php" class="reserve btn btn-sm">Reservation</a>
      <?php endif?>
    <?php endif?>
</div>