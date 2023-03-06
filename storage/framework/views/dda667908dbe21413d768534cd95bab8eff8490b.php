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
    $blocks = $block_childs->chunk(2);
  ?>

  <div id="slogan">
    <div class="container">
      <h2>
        <?php echo e($title); ?>

      </h2>
      <p>
        <?php echo $brief; ?>

      </p>
      <div class="slogan-list-container">
        <?php if($blocks): ?>
          <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
            <div class="slogan-list">
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $image_sub = $item->json_params->image ?? $item->image ?? '';
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                ?>
                
                <div class="slogan-item">
                  <div class="slogan-text">
                    <h3>
                      <?php echo $title_sub; ?>

                    </h3>
                    <p>
                      <?php echo $content_sub; ?>

                    </p>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH D:\Xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_convert/styles/convert_slogan.blade.php ENDPATH**/ ?>