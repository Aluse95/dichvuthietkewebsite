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

  <style>
    #banner {
      background-image: url("<?php echo e($image_background); ?>");
      background-position: center top;
      background-repeat: no-repeat;
      background-size: 100%;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      padding: 250px 0 0;
    }
  </style>

  <!-- START BANNE  -->
  <div id="banner">
    <div class="container">
      <h1><?php echo $title; ?></h1>
    </div>
    <div class="container-fluid">
      <div class="swiper banner-p">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image != '' ? $item->image : null;
                $image_background = $item->image_background != '' ? $item->image_background : null;
              ?>

              <div class="swiper-slide">
                <img
                class="lazyload" 
                src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" 
                />
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="swiper banner-m">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <?php if($block_childs): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image != '' ? $item->image : null;
                $image_background = $item->image_background != '' ? $item->image_background : null;
              ?>

              <div class="swiper-slide">
                <img
                class="lazyload" 
                src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" 
                />
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- END BANNER  -->
<?php endif; ?>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/custom_content/styles/content_banner.blade.php ENDPATH**/ ?>