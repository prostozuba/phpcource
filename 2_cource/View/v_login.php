
        <form method="post">
            <div>
            Login
                <br>
            <input type="text" name="login">
            <br>
            Password
                <br>
            <input type="text" name="password">
            </div>
            <div>
                <br>
                <input type="checkbox" name="remember">
                Запомнить меня
            </div>
            <input type="submit" value="ok">
            <br>
            <?foreach ($errors as $err):?>
                <?='<p>'.$err.'</p>'?>
            <?endforeach;?>
            <a href="<?=$root?>messages">Войти на сайт без авторизации</a>
            <hr>
            <a href="<?=$root?>user/reg">Регистрация</a>
        </form>


