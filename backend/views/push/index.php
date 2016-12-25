<div class="article-form">
<?php if(!empty($_GET['send']) &&  $_GET['send'] == 'Y') { ?>
    <div class="alert alert-success">
        <strong>Успешно!</strong> Сообщения успешно отправлены
    </div>
    <?php } ?>
    <form action="/push/send/" method="post">
        <div class="form-group">
            <label class="control-label" for="article-category_id">Выберите статью</label>
            <select name="id" class="form-control" id="article-category_id">
                <?php foreach ($result as $item) { ?>
                    <option value="<?php echo $item['id'] ?>"><?php echo $item['title'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
</div>