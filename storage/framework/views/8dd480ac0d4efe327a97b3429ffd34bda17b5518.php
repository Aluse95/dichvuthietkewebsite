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
  ?>

  <style>
    #intro h1 {
      font-size: 30px;
      color: #094ea1;
      font-weight: 600;
    }
    #intro p {
      font-size: 18px;
      line-height: 30px;
    }
    .intro-item i {
      margin-top: 6px;
      margin-right: 6px;
    }
    .intro-item .fa-star {
      color: rgb(250, 243, 22);
    }
    .intro-item .fa-square-check {
      color: green;
    }
    .btn-intro {
      border: none;
      color: #fff;
      min-width: 150px;
      background-color: #ff7b34;
      border-top-right-radius: 12px;
      border-bottom-right-radius: 12px;
    }
    .input-intro {
      flex: 1;
      height: 40px;
      outline: none;
      padding-left: 12px;
      border: 1px solid #ccc;
      border-top-left-radius: 12px;
      border-bottom-left-radius: 12px;
    }
  </style>

  <div id="intro">
    <div class="container">
      <h1 class="text-center mb-4"><?php echo e($title); ?></h1>
      <div class="banner-furniture" style="max-width: 60%; margin:auto">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
            ?>
  
            <div class="intro-item d-flex align-items-top">
              <?php echo $icon_sub; ?>

              <div class="intro-item-text">
                <p>
                  <?php echo $brief_sub; ?>

                </p>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="form-result"></div>
        <form class="row mb-0 form_ajax" id="template-contactform" name="template-contactform"
          action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="d-flex p-0">
            <input type="text" id="phone" name="phone" class="required input-intro"
              value="" required placeholder="Nhập SĐT của bạn...">
            <button
              class="button btn-intro"
              type="submit" id="submit" name="submit" value="submit">
              <span>Đăng ký tư vấn</span>
            </button>
          </div>
          <input type="hidden" name="is_type" value="call_request">
        </form>
      </div>
    </div>
  </div>

<?php endif; ?>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/custom_furniture/styles/furniture_intro.blade.php ENDPATH**/ ?>