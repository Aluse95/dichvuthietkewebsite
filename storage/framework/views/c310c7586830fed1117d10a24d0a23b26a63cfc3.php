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

  <section id="why-choose" class="why_choose">
      <div class="content">
          <div class="text-center">
              <div class="v-title">
                  <h2 class="title">
                      <?php echo $title; ?>

                  </h2>
              </div>
              <div class="box-description">
                  <p>
                      <?php echo $brief; ?>

                  </p>
              </div>
          </div>
          <div class="row box-values">
              <?php if($block_childs): ?>
                  <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title_child = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                          $content_child = $item->json_params->content->{$locale} ?? $item->content;
                          $image_child = $item->image != '' ? $item->image : null;
                          $icon = $item->icon != '' ? $item->icon : '';
                      ?>
              <div class="box-values__item col-lg-4 col-12">
                  <div class="box-img">
                      <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                           data-src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                  </div>
                  <div class="title"><?php echo e($title_child); ?>

                  </div>
                  <div class="box-desc pt-3">
                      <p>
                          <?php echo $content_child; ?>

                      </p>
                  </div>
              </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </div>
      </div>
  </section>

<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_intro/styles/intro_why_choose.blade.php ENDPATH**/ ?>