<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $image = $block->image != '' ? $block->image : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $image_for_screen = null;
        if ($agent->isDesktop() && $image_background != null) {
            $image_for_screen = $image_background;
        } else {
            $image_for_screen = $image;
        }
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>

    
    
    
    
    
    
    
    
    
    
    
    
    
    

    <div id="banner">
        <section id="slider" class="slider-top">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block banner-top" src="<?php echo e(asset('themes/frontend/website-service/images/banner-top.jpg')); ?>" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption w-100">
                                <div class="bg_page">
                                    <div class="lg-md-6 pl-0">
                                        <h2 class="title">
                                            <?php echo e($title); ?>

                                        </h2>
                                        <p class="d-md-block d-none"><?php echo $brief; ?>

                                        </p>
                                        <div class="box_btn d-flex">
                                            <a href="/lien-he" class=""
                                            >
                                                <button
                                                    class="btn btn-primary btn-big"
                                                >
                                                    Đăng ký tư vấn
                                                </button>
                                            </a
                                            >
                                            <a href="<?php echo e($url_link); ?>" class=""
                                            >
                                                <button
                                                    class="btn btn-secondary btn-big"
                                                >
                                                    <?php echo e($url_link_title); ?>                                                </button>
                                            </a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/banner/styles/static.blade.php ENDPATH**/ ?>