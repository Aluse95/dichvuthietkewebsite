

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $seo_title = $page_title . (isset($params['keyword']) && $params['keyword'] != '' ? ': ' . $params['keyword'] : '');
  
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>

<?php $__env->startSection('content'); ?>
  
  <style>
    #banner {
      background-image: url("<?php echo e($image_background); ?>");
      background-position: center top;
      background-repeat: no-repeat;
      background-size: 100%;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      padding: 250px 0 0;
    }
  </style>
  
  <div id="banner">
    <div class="container">
      <h1>
        <?php echo e($page_title); ?>

        <?php if(isset($params['keyword']) && $params['keyword'] != ''): ?>
          <?php echo ': ' . $params['keyword']; ?>

        <?php endif; ?>
      </h1>
    </div>
  </div>


  <section id="content pt-5">
    <div class="content-wrap">
      <div class="container mb-3">
        <div class="row mb-5 mt-5 clearfix">
          <div class="postcontent col-lg-9">
            <div class="row">
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
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail', $item->taxonomy_title);
                ?>

                <div class="col-lg-6 col-sm-12">
                  <div class="blog-post-container">
                    <div class="blog-post-img">
                      <a href="<?php echo e($alias); ?>"><img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"></a>
                    </div>
                    <div class="blog-post-text">
                      <a href="<?php echo e($alias); ?>" class="title"><?php echo e($title); ?></a>
                      <p class="date">
                        <i class="fa-solid fa-calendar"></i><?php echo e($date); ?>/<?php echo e($month); ?>/<?php echo e($year); ?>

                      </p>
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

            </div>
          </div>

          <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
    </div>
  </section>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/pages/search/index.blade.php ENDPATH**/ ?>