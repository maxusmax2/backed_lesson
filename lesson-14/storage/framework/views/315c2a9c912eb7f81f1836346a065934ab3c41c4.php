<!DOCTYPE html>
<head>
    <title>Комменты</title>
</head>
<body>
<?php $__currentLoopData = $Comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($key); ?>

<h3><?php echo e($comment->name); ?></h3>
<p><?php echo e($comment->body); ?></p>
<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
<?php /**PATH /home/maxusmax/server/html/backed_lesson/lesson-14/resources/views/comments.blade.php ENDPATH**/ ?>