
<!DOCTYPE html>
<head>
    <title> Пост<?php echo e($title); ?></title>
</head>
<body>

    <h1><?php echo e($title); ?></h1>
    <h2><?php echo e($userName); ?></h2>
    <p><?php echo e($body); ?></p>
    <hr>
    <h2>Комментарии</h2>
    <h3>Написать комментарий</h3>
    <form method="POST" action="/createComment">
        <?php echo csrf_field(); ?>
        <input name="post_id" type="hidden" value="<?php echo e($id); ?>">
        <input name="name">
        <textarea name="body" cols="30" rows="10"></textarea>
        <button type="submit">Отправить</button>

    </form>
    <?php $__currentLoopData = $Comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h3><?php echo e($comment->name); ?></h3>
    <p><?php echo e($comment->body); ?></p>
    <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
<?php /**PATH /home/maxusmax/server/html/backed_lesson/lesson-14/resources/views/Post.blade.php ENDPATH**/ ?>