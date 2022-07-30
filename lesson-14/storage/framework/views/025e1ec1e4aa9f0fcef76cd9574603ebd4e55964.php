<!DOCTYPE html>
<head>
    <title>Посты</title>
</head>
<body>
    <?php $__currentLoopData = $Posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($post->name); ?></h3>
        <a href="/post/<?php echo e($post->id); ?>"><?php echo e($post->title); ?> </a>
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
<?php /**PATH /home/maxusmax/server/html/backed_lesson/lesson-14/resources/views/Posts.blade.php ENDPATH**/ ?>