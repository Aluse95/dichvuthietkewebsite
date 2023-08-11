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
    ->limit(10)
    ->get();
    $m_taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    $datas = $m_taxonomys->chunk(6);
  ?>

  <!-- START CATEGORY -->
      <section id="category" class="category">
          <div class="container">
              <div class="v-title text-center">
                  <div class="box-title">
                      <span>/</span>
                      <span>Our categories</span>
                  </div>
                  <h2 class="title">
                      <?php echo e($title); ?>

                  </h2>
              </div>
              <div class="category-list row">
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
                  <div class="category-list__item col-4 col-lg-20">
                      <div class="content text-center">
                          <div class="img">
                              <img class="img-fluid w-100 h-100 lazyload"
                                   src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                                   data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">                          </div>
                          <p class="title text-center text-uppercase font-weight-bold line-one">
                              <?php echo e($title); ?>

                          </p>
                      </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="template-detail-button text-center">
                  <a href="#" class="nav-link">
                      <button class="btn btn-primary btn-medium">
                          Xem toàn bộ Ngành hàng
                      </button>
                  </a>
              </div>
          </div>
      </section>
  <!-- END CATEGORY -->
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom/styles/category.blade.php ENDPATH**/ ?>