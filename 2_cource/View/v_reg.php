
    <form method="post">
        Ф.И.О
        <br>
        <input type="text" name="name">
        <br>
        <br>
        Login
        <br>
        <input type="text" name="login">
        <br>
        <br>
        Password
        <br>
        <input type="text" name="password">
        <br>
        <br>
        <button>Регистрация</button>
        <br>
    </form>
    <?foreach ($errors as $err):?>
        <?='<p>'.$err.'</p>'?>
    <?endforeach;?>
    <br>

    <a href="<?=$root?>user/login">Вернуться на Login</a>
