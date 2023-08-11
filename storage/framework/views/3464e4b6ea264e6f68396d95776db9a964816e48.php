<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $first_child = $block_childs->first();
    if(count($block_childs) > 2) {
        $childs = $block_childs->chunk(2);
    }
  ?>
  <style>
      .introduce-us .introduce-us__items:first-child .col-lg-6.col-12{
          display: flex;
          justify-content: end;
          padding-right: 76px;
      }
      .introduce-us .introduce-us__items.flex-row-reverse .col-lg-6.col-12{
          padding-left: 99px;
      }
      .introduce-us .introduce-us__items .bg-img{
          max-height: 590px;
      }
      .introduce-us .introduce-us__items .bg-img img{
         object-fit: cover;
          max-height: 590px;
      }
  </style>

  <section id="vision" class="introduce-us">
      <?php if($childs[0]): ?>
          <?php $__currentLoopData = $childs[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                  $title_child = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_child = $item->json_params->content->{$locale} ?? $item->content;
                  $image_child = $item->image != '' ? $item->image : null;
                  $row = $item->id == $first_child->id ? '' : 'flex-row-reverse';
              ?>
              <div class="introduce-us__items d-flex <?php echo e($row); ?>">
                  <div class="col-lg-6 col-12">
                      <div class="content h-100">
                          <div class="h-100 d-flex align-items-center">
                              <div class="col-12">
                                  <div class="v-title">
                                      <h2 class="title">
                                          <?php echo $title_child; ?>

                                      </h2>
                                  </div>
                                  <div>
                                      <?php echo $brief_child; ?>

                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-6 col-12 bg-img px-0">
                      <img class="lazyload img-fluid" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                           data-src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>"/>
                  </div>
      </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
          <div class="core-values">
              <?php if($childs[1]): ?>
                  <?php $__currentLoopData = $childs[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title_child = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                          $sub = $item->sub;
                          $block_sub = $blocks->filter(function ($val, $key) use ($item) {
                              return $val->parent_id == $item->id;
                          });
                      ?>
              <div class="content">
                  <div class="text-center">
                      <div class="v-title">
                          <h2 class="title">
                              <?php echo $title_child; ?>

                          </h2>
                      </div>
                      <div class="box-description">
                          <p><?php echo $brief_child; ?></p>
                      </div>
                  </div>
                  <div class="row box-values">
                      <?php if($block_sub): ?>
                          <?php $__currentLoopData = $block_sub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                  $image_sub = $item->image != '' ? $item->image : null;
                                  $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                              ?>
                      <div class="box-values__item col-lg-3 col-md-6 col-12">
                          <div class="title"><?php echo e($title_sub); ?></div>
                          <div class="box-desc pt-3">
                              <p>
                                <?php echo $brief_sub; ?>

                              </p>
                          </div>
                          <div class="img">
                              <div class="text-center">
                                  <img class="lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                                       data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"/>
                              </div>
                          </div>
                      </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                  </div>
              </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
          </div>
  </section>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_intro/styles/intro_vision.blade.php ENDPATH**/ ?>