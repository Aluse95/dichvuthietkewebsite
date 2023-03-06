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
    $m_blocks = $block_childs->chunk(3,3);

  ?>

  <div id="client-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-12 form-container">
          <h4>Đăng kí nhận báo giá</h4>
          <form>
            <label for="name">Họ và tên</label> <br />
            <input type="text" id="name" name="name" />
            <br />
            <label for="phone">Số điện thoại</label><br />
            <input type="text" id="phone" name="phone" />
            <br />
            <label for="email">Email</label><br />
            <input type="text" id="email" name="email" />
            <br />
            <label for="message">Lời nhắn</label><br />
            <textarea name="message" cols="30" rows="5"></textarea>
            <button type="submit" class="button">Gửi đăng kí</button>
          </form>
        </div>
        <div class="col-lg-8 col-sm-12 client-container">
          <h4>Đối tác của chúng tôi</h4>
          <div class="p-client">
            <div class="row">
              <?php if($block_childs): ?>
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image != '' ? $item->image : null;
                    $url_link = $item->url_link != '' ? $item->url_link : '';
                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                    $icon = $item->icon != '' ? $item->icon : '';
                    $style = $item->json_params->style ?? '';
                  ?>

                  <div class="col-lg-4 col-sm-6">
                    <div class="client-img">
                      <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="m-client">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="row">
                    <?php if($block_childs): ?>
                      <?php $__currentLoopData = $m_blocks[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $title = $item->json_params->title->{$locale} ?? $item->title;
                          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image = $item->image != '' ? $item->image : null;
                          $url_link = $item->url_link != '' ? $item->url_link : '';
                          $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                          $icon = $item->icon != '' ? $item->icon : '';
                          $style = $item->json_params->style ?? '';
                        ?>

                        <div class="col-4">
                          <div class="client-img">
                            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="row">
                    <?php if($block_childs): ?>
                      <?php $__currentLoopData = $m_blocks[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $title = $item->json_params->title->{$locale} ?? $item->title;
                          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image = $item->image != '' ? $item->image : null;
                          $url_link = $item->url_link != '' ? $item->url_link : '';
                          $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                          $icon = $item->icon != '' ? $item->icon : '';
                          $style = $item->json_params->style ?? '';
                        ?>

                        <div class="col-4">
                          <div class="client-img">
                            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="row">
                    <?php if($block_childs): ?>
                      <?php $__currentLoopData = $m_blocks[2]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $title = $item->json_params->title->{$locale} ?? $item->title;
                          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image = $item->image != '' ? $item->image : null;
                          $url_link = $item->url_link != '' ? $item->url_link : '';
                          $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                          $icon = $item->icon != '' ? $item->icon : '';
                          $style = $item->json_params->style ?? '';
                        ?>

                        <div class="col-4">
                          <div class="client-img">
                            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>"/>
                          </div>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/blocks/banner/styles/logo_partner.blade.php ENDPATH**/ ?>