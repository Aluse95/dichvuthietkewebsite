<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $icon = $block->icon ?? '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $id = $block_childs->first()->id;
  ?>
<style>
    .box-service:hover .icon img{
        filter: brightness(0) invert(1);
        -webkit-filter: brightness(0) invert(1);
    }
</style>
  <!-- START SERVICE -->
      <section id="service" class="services">
          <div class="container">
              <div class="v-title text-center">
                  <div class="box-title">
                      <span>/</span>
                      <span>Services</span>
                  </div>
                  <h2 class="title">
                      <?php echo e($title); ?>

                  </h2>
              </div>
              <div class="service-list d-flex flex-wrap align-items-center justify-content-lg-center">
                  <?php if(isset($block_childs)): ?>
                      <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                  $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                  $image_sub = $item->image != '' ? $item->image : null;
                                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                                  $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                                  $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                          ?>
                  <div class="service-list__item col-12 col-lg-4 mb-5 mb-lg-0">
                      <div class="box-service text-center bora-10">
                          <div class="icon">
                              <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>">
                          </div>
                          <h3 class="title text-center text-uppercase">
                              <?php echo e($title_sub); ?>

                          </h3>
                          <div class="content">
                              <?php echo $content_sub; ?>

                          </div>
                      </div>
                  </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </div>
          </div>
      </section>
  <!-- END SERVICE -->

<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom/styles/service.blade.php ENDPATH**/ ?>