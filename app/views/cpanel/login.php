<form autocomplete="off" action="<?php echo BASE_URL ?>/login/authentication_login" method="post">
    <?php
    if (isset($msg)) {
        echo '<span style="color:red; font-weight:bold;">' . $msg . '</span>';
    }
    ?>

    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required="1"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" required="1"></td>
        </tr>
        <tr>
            <td><input type="submit" name="login" value="Login"></td>
        </tr>
    </table>
</form>