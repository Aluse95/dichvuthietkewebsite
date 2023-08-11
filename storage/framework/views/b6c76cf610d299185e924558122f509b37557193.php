<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <section id="testimonials" class="our-testimonials">
      <div class="wrapper">
          <div class="v-title text-center">
              <div class="box-title">
                  <span>/</span>
                  <span>Our Testimonials</span>
              </div>
              <h2 class="title">
                  <?php echo $title; ?>

              </h2>
          </div>
          <div class="carousel-news">
              <?php if($block_childs): ?>
                  <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title_child = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                          $content_child = $item->json_params->content->{$locale} ?? $item->content;
                          $image_child = $item->image != '' ? $item->image : null;
                          $url_link = $item->url_link != '' ? $item->url_link : '';
                          $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                          $icon = $item->icon != '' ? $item->icon : '';
                          $style = $item->json_params->style ?? '';
                      ?>
              <div class="slider-item">
                  <div class="card">
                      <div class="col-4 pr-0">
                          <img src="<?php echo e($image_child); ?>">
                      </div>
                      <div class="card-body col-8">
                          <div class="card-content">
                              <div class="card-title line-one"><?php echo e($title_child); ?></div>
                              <div class="major"><?php echo e($brief_child); ?></div>
                              <div class="rate"><img src="<?php echo e(asset('themes/frontend/website-service/images/img-rate.png')); ?>" alt="rating"></div>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="card-text ">
                              <p class="line-night">
                                  <?php echo $content_child; ?>

                              </p>
                          </div>
                      </div>
                  </div>
              </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </div>
          <div class="template-detail-button">
              <a href="#" class="">
                  <button class="btn bg-primary btn-medium">
                      Xem toàn bộ khách hàng
                  </button>
              </a>
          </div>
      </div>
  </section>

<?php endif; ?>

<script>
  
  
  
  
  
  
  
  
</script>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom/styles/testimonial.blade.php ENDPATH**/ ?>