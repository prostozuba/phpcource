<?php
    use Core\Auth;
?>
    <body>

        <?if(Auth::getToken() == true) : ?>
        <a href="<?=$root?>messages/add">Написать</a>
        <? endif;?>
        <hr>
        <a href="<?=$root?>messages/?view=table">Табличный вид</a>
        <hr>
        <br>
        <h2>Список блога</h2>

        <div class="products clearfix">
            <? foreach ($messages as $msg): ?>
                <article class="item">
                    <b><?=$msg['full_name'] ?></b>
                    <hr>
                    <b><?=$msg['name'] ?></b>
                    <br>
<!--                    <div>--><?//=$msg['text'] ?><!--</div>-->
                    <br>
                    <a href="<?=$root?>messages/one/<?=$msg['id_message']?>">Посмотреть</a>
                    <? if(Auth::getToken() == true) : ?>
                    <a href="<?=$root?>messages/update/<?=$msg['id_message']?>">Редактировать</a>
                    <a href="<?=$root?>messages/delete/<?=$msg['id_message']?>">Удалить</a>
                    <? endif;?>
                    <hr>
                    <div class="photo">
                        <img src="<?=$root?>Assets/img/pero.png" alt="">
                    </div>
                    <em><?=$msg['dt'] ?></em>
                </article>
            <?endforeach; ?>
        </div>

    </body>


