<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)
    ->limit(12)
    ->get();
    $m_taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    $datas = $m_taxonomys->chunk(6);
  ?>

  <!-- START CATEGORY -->
  <div id="category">
    <div class="container home-category">
      <h2>
        <i class="<?php echo e($icon); ?>"></i>
        <span><?php echo e($title); ?></span>
      </h2>
      <div class="row p-category">
        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->json_params->image ?? '';
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = $item->alias ?? '';
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
          ?>

          <a href="<?php echo e($alias_category); ?>" class="col-lg-2 col-md-3 col-sm-4 category-item">
            <div class="category-item-img">
              <img class="img-fluid w-100 h-100 lazyload" 
              src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
              data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
            </div>
            <p><?php echo e($title); ?></p>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="m-category swiper">
        <div class="swiper-wrapper">
          <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <div class="container">
                <div class="row">
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->json_params->image ?? '';
                      $date = date('H:i d/m/Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                      $alias = $item->alias ?? '';
                      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                    ?>

                    <div class="col-4">
                      <a href="<?php echo e($alias_category); ?>" class="category-item">
                        <div class="category-item-img">
                          <img class="img-fluid w-100 h-100 lazyload" 
                          src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
                          data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                        </div>
                        <p><?php echo e($title); ?></p>
                      </a>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom/styles/category.blade.php ENDPATH**/ ?>