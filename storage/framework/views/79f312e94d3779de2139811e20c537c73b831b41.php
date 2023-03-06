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

  <div id="intro">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-sm-12">
          <div class="intro-img">
            <img
            class="lazyload" 
            src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>" 
            data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" 
            />
          </div>
        </div>
        <div class="col-lg-5 col-sm-12">
          <div class="intro-text">
            <h2>
              <?php echo $title; ?>

            </h2>
            <p>
              <?php echo $brief; ?>

            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_web_app/styles/webapp_intro.blade.php ENDPATH**/ ?>