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

  <div id="advice">
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
              $image_sub = $item->json_params->image ?? $item->image ?? '';
              $icon_sub = $item->icon != '' ? $item->icon : null;
            ?>

            <div class="col-lg-6 col-sm-12">
              <div class="advice-item">
                <div class="advice-item-img">
                  <img src="<?php echo e($image_sub); ?>" alt="<?php echo $title_sub; ?>"/>
                </div>
                <div class="advice-item-text">
                  <h3><?php echo $title_sub; ?></h3>
                  <ul>
                    <?php echo $content_sub; ?>

                  </ul>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/custom_website/styles/website_advice.blade.php ENDPATH**/ ?>