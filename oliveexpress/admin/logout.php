<?php
session_start();
session_destroy();

echo"<script>
window.location.assign('admin/index.php')
</script>";

?>