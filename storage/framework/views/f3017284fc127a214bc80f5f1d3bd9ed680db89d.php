<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $page_description = $taxonomy->json_params->description->{$locale} ?? $page->description;

  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;

  $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
  $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['post'];

  $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
?>

<?php $__env->startSection('content'); ?>
    <style>
        .category-list__item .img-animation img {
            transition: transform 0.3s, filter 0.3s;
        }

        .category-list__item h3.title {
            transition: color 0.3s;
        }

        .category-list__item:hover .img-animation img {
            transform: scale(1.15); /* Tăng kích thước ảnh khi hover */
            /*filter: brightness(0.8); !* Điều chỉnh độ sáng của ảnh *!*/
        }


        .category-list__item .img-animation {
            overflow: hidden;
            border-radius: 10px;
        }

        .category-list__item:hover h3.title {
            color: #364CC3; /* Đổi màu chữ khi hover */
        }
    </style>


    
  <section id="banner" class="slider-title">
      <div class="bg_page position-relative">
          <div class="img">
              <img class="d-block w-100" src="<?php echo e(asset('themes/frontend/website-service/images/bg_post_category.jpg')); ?>" alt="banner">
          </div>
          <div class="container">
              <div class="content-page">
                  <div class="text-left">
                      <h2 class="title pb-lg-3">
                          <?php echo e($page_title); ?>

                      </h2>
                      <p class="d-md-block d-none">
                          <?php echo $page_description; ?>

                      </p>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section id="blog-category" class="category news-list">
      <div class="container">
          <div class="v-title text-center">
              <h2 class="title">
                  <?php echo e($page_title); ?>

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
    <?php
        $params_product['status'] = App\Consts::POST_STATUS['active'];
        $params_product['is_type'] = App\Consts::POST_TYPE['post'];
        $params_product['order_by'] = 'id';

        $recents = App\Http\Services\ContentService::getCmsPost($params_product)
            ->limit(App\Consts::DEFAULT_SIDEBAR_LIMIT)
            ->get();
    ?>
    <?php if(isset($recents)): ?>
        <section class="category news-list">
            <div class="container">
                <div class="title-news">
                    <h2 class="title">
                        Các bài viết khác
                    </h2>
                </div>
                <div class="category-list row">
                    <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <div class="img">
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

  
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
  <script>
    $(document).on('click', '#btn-show', function() {
      let _html = $("#show-more");
      let _text = _html.html();
      let _target = $("#content-detail");

      console.log(_text);
      if (_text === 'Xem thêm') {
        _target.css('height', 'auto');
        document.getElementById("show-more").innerHTML = "Ẩn bớt";
      } else {
        _target.css('height', '300px');
        document.getElementById("show-more").innerHTML = "Xem thêm";
      }

    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/pages/post/category.blade.php ENDPATH**/ ?>