<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $taxonomy_description = $taxonomy->json_params->brief->{$locale} ?? $taxonomy->brief;

  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
?>

<?php $__env->startSection('content'); ?>
  
  <div class="blog">
      <section class="slider-title">
          <div class="bg_page position-relative">
              <div class="img">
                  <img class="d-block w-100" src="<?php echo e(asset('themes/frontend/website-service/images/bg_blog.jpg')); ?>" alt="banner">
              </div>
              <div class="container">
                  <div class="content-page">
                      <div class="text-left">
                          <h2 class="title pb-lg-3">
                              <?php echo e($page_title); ?>

                          </h2>
                          <p class="d-md-block d-none">
                              <?php echo $taxonomy_description; ?>

                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <?php
          $params_product['status'] = App\Consts::POST_STATUS['active'];
          $params_product['is_type'] = App\Consts::POST_TYPE['post'];
          $params_product['order_by'] = 'count_visited';

          $mostViews = App\Http\Services\ContentService::getCmsPost($params_product)
              ->limit(6)
              ->get();
      ?>
      <?php if(isset($mostViews)): ?>
          <section class="category news-list">
              <div class="container">
                  <div class="v-title text-center">
                      <h2 class="title">
                          <?php echo app('translator')->get('Most viewed post'); ?>
                      </h2>
                  </div>
                  <div class="category-list row">
                      <?php $__currentLoopData = $mostViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                              $title = $item->json_params->title->{$locale} ?? $item->title;
                              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                              $date = date('d', strtotime($item->created_at));
                              $month = date('M', strtotime($item->created_at));
                              $year = date('Y', strtotime($item->created_at));
                              // Viet ham xu ly lay slug
                              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                          ?>
                          <div class="category-list__item col-lg-4 col-6">
                              <a href="<?php echo e($alias); ?>">
                                  <div class="content text-left bora-10">
                                      <div class="img-animation">
                                          <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                                               data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                                      </div>
                                      <p class="date">
                                          <?php echo e($date); ?>/<?php echo e($month); ?>/<?php echo e($year); ?>

                                      </p>
                                      <h3 class="title line-two">
                                          <?php echo e($title); ?>

                                      </h3>
                                  </div>
                              </a>
                          </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              </div>
          </section>
      <?php endif; ?>
      <?php
          $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
          $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];

          $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
      ?>
      <?php if(isset($taxonomys)): ?>
      <section class="article-list">
          <div class="card text-white">
              <img class="card-img" src="<?php echo e(asset('themes/frontend/website-service/images/bg-service.jpg')); ?>" alt="Card image">
              <div class="container card-img-overlay">
                  <div class="v-title text-center">
                      <h2 class="title">
                          Danh mục bài viết
                      </h2>
                  </div>
                  <div class="box_btn d-flex">
                      <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item->parent_id != 0 || $item->parent_id != null): ?>
                              <?php
//                                dd($taxonomy);
                                  $title = $item->json_params->title->{$locale} ?? $item->title;
//                                  $alias_category = App\Helpers::generateRoute($item->taxonomy, $item->alias ?? $item->title, $item->id);
                                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy->title,$item->id, null , $item->title);
                                  $url_current = url()->full();
                                  $current = $alias_category == $url_current ? 'current-nav-item' : '';
                              ?>
                              <a href="<?php echo e($alias_category); ?>" title="<?php echo e($title); ?>">
                                  <button class="btn btn-primary btn-tiny">
                                      <?php echo e(Str::limit($title, 30)); ?>

                                  </button>
                              </a>
                          <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              </div>
          </div>
      </section>
      <?php endif; ?>
      <section class="category news-list">
          <div class="container">
              <div class="v-title text-center">
                  <h2 class="title">
                      Tin tức
                  </h2>
              </div>
              <div class="category-list row">
                  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title = $item->json_params->title->{$locale} ?? $item->title;
                          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                          // $date = date('H:i d/m/Y', strtotime($item->created_at));
                          $date = date('d', strtotime($item->created_at));
                          $month = date('M', strtotime($item->created_at));
                          $year = date('Y', strtotime($item->created_at));
                          // Viet ham xu ly lay slug
                          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id, null, $item->taxonomy_alias ?? $item->taxonomy_title);
                          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                      ?>
                      <div class="category-list__item col-lg-4 col-6">
                          <a href="<?php echo e($alias); ?>">
                              <div class="content text-left bora-10">
                                  <div class="img-animation">
                                      <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                                           data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>">
                                  </div>
                                  <p class="date">
                                      <?php echo e($date); ?>/<?php echo e($month); ?>/<?php echo e($year); ?>

                                  </p>
                                  <h3 class="title line-two">
                                      <?php echo e($title); ?>

                                  </h3>
                              </div>
                          </a>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <div class="col-12 page-navigation pr-lg-0">
                      <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

                  </div>
              </div>
          </div>
      </section>
  </div>

  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/pages/post/default.blade.php ENDPATH**/ ?>