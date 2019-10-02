<?php
//Error Message
$error = isset($_POST['error']) ? $_POST['error'] : '';
?>

<?php if (isset($_POST['mikrotik-hs'])) : ?>

    <!-- error message -->
    <?php echo $error; ?>
    <!-- end error -->

    <form name="login" action="login.php" method="post">
        <!-- hidden params -->
		<input type="hidden" name="external-login" value="login">
        <input type="hidden" name="mac" value="<?= $_POST['mac'] ?>">
        <input type="hidden" name="ip" value="<?= $_POST['ip'] ?>">
        <input type="hidden" name="link-login" value="<?= $_POST['link-login'] ?>">
        <input type="hidden" name="link-orig" value="<?= $_POST['link-orig'] ?>">
        <input type="hidden" name="error" value="<?= $_POST['error'] ?>">
        <input type="hidden" name="chap-id" value="<?= $_POST['chap-id'] ?>">
        <input type="hidden" name="chap-challenge" value="<?= $_POST['chap-challenge'] ?>">
        <input type="hidden" name="link-login-only" value="<?= $_POST['link-login-only'] ?>">
        <input type="hidden" name="link-orig-esc" value="<?= $_POST['link-orig-esc'] ?>">
        <input type="hidden" name="mac-esc" value="<?= $_POST['mac-esc'] ?>">
        <!-- end hidden params -->

        <input style="width: 80px" name="username" type="hidden" value="<?= $_POST['mac'] ?>">
        <input style="width: 80px" name="password" type="hidden" value="<?= $_POST['mac'] ?>">

        <input type="submit" value="LOGINSS" />
    </form>

<?php else: ?>

Anda mengakses halaman ini tanpa terhubung hotspot, silahkan hubungan perangkat anda dengan jaringan hotspot terlebih dahulu.

<?php endif; ?>
