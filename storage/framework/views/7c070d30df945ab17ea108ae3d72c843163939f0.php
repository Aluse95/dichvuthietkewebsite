<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    $image = $block->image != '' ? $block->image : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $index = 1;
  ?>

  <style>
    .process-number {
      height: 66px;
      width: 66px;
      border-radius: 100%;
      font-size: 32px;
      font-weight: 600;
      border: 1px solid #ccc;
      position: absolute;
      background-color: #fff;
    }
    .process-item {
      flex: 1;
      color: #fff;
      height: 80px;
      font-size: 24px;
      padding-left: 54px;
      margin-left: 20px;
      font-weight: 600;
      line-height: 80px;
      border-radius: 35px;
      background-color: blue;
      text-transform: uppercase;
    }
    #process .banner-furniture li:nth-child(1) .process-item {
      background-color: #aa1dc6;
    }
    #process .banner-furniture li:nth-child(2) .process-item {
      background-color: #823fd0;
    }
    #process .banner-furniture li:nth-child(3) .process-item {
      background-color: #13abe5;
    }
    #process .banner-furniture li:nth-child(4) .process-item {
      background-color: #f19600;
    }
    #process .banner-furniture li:nth-child(5) .process-item {
      background-color: #5ec813;
    }
    #process h1 {
      font-size: 30px;
      color: #094ea1;
      font-weight: 600;
    }
    @media (max-width: 540px) {
      #process .process-item {
        font-size: 19px;
        text-transform: unset;
      }
    }
  </style>

  <div id="process">
    <div class="container">
      <h1 class="text-center mb-5"><?php echo e($title); ?></h1>
      <ul class="banner-furniture" style="max-width: 50%; margin:auto">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
            ?>
  
            <li class="d-flex align-items-center position-relative my-4">
              <div class="process-number d-flex">
                <span class="m-auto"><?php echo e($index++); ?></span>
              </div>
              <div class="process-item">
                <?php echo e($title_sub); ?>

              </div>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/custom_furniture/styles/furniture_process.blade.php ENDPATH**/ ?>