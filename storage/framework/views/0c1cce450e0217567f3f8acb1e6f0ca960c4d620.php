<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $first_child = $block_childs->first();
    $last_child = $block_childs->last();
    $childs = $block_childs->filter(function ($value, $key) use ($block_childs, $first_child) {
      return $value->id != $first_child->id;
    });
    $datas = $childs->chunk(2)
  ?>

  <div id="point">
    <div class="container">
      <h2><?php echo e($title); ?></h2>
      <div class="point-pc">
        <div class="point-container">
          <div class="point-heading-row">
            <div class="row">
              <div class="col-lg-12">
                <div class="point-heading active">
                  <h3><?php echo e($first_child->json_params->title->{$locale} ?? $first_child->title); ?></h3>
                  <i class="<?php echo e($first_child->icon != '' ? $first_child->icon : null); ?>"></i>
                </div>
              </div>
            </div>
          </div>
          <?php if($datas): ?>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="point-heading-row">
                <div class="row">
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                      $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                      $image_sub = $item->json_params->image ?? $item->image ?? '';
                      $icon_sub = $item->icon != '' ? $item->icon : null;
                      $order = $item->iorder != '' ? $item->iorder : null;
                      $col = $item->id == $last_child->id ? 'col-lg-12' : 'col-lg-6';
                    ?>
  
                    <?php if($order %2 == 0): ?>
                      <div class="<?php echo e($col); ?>">
                        <div class="point-heading">
                          <h3><?php echo $title_sub; ?></h3>
                          <i class="<?php echo e($icon_sub); ?>"></i>
                        </div>
                      </div>
                    <?php else: ?>
                      <div class="<?php echo e($col); ?>">
                        <div class="point-heading">
                          <i class="<?php echo e($icon_sub); ?>"></i>
                          <h3><?php echo $title_sub; ?></h3>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <div class="point-content">
            <?php if($block_childs): ?>
              <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $image_sub = $item->json_params->image ?? $item->image ?? '';
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                  $active = $item->id == $first_child->id ? 'active' : '';
                ?>
                
                <div class="point-content-item <?php echo e($active); ?>">
                  <h3><?php echo $title_sub; ?></h3>
                  <p>
                    <?php echo $content_sub; ?>

                  </p>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="point-m">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php if($block_childs): ?>
              <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $image_sub = $item->json_params->image ?? $item->image ?? '';
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                  $active = $item->id == $first_child->id ? 'active' : '';
                ?>

                <div class="swiper-slide">
                  <div class="point-heading">
                    <i class="fa-solid fa-list-check"></i>
                    <h3><?php echo $title_sub; ?></h3>
                    <p>
                      <?php echo $content_sub; ?>

                    </p>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_convert/styles/convert_point.blade.php ENDPATH**/ ?>