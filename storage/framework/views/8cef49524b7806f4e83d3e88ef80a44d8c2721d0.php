<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div id="project">
    <div class="container">
      <h2>
        <span><?php echo e($title); ?></span>
      </h2>
      <div class="p-project row">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              $alias = $item->url_link ?? '';
              $link_demo = $item->json_params->link_demo ?? '';
            ?>
  
            <div class="col-lg-4 col-md-6 col-sm-12 project-item">
              <div class="project-wrap">
                <div class="project-item-img">
                  <img
                  class="lazyload" 
                  src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                  data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"
                  />
                  <?php if($link_demo): ?>
                    <a href="<?php echo e($link_demo); ?>" class="demo-btn">Xem Demo</a>
                  <?php endif; ?>
                  <a href="<?php echo e($alias); ?>" class="detail-btn">Xem chi tiết</a>
                </div>
                <a href="<?php echo e($alias); ?>" class="project-item-title"><?php echo e($title_sub); ?></a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="<?php echo e($url_link); ?>" class="button"
            ><?php echo e($url_link_title); ?><i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="m-project row">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              $alias = $item->url_link ?? '';
              $link_demo = $item->json_params->link_demo ?? '';
            ?>
  
            <div class="col-lg-6 col-md-6 col-sm-6 project-item">
              <div class="project-wrap">
                <div class="project-item-img">
                  <img
                  class="lazyload" 
                  src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                  data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"
                  />
                  <?php if($link_demo): ?>
                    <a href="<?php echo e($link_demo); ?>" class="demo-btn">Xem Demo</a>
                  <?php endif; ?>
                  <a href="<?php echo e($alias); ?>" class="detail-btn">Xem chi tiết</a>
                </div>
                <a href="<?php echo e($alias); ?>" class="project-item-title"><?php echo e($title_sub); ?></a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="<?php echo e($url_link); ?>" class="button"
            ><?php echo e($url_link_title); ?><i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/custom_furniture/styles/furniture_project.blade.php ENDPATH**/ ?>