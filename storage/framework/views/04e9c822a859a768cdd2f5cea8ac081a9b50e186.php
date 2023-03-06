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

  <div id="why-choose">
    <div class="container">
      <h2>
        <?php echo e($title); ?>

      </h2>
      <p>
        <?php echo $brief; ?>

      </p>
      <div class="why-choose-img">
        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
      </div>
      <div class="why-choose-m">
        <div class="row">
          <div class="col-sm-12">
            <?php if($block_childs): ?>
              <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                  $title_child = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_child = $item->json_params->content->{$locale} ?? $item->content;
                  $image_child = $item->image != '' ? $item->image : null;
                  $icon = $item->icon != '' ? $item->icon : '';
              ?>

              <div class="why-choose-item">
                <i class="<?php echo e($icon); ?>"></i>
                <h3><?php echo e($title_child); ?></h3>
                <p>
                  <?php echo $content_child; ?>

                </p>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH D:\Xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_intro/styles/intro_benefit.blade.php ENDPATH**/ ?>