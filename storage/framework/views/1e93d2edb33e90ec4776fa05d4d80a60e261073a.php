<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
    <?php if(request()->is('/')): ?>
        <style>
            #reason.box-bg .bg {
                position: relative;
                padding: 166px 0;
            }
        </style>
    <?php else: ?>
        <style>
            #reason.box-bg .bg {
                position: relative;
                padding: 0;
            }
        </style>
    <?php endif; ?>
    <section id="reason" class="why-choose-us box-bg">
        <div class="why-choose bg">
            <div class="card text-white">
                <img class="card-img" src="<?php echo e($image); ?>" alt="Card image">
                <div class="container card-img-overlay">
                    <div class="v-title text-center">
                        <div class="box-title text-white">
                            <span>/</span>
                            <span>Why choose us</span>
                        </div>
                        <h2 class="title">
                            <?php echo e($title); ?>

                        </h2>
                    </div>
                    <div class="content d-flex">
                        <?php if($block_childs): ?>
                            <?php $count = 1; ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_child = $item->image != '' ? $item->image : null;
                                    $url_link = $item->url_link != '' ? $item->url_link : '';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon = $item->icon != '' ? $item->icon : '';
                                    $style = $item->json_params->style ?? '';
                                     // Xác định class cột dựa vào biến đếm $count
                                     $column_class = 'col-lg-4 col-4 px-0';
                                     if ($count === 1) {
                                         $column_class = 'col-lg-2 col-3 px-0';
                                     } elseif ($count === 2) {
                                         $column_class = 'col-lg-8 col-6';
                                     } elseif ($count === 3){
                                         $column_class = 'col-lg-2 col-3 px-0';
                                     }
                                     // Tăng biến đếm sau mỗi vòng lặp
                                     $count++;
                                ?>
                                <div class="<?php echo e($column_class); ?>">
                                    <p class="number content-name" data-number="<?php echo e($brief_child); ?>"><?php echo e($brief_child); ?>

                                        +</p>
                                    <p class="text"><?php echo e($title_child); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_intro/styles/intro_reason.blade.php ENDPATH**/ ?>