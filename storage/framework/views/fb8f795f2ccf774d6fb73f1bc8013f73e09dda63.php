<?php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? '';
  $content = $detail->json_params->content->{$locale} ?? '';
  $image = $detail->image != '' ? $detail->image : '';
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : '';
  $date = date('H:i d/m/Y', strtotime($detail->created_at));

  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $taxonomy_alias = Str::slug($taxonomy_title);
  if (isset($taxonomy) && $taxonomy->parent_title !== null) {
      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy->parent_alias ?? $taxonomy->parent_title, $taxonomy->id, null, $taxonomy->alias ?? $taxonomy_title);
  } else {
      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
  }

  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);

  // schema information
  $datePublished = date('Y-m-d', strtotime($detail->created_at));
  $dateModified = date('Y-m-d', strtotime($detail->updated_at));
?>

<?php $__env->startSection('content'); ?>
  
    <section id="banner" class="slider-about-us">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div>
                        <img class="d-block w-100" src="<?php echo e(asset('themes/frontend/website-service/images/bg-detail.jpg')); ?>" alt="banner-blog-detail">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="blog-detail" class="blog-detail">
        <div class="container">
            <div class="row position-relative">
                <div class="col-lg-8 col-12 article">
                    <div class="blog-detail__content">
                        <div class="detail-title">
                            <h1><?php echo e($title); ?></h1>
                        </div>
                        <div class="detail-share d-flex justify-content-between">
                            <div class="text-date">27 Jun 2023</div>
                            <div class="text-share d-flex align-items-center">
                                <div class="share pr-1">
                                    Chia sẻ
                                </div>
                                <div class="social d-flex flex-nowrap">
                                    <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::fullUrl()); ?>" rel="nofollow" target="_blank">
                                        <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_fb_share.svg')); ?>" alt="share facebook" class="img-fluid">
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(Request::fullUrl()); ?>" rel="nofollow" target="_blank">
                                        <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_twitter_share.svg')); ?>" alt="share twitter"class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php echo $content; ?>

                        <div class="detail-share">
                            <div class="text-share pt-3 d-flex align-items-center justify-content-end">
                                <div class="share pr-1">
                                    Chia sẻ
                                </div>
                                <div class="social d-flex flex-nowrap">
                                    <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::fullUrl()); ?>" rel="nofollow" target="_blank">
                                        <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_fb_share.svg')); ?>" alt="share facebook" class="img-fluid">
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(Request::fullUrl()); ?>" rel="nofollow" target="_blank">
                                        <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_twitter_share.svg')); ?>" alt="share twitter"class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 sidebar">
                    <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>

  <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
      <section class="category news-list">
          <div class="container">
              <div class="title-news">
                  <h2 class="title">
                      <?php echo app('translator')->get('Related Posts'); ?>
                  </h2>
              </div>
              <div class="category-list row">
                  <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title = $item->json_params->title->{$locale} ?? $item->title;
                          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                          // $date = date('d/m/Y', strtotime($item->created_at));
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/pages/post/detail.blade.php ENDPATH**/ ?>