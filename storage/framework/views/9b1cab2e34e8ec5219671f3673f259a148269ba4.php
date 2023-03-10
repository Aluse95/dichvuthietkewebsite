<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <div class="section bg-light mt-0 mb-0 pb-0 " id="faq">
    <div class="container bottommargin">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 text-center">
          <div class="heading-block border-bottom-0 center mx-auto">
            <div class="badge rounded-pill badge-default"><?php echo e($title); ?></div>
            <h2 class="nott ls0 mb-3"><?php echo e($brief); ?></h2>
            <p><?php echo nl2br($content); ?></p>
          </div>
        </div>

        <div class="clear"></div>
        <div class="col-lg-10">

          <div class="clear"></div>

          <div id="faqs" class="faqs">

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
                <div class="toggle faq pb-3 mb-4">
                  <div class="toggle-header">
                    <div class="toggle-icon color">
                      <i class="toggle-closed icon-question-sign"></i>
                      <i class="toggle-open icon-question-sign"></i>
                    </div>
                    <div class="toggle-title fw-semibold ps-1">
                      <?php echo e($title_child); ?>

                    </div>
                    <div class="toggle-icon color">
                      <i class="toggle-closed icon-chevron-down text-black-50"></i>
                      <i class="toggle-open icon-chevron-up color"></i>
                    </div>
                  </div>
                  <div class="toggle-content text-black-50 ps-4"><?php echo nl2br($brief_child); ?></div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

          </div>

        </div>

      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH /home/fhm/domains/f4web.vn/public_html/resources/views/frontend/blocks/custom_ads_facebook/styles/ads_facebook_faq.blade.php ENDPATH**/ ?>