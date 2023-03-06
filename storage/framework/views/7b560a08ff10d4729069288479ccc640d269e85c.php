<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div id="interface">
    <div class="container">
      <h2><?php echo e($title); ?></h2>
      <p>
        <?php echo e($brief); ?>

      </p>
      <div class="row">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $icon_sub = $item->icon != '' ? $item->icon : null;
            ?>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="interface-item">
                <i class="<?php echo e($icon_sub); ?>"></i>
                <div class="interface-item-text">
                  <h3><?php echo e($title_sub); ?></h3>
                  <p>
                    <?php echo e($content_sub); ?>

                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\Xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_website/styles/website_interface.blade.php ENDPATH**/ ?>