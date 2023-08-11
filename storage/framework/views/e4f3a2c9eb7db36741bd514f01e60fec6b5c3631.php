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
    $last_child = $block_childs->last();
  ?>

      <section id="people" class="power">
          <div class="content">
              <div class="manager text-center">
                  <div class="v-title">
                      <h2 class="title">
                          <?php echo e($title); ?>

                      </h2>
                  </div>
                  <div class="box-description">
                      <p>
                          <?php echo $brief; ?>

                      </p>
                  </div>
              </div>
              <div class="container">
                  <?php
                      $title_child = $first_child->json_params->title->{$locale} ?? $first_child->title;
                      $childs = $blocks->filter(function ($item, $key) use ($first_child) {
                        return $item->parent_id == $first_child->id;
                      });
                  ?>
                  <div class="text-center">
                      <img src="<?php echo e(asset('themes/frontend/website-service/images/icon-line.svg')); ?>" alt="line">
                  </div>
                  <div class="title-content"><?php echo e($title_child); ?></div>
                  <div class="row avatar">
                      <?php if($childs): ?>
                          <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                  $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                  $image_sub = $item->image != '' ? $item->image : null;
                              ?>
                              <div class="avatar-item col-lg-4 col-md-6 col-12">
                          <div class="card">
                              <img class="card-img-top lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                                   data-src="<?php echo e($image_sub); ?>" alt="<?php echo e($brief_sub); ?>" />
                              <div class="card-body text-center">
                                  <h5 class="card-title"><?php echo e($title_sub); ?></h5>
                                  <p class="card-text"><?php echo e($brief_sub); ?></p>
                              </div>
                          </div>
                      </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                  </div>
              </div>
              <div class="container personnel">
                  <?php
                      $title_child_2 = $last_child->json_params->title->{$locale} ?? $last_child->title;
                      $childs_2 = $blocks->filter(function ($item, $key) use ($last_child) {
                        return $item->parent_id == $last_child->id;
                      });
                  ?>
                  <div class="text-center">
                      <img src="<?php echo e(asset('themes/frontend/website-service/images/icon-line.svg')); ?>" alt="line">
                  </div>
                  <div class="title-content"><?php echo e($title_child_2); ?></div>
                  <div class="row avatar">
                      <?php if($childs_2): ?>
                          <?php $__currentLoopData = $childs_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                  $title_sub_2 = $item->json_params->brief->{$locale} ?? $item->brief;
                                  $image_sub_2 = $item->image != '' ? $item->image : null;
                              ?>
                              <div class="avatar-item col-lg-3 col-md-6 col-12">
                          <div class="card">
                              <img class="card-img-top lazyload" src="<?php echo e(asset('themes/frontend/f4web/images/lazyload.gif')); ?>"
                                   data-src="<?php echo e($image_sub_2); ?>" alt="<?php echo e($title_child_2); ?>" />
                          </div>
                      </div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
      </section>
<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_intro/styles/intro_people.blade.php ENDPATH**/ ?>