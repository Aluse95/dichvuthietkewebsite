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
  <div class="section bg-transparent my-0">
    <div class="container">
      <div class="heading-block border-bottom-0 center mx-auto">
        <h2 class="nott ls0 mb-3"><?php echo e($title); ?></h2>
      </div>

      <div class="row col-mb-30 align-content-stretch">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              
              $url_link_sub = $item->url_link != '' ? $item->url_link : '';
              $url_link_title_sub = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              
            ?>
            <div class="col-lg-4 col-md-6 d-flex">
              <div class="card h-shadow h-translate-y-sm all-ts">
                <div class="card-body p-5">
                  <div class="feature-box flex-column">

                    <div class="fbox-content mb-5">
                      <h3 class="nott ls0 text-larger"><?php echo e($title_sub); ?></h3>
                      <p>
                        <?php echo nl2br($brief_sub); ?>

                      </p>
                    </div>

                    <div class="fbox-image text-center mb-5">
                      <img height="auto" src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>" />
                    </div>

                    <?php if($url_link_sub != ''): ?>
                      <a href="<?php echo e($url_link_sub); ?>"
                        class="button button-border button-rounded button-fill button-blue button-large ls0 text-uppercase text-center">
                        <span><?php echo e($url_link_title_sub); ?></span>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/fhm/domains/f4web.vn/public_html/resources/views/frontend/blocks/custom_website/styles/website_package.blade.php ENDPATH**/ ?>