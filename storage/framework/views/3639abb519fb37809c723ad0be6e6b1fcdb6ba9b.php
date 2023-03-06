<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    
    $rows = App\Http\Services\ContentService::getCmsPost($params)
      ->limit(6)
      ->get();
  ?>

  <!-- START PROJECT -->
  <div id="project">
    <div class="container">
      <h2>
        <span><?php echo e($title); ?></span>
      </h2>
      <div class="p-project row">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->json_params->image ?? $item->image ?? '';
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
          ?>

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
              <a href="<?php echo e($alias); ?>" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="<?php echo e($alias); ?>" class="project-item-title"><?php echo e($title); ?></a>
          </div>         
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="<?php echo e($url_link); ?>" class="button"
            ><?php echo e($url_link_title); ?><i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="m-project row">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->json_params->image ?? $item->image ?? '';
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
          ?>

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-item-img">
              <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
              <a href="<?php echo e($alias); ?>" class="detail-btn">Xem chi tiết</a>
            </div>
            <a href="<?php echo e($alias); ?>" class="project-item-title"><?php echo e($title); ?></a>
          </div>         
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="<?php echo e($url_link); ?>" class="button"
            ><?php echo e($url_link_title); ?><i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- END PROJECT -->
<?php endif; ?>
<?php /**PATH D:\Xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_seo/styles/seo_project.blade.php ENDPATH**/ ?>