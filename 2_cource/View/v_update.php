
    <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">

            <title>Добавление</title>
        </head>
        <body>
        <form method="post">
            title
            <br>
            <input type="text" name="name" value="<?=$message['name']?>">
            <br>
            content
            <br>
            <textarea name="text"><?=$message['text']?></textarea>
            <br>
            <button>Добавить</button>
        </form>
        <?foreach ($errors as $err):?>
            <?='<p>'.$err.'</p>'?>
        <?endforeach;?>
        <a href="<?=$root?>messages">Вернуться на главную</a>
        </body>
    </html>
