<?php 
session_start();
session_destroy();
echo '<meta http-equiv="Refresh" content="0;url=http://localhost/kereta/index.php?msg=' . urlencode(base64_encode('You have been successfully logged out!')) . '">';
