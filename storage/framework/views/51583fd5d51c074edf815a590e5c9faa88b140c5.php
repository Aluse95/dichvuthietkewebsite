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
  ?>

  <div id="people">
    <div class="container">
      <h2><?php echo e($title); ?></h2>
      <p><?php echo $brief; ?></p>
      <div class="people-leader">
        <?php
          $title_child = $first_child->json_params->title->{$locale} ?? $first_child->title;
          $childs = $blocks->filter(function ($item, $key) use ($first_child) {
            return $item->parent_id == $first_child->id;
          });
        ?>
        <div class="badge">
          <h3><?php echo e($title_child); ?></h3>
        </div>
        <div class="swiper people-leader-p">
          <div class="swiper-wrapper">
            <?php if($childs): ?>
              <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
              ?>

              <div class="swiper-slide">
                <div class="people-leader-img">
                  <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                  data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($brief_sub); ?>" />
                  <div class="people-leader-img-text">
                    <p class="name"><?php echo e($title_sub); ?></p>
                    <p class="duty">-<?php echo e($brief_sub); ?>-</p>
                  </div>
                </div>
              </div> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="swiper people-leader-m">
          <div class="swiper-wrapper">
            <?php if($childs): ?>
              <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
              ?>

              <div class="swiper-slide">
                <div class="people-leader-img">
                  <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                  data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($brief_sub); ?>" />
                  <div class="people-leader-img-text">
                    <p class="name"><?php echo e($title_sub); ?></p>
                    <p class="duty">-<?php echo e($brief_sub); ?>-</p>
                  </div>
                </div>
              </div> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="people-employee">
        <?php
          $title_child_2 = $last_child->json_params->title->{$locale} ?? $last_child->title;
          $childs_2 = $blocks->filter(function ($item, $key) use ($last_child) {
            return $item->parent_id == $last_child->id;
          });
        ?>

        <div class="badge">
            <h3><?php echo e($title_child_2); ?></h3>
        </div>
        <div class="row">
          <?php if($childs_2): ?>
            <?php $__currentLoopData = $childs_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub_2 = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub_2 = $item->image != '' ? $item->image : null;
              ?>

              <div class="col-lg-3 col-sm-6">
                <div class="people-employee-img">
                <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                data-src="<?php echo e($image_sub_2); ?>" alt="<?php echo e($title_child_2); ?>" />
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php if($childs_2): ?>
              <?php $__currentLoopData = $childs_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_sub_2 = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image_sub_2 = $item->image != '' ? $item->image : null;
                ?>

                <div class="swiper-slide">
                  <div class="people-employee-img">
                  <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                  data-src="<?php echo e($image_sub_2); ?>" alt="<?php echo e($title_child_2); ?>" />
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
<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_intro/styles/intro_people.blade.php ENDPATH**/ ?>