<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $image = $block->image != '' ? $block->image : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

        <!-- START BANNE  -->
    <section class="slider-title">
        <div class="bg_page position-relative">
            <div class="img">
                <img class="d-block w-100" src="<?php echo e($image); ?>" alt="banner">
            </div>
            <div class="container">
                <div class="content-page">
                    <div class="text-left">
                        <h2 class="title pb-lg-3">
                            <?php echo e($title); ?>

                        </h2>
                        <p class="d-md-block d-none">
                            <?php echo $brief; ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BANNER  -->
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_service/styles/service_banner.blade.php ENDPATH**/ ?>