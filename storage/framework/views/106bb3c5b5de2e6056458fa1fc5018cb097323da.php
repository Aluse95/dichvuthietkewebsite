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

  <!-- START SERVICE -->
  <div id="service">
    <img src="<?php echo e($image_background); ?>" alt="service-bg" />
    <h2><i class="<?php echo e($icon); ?>"></i><?php echo e($title); ?></h2>
    <div class="container g-0">
      <div class="service-container">
        <div class="service-tag-container">
          <div class="service-tag-item-smooth-container">
            <div class="service-tag-item-smooth-left"></div>
            <div class="service-tag-item-smooth-right"></div>
          </div>
          <?php if(isset($block_childs)): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $active = $item->id == $id ? 'active' : '';
              ?>
              
              <div class="service-tag-item <?php echo e($active); ?>">
                <p><?php echo e($title_sub); ?></p>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
        <div class="service-card-container">
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

              <div class="service-card-item">
                <div class="service-card-item-img">
                  <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"/>
                </div>
                <div class="service-card-item-content">
                  <h3><?php echo e($title_sub); ?></h3>
                  <ul>
                    <?php echo $content_sub; ?>

                  </ul>
                  <?php if(isset($web_information->social->call_now) && $web_information->social->call_now != ''): ?>
                  <a href="tel:<?php echo e($web_information->social->call_now); ?>"  rel="nofollow" class="button"
                    ><?php echo e($url_link_title); ?> <i class="fa-solid fa-arrow-right"></i>
                  </a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile Service -->
  <div id="m-service">
    <img src="<?php echo e($image_background); ?>" alt="service-bg" />
    <h2>
      <i class="<?php echo e($icon); ?>"></i>
      <span><?php echo e($title); ?></span> 
    </h2>
    <div class="container">
      <div class="service-container">
        <div class="service-tag-container">
          <div class="row">
            <?php if(isset($block_childs)): ?>
              <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $active = $item->id == $id ? 'active' : '';
                  $col = $item->iorder == 3 ? 'col-12' : 'col-6'
                ?>
                
                <div class="<?php echo e($col); ?> service-tag-item d-flex justify-content-center <?php echo e($active); ?>">
                  <p><?php echo e($title_sub); ?></p>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="service-card-container">
          <?php if(isset($block_childs)): ?>
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $image_sub = $item->image != '' ? $item->image : null;
                $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                $active = $item->id == $id ? 'active' : '';
              ?>

              <div class="service-card-item <?php echo e($active); ?>">
                <div class="service-card-item-img">
                  <img src="<?php echo e($image_sub); ?>" alt="<?php echo e($title_sub); ?>"/>
                </div>
                <div class="service-card-item-content">
                  <h3><?php echo e($title_sub); ?></h3>
                  <ul>
                    <?php echo $content_sub; ?>

                  </ul>
                  <?php if(isset($web_information->social->call_now) && $web_information->social->call_now != ''): ?>
                  <a href="tel:<?php echo e($web_information->social->call_now); ?>"  rel="nofollow" class="button"
                    ><?php echo e($url_link_title); ?> <i class="fa-solid fa-arrow-right"></i>
                  </a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile Service -->
  <!-- END SERVICE -->

<?php endif; ?>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/custom/styles/service.blade.php ENDPATH**/ ?>