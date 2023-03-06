<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(6)
        ->get();
  ?>

  <div id="blog">
    <div class="container">
      <h2><?php echo e($title); ?></h2>
      <div class="blog-pc">
        <div class="row">
          <?php if($rows): ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                $image_sub = $item->image != '' ? $item->image : null;
                $icon_sub = $item->icon != '' ? $item->icon : null;
                $alias = $item->alias ?? '';
              ?>

              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-item">
                  <a href="<?php echo e($alias); ?>" class="blog-item-img">
                    <img class="lazyload" 
                    src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                    data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"
                    />
                  </a>
                  <div class="blog-item-text">
                    <a href="<?php echo e($alias); ?>"><?php echo e($title_sub); ?></a>
                    <p>
                      <?php echo e(Str::limit($brief_sub, 100)); ?>

                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="blog-m">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php if($rows): ?>
              <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $image_sub = $item->image != '' ? $item->image : null;
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                  $alias = $item->alias ?? '';
                ?>

                <div class="swiper-slide">
                  <div class="blog-item">
                    <a href="<?php echo e($alias); ?>" class="blog-item-img">
                      <img
                      class="lazyload" 
                      src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                      data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"
                      />
                    </a>
                    <div class="blog-item-text">
                      <a href="<?php echo e($alias); ?>"><?php echo e($title_sub); ?></a>
                      <p>
                        <?php echo Str::limit($brief_sub, 100); ?>

                      </p>
                    </div>
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
<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>