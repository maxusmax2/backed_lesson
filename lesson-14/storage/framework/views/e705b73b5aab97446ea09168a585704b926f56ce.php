
<!DOCTYPE html>
<head>
    <title>Создание Поста</title>
</head>
<body>
    <form method="POST" action="/createPost" >
        <?php echo csrf_field(); ?>
        <input type="text" name="name">
        <input type="text" name='title'>
        <br>
        <textarea name='body'></textarea>
        <br>
        <button type="submit">Опубликовать</button>
    </form>
</body>
<?php /**PATH /home/maxusmax/server/html/backed_lesson/lesson-14/resources/views/form.blade.php ENDPATH**/ ?>