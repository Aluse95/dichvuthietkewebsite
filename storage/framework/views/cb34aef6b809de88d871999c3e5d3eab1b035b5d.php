<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <style>
    @media (max-width: 540px) {
      #advantage-app .advantage-img {
        display: none;
      }
    }
  </style>

  <div id="advantage-app">
    <div class="container">
      <h2><?php echo e($title); ?></h2>
      <p><?php echo $brief; ?></p>
      <div class="row">
          <div class="col-lg-6">
              <div class="advantage-img">
                  <img
                  class="lazyload" 
                  src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                  data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"
                  />
              </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="advatage-content-list">
              <?php if($block_childs): ?>
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                    $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                    $icon_sub = $item->icon != '' ? $item->icon : null;
                  ?>

                  <div class="advantage-content-item">
                    <i class="<?php echo e($icon_sub); ?>"></i>
                    <div class="advantage-content-item-text">
                      <h3><?php echo e($title_sub); ?></h3>
                      <p>
                        <?php echo $content_sub; ?>

                      </p>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/custom_furniture/styles/furniture_advantage.blade.php ENDPATH**/ ?>