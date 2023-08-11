<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <style>
     #about-us.introduce .content p{
          margin-bottom: 30px;
      }
  </style>

  <section id="about-us" class="introduce box-bg">
      <div class="bg container">
          <div class="col-12 col-lg-6 img position-relative">
              <img class="img-fluid lazyload"
                   src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                   data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
          </div>
          <div class="content col-12 col-lg-6">
              <div class="v-title">
                  <div class="box-title">
                      <span>/</span>
                      <span>About us</span>
                  </div>
                  <h2 class="title">
                      <?php echo e($title); ?>

                  </h2>
              </div>
              <div class="content">
                      <?php if(request()->is('/')): ?>
                          <p class="text-justify mb-5 bref">
                              <?php echo $brief; ?>

                          </p>
                      <?php else: ?>
                          <?php echo $content; ?>

                      <?php endif; ?>
              </div>
              <?php if(request()->is('/')): ?>
                  <div class="template-detail-button">
                      <a href="/gioi-thieu" class="">
                          <button class="btn bg-primary btn-medium">
                              Xem thêm về chúng tôi
                          </button>
                      </a>
                  </div>
              <?php endif; ?>
          </div>
          <div class="col-12 bg-logo">
              <img src="<?php echo e(asset('themes/frontend/website-service/images/bg-logo.jpg')); ?>" alt="banner-logo">
          </div>
      </div>
  </section>

<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_intro/styles/intro_about_us.blade.php ENDPATH**/ ?>