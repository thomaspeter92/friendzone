<?php
ob_start();
?>


<div class="d-flex justify-content-center">
  <h1>404: Page not found!</h1>
</div>

<?php

$content = ob_get_clean();
require_once('./view/layout/layout.php');
