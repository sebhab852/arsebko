<?php
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['login'] = false;
?>

<script>
    unsetActiveUser();
    redirectAfterLogout();
</script>