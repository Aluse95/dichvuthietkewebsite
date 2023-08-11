<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });

  ?>

  <section id="client-home" class="our-partners">
      <div class="container">
          <div class="v-title text-center">
              <div class="box-title">
                  <span>/</span>
                  <span>Our partners</span>
              </div>
              <h2 class="title">
                  <?php echo e($title); ?>

              </h2>
          </div>
          <div class="customer-logos slider">
              <?php if($block_childs): ?>
                  <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title = $item->json_params->title->{$locale} ?? $item->title;
                          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image = $item->image != '' ? $item->image : null;
                          $url_link = $item->url_link != '' ? $item->url_link : '';
                          $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                          $icon = $item->icon != '' ? $item->icon : '';
                          $style = $item->json_params->style ?? '';
                      ?>
                      <div class="slide">
                          <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                               data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </div>
      </div>
  </section>
<?php endif; ?>


<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/banner/styles/logo_partner.blade.php ENDPATH**/ ?>