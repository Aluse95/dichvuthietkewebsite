<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div class="section my-0 bg-transparent ">
    <div class="container">
      <div class="heading-block border-bottom-0 center mx-auto" style="max-width: 550px">
        <h3 class="nott ls0"><?php echo e($title); ?></h3>
        <p>
          <?php echo nl2br($brief); ?>

        </p>
      </div>
      <div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-pagi="false" data-loop="true" data-autoplay="2000" data-items-xs="1"
        data-items-sm="2" data-items-md="3" data-items-lg="4">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              
              $url_link_sub = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
              $url_link_title_sub = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              
            ?>
            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="<?php echo e($url_link_sub); ?>">
                  <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>" style="border-radius:5px" width="auto" height="auto" />
                </a>
                <div class="bg-overlay" style="border-radius:5px">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                    <a href="<?php echo e($url_link_sub); ?>" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall"
                      data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3>
                  <a href="<?php echo e($url_link_sub); ?>"><?php echo e($title_sub); ?></a>
                </h3>
                <span>
                  <?php echo e($brief_sub); ?>

                </span>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

      </div>
    </div>
    <!-- END ADS TYPES-->

  </div>

<?php endif; ?>
<?php /**PATH /home/fhm/domains/f4web.vn/public_html/resources/views/frontend/blocks/custom_ads_facebook/styles/ads_facebook_solution.blade.php ENDPATH**/ ?>