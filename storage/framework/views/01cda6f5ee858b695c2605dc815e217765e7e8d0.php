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

  <div id="client">
    <h2><?php echo e($title); ?></h2>
    <div class="swiper client-pc">
      <div class="swiper-wrapper">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_childs = $item->json_params->title->{$locale} ?? $item->title;
              $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_childs = $item->image != '' ? $item->image : null;
            ?>

            <div class="swiper-slide">
              <div class="client-img">
                <img
                  src="<?php echo e($image_childs); ?>"
                  alt="<?php echo e($title_childs); ?>"
                />
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>       
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-12" style="border-right: 2px dashed #ddd">
          <div class="form-container">
            <h3>Đăng kí nhận báo giá</h3>
            <form class="form_ajax" action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
              <?php echo csrf_field(); ?>
              <label for="name"><?php echo app('translator')->get('Fullname'); ?></label>
              <input type="text" id="name" name="name" value="" required>
              <label for="phone"><?php echo app('translator')->get('phone'); ?></label>
              <input type="text" id="phone" name="phone" value="" required>
              <label for="email">Email</label>
              <input type="email" id="email" name="email" value="">
              <label for="content"><?php echo app('translator')->get('Content'); ?></label>
              <textarea type="text" id="content" name="content" cols="30" rows="5" value=""></textarea>
              <button
                class="button"
                type="submit" id="submit" name="submit" value="submit">
                <span>Gửi đăng ký</span>
              </button>
              <input type="hidden" name="is_type" value="call_request">
            </form>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="video-container">
            <h3><?php echo e($brief); ?></h3>
            <div class="video">
              <?php echo $content; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper client-m">
      <div class="swiper-wrapper">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_childs = $item->json_params->title->{$locale} ?? $item->title;
              $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_childs = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
            ?>

            <div class="swiper-slide client-m">
              <div class="row">
                <div class="col-12">
                  <div class="client-img">
                    <img src="<?php echo e($image_childs); ?>"
                      alt="<?php echo e($title_childs); ?>"
                    />
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
<?php /**PATH D:\Xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_content/styles/content_client.blade.php ENDPATH**/ ?>