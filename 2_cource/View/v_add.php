

        <form method="post">
            <br>
            Title
            <br>
            <input type="text" name="name" value="<?=$fields['name']?>">
            <br>
            Content
            <br>
            <textarea name="text" cols="30" rows="10"><?=$fields['text']?></textarea>
            <br>
            <button>Добавить</button>
        </form>
        <?foreach ($errors as $err):?>
            <?='<p>'.$err.'</p>'?>
        <?endforeach;?>

        <a href="<?=$root?>messages">Вернуться на главную</a>


