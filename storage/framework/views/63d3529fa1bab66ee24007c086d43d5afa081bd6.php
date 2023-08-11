<?php
    $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];

    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
?>
<?php if(isset($taxonomys)): ?>
    <div class="blog-category">
    <div class="blog-category__title"><?php echo app('translator')->get('Post category'); ?></div>
    <div class="blog-category__button">
        <div class="box_btn d-flex">
            <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->parent_id != 0 || $item->parent_id != null): ?>
                    <?php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy->title,$item->id, null , $item->title);
                        $url_current = url()->full();
                        $current = $alias_category == $url_current ? 'current-nav-item' : '';
                    ?>
                    <a href="<?php echo e($alias_category); ?>" title="<?php echo e($title); ?>">
                        <button class="btn btn-primary btn-tiny">
                            <?php echo e(Str::limit($title, 30)); ?>

                        </button>
                    </a>










                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php
    $params_product['status'] = App\Consts::POST_STATUS['active'];
    $params_product['is_type'] = App\Consts::POST_TYPE['post'];
    $params_product['order_by'] = 'id';

    $recents = App\Http\Services\ContentService::getCmsPost($params_product)
        ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
        ->get();
?>
<?php if(isset($recents)): ?>
<div class="blog-news">
    <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
             $date = date('d', strtotime($item->created_at));
             $month = date('M', strtotime($item->created_at));
             $year = date('Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
        ?>
    <div class="blog-news__item">
        <a href="<?php echo e($alias); ?>" title="<?php echo e($title); ?>">
            <div class="content text-left bora-10">
                <div class="img">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
                </div>
                <p class="date">
                    <?php echo e($date); ?>/<?php echo e($month); ?>/<?php echo e($year); ?>

                </p>
                <h3 class="title line-two">
                    <?php echo e($title); ?>

                </h3>
            </div>
        </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>























<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/components/sidebar/post.blade.php ENDPATH**/ ?>