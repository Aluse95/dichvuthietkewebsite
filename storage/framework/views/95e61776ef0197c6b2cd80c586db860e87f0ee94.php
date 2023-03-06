
<rss version="2.0">

<channel>

    <title>Dịch vụ thiết kế website</title>
    <link><?php echo e(url('/')); ?></link>
    <description>Dichvuthietkewebsite RSS</description>
    <?php if(isset($posts)): ?>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <item>
            <title><?php echo e($post->title); ?></title>
            <pubDate><?php echo e($post->updated_at); ?></pubDate>
            <link><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></link>
            <guid><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></guid>
        </item>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(isset($recents)): ?>
    <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <item>
            <title><?php echo e($post->title); ?></title>
            <pubDate><?php echo e($post->updated_at); ?></pubDate>
            <link><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></link>
            <guid><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></guid>
        </item>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(isset($mostViews)): ?>
    <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <item>
            <title><?php echo e($post->title); ?></title>
            <pubDate><?php echo e($post->updated_at); ?></pubDate>
            <link><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></link>
            <guid><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></guid>
        </item>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(isset($featured)): ?>
    <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <item>
            <title><?php echo e($post->title); ?></title>
            <pubDate><?php echo e($post->updated_at); ?></pubDate>
            <link><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></link>
            <guid><?php echo e(url('/')); ?>/<?php echo e($post->alias); ?></guid>
        </item>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    <?php endif; ?>

</channel>

</rss>
<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/rss/detail.blade.php ENDPATH**/ ?>