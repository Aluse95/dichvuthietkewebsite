<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <section id="interface" class="interface">
      <div class="content">
          <div class="text-center">
              <div class="v-title">
                  <h2 class="title">
                      <?php echo e($title); ?>

                  </h2>
              </div>
              <div class="box-description">
                  <p>
                    <?php echo $brief; ?>}
                  </p>
              </div>
          </div>
          <div class="row box-values">
              <?php if($block_childs): ?>
                  <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                          $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                          $icon_sub = $item->icon != '' ? $item->icon : null;
                          $image_child = $item->image != '' ? $item->image : null;
                      ?>
                      <div class="box-values__item col-lg-3 col-md-6 col-12">
                          <div class="title"><?php echo e($title_sub); ?></div>
                          <div class="box-desc pt-3">
                              <p>
                                  <?php echo $content_sub; ?>

                              </p>
                          </div>
                          <div class="img">
                              <div class="text-center">
                                  <img src="<?php echo e($image_child); ?>" alt="Thấu hiểu">
                              </div>
                          </div>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </div>
      </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_website/styles/website_interface.blade.php ENDPATH**/ ?>