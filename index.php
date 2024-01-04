<?php
    $lifetime = 60 * 60 * 24 * 14;
    session_set_cookie_params($lifetime, '/');
    session_start();
?>
<?php
include "admin/config/config.php";
?>

<?php
 include "pages/header.php";
?>
        
<?php
include "pages/main.php";
?>

<?php
include "pages/footer.php";
?>