<?php
use Core\Auth;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <link href="<?=$root?>assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="<?=$root?>assets/css/styles.css" rel="stylesheet" type="text/css">
    <title><?=$title?></title>

</head>
<body>

<div id="wrapper">
    <header>
        <div class="wrapper clearfix">
            <div class="logo">
                <div class="image">
                    <img src="<?=$root?>assets/img/owerworld.png" alt="">
                </div>
                <div class="slogan">
                    <div class="title">Тестовое задание</div>
                    <div class="subtitle">С каждым днем мы становимся лучше</div>
                </div>
            </div>
            <div class="phone">(....) 937 99 92</div>
        </div>
    </header>
    <nav>
        <div class="wrapper">
            <label class="menu_toggle" for="some-btn">
                Меню
            </label>
            <input type="checkbox" id="some-btn">
            <ul>
                <li><a href="<?=$root?>messages">Главная</a></li>
                <li><a href="<?=$root?>pages/contacts">Контакты</a></li>
                <li><a href="<?=$root?>pages/feedback">Форма</a></li>
                <? if(Auth::getToken() == false): ?>
                    <li><a href="<?=$root?>user/login/">Войти</a></li>
                <? else: ?>
                    <li><a href="<?=$root?>user/logout/" >Выйти (<?=$user['login']?>)</a></li>
                <? endif; ?>
            </ul>
        </div>
    </nav>
    <section class="content">
        <div class="wrapper clearfix">
            <aside class="left clearfix">
                <div class="col">
                    <span class="h3">Для пользователя</span>
                    <ul>
                        <li><a href="#">Мой кабинет</a></li>
                        <li><a href="#">Найти пользователя</a></li>
                        <li><a href="#">Что-то еще</a></li>
                        <li><a href="#">Новинки</a></li>
                        <li><a href="#">Новости</a></li>
                    </ul>
                </div>
                <div class="col">
                    <span class="h3">Для администратора</span>
                    <ul>
                        <li><a href="#">Править</a></li>
                        <li><a href="#">Заблокировать</a></li>
                        <li><a href="#">Удалить пользователя</a></li>
                        <li><a href="#">Нарушения</a></li>
                        <li><a href="#">Обратиться к проотцам сайта</a></li>
                    </ul>
                </div>
            </aside>
            <main>
                <h1><?=$title?></h1>
                <section>
                    <?=$content?>
                </section>
                <section>
                    <h2>Отзывы</h2>
                    <div> (0344) 0934 3411 622</div>
                </section>
            </main>
        </div>
    </section>
    <footer>
        <div class="wrapper">
            <span class="copy">&copy; Тестовое задание <?=date('Y')?>, все права защищены!</span>
        </div>
    </footer>
</div>
</body>
</html>
