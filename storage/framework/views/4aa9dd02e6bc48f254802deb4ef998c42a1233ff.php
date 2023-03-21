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
    .form-bottom {
      bottom: 0;
      height: 80px;
      width: 100%;
      position: fixed;
      z-index: 200;
      background-color: #007aff;
    }
    .form-bottom h3 {
      margin-right: auto;
      color: #fff;
      font-size: 18px;
      margin-bottom: 0;
    }
    .form-bottom .container {
      max-width: 60%;
      margin: auto;
      margin-top: 20px;
    }
    .form-bottom form {
      flex: 1;
      margin-left: 20px;
    }
    @media (max-width: 540px) {
      .form-bottom {
        height: 100px;
      }
      .form-bottom .container {
      max-width: 100%;
      display: flex;
      flex-direction: column;
      margin-bottom: 10px;
      margin-top: 10px;
      }
      .form-bottom h3 {
        text-align: center;
        color: #fff;
        font-size: 16px;
        margin-bottom: 10px;
        margin-right: 0;
      }
      .form-bottom form {
        flex: 1;
        margin: 0;
      }
      .form-input {
        display: flex;
        flex-direction: column;
      }
      .btn-intro {
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
      }
      .input-intro {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
      }
    }
  </style>
  <div class="form-bottom">
    <div class="container d-flex align-items-center">
      <h3><?php echo e($brief . ' ' . $web_information->information->phone ?? ''); ?></h3>
      <form class="row mb-0 form_ajax" id="template-contactform" name="template-contactform"
        action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="d-flex p-0 form-input">
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
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_furniture/styles/furniture_formFix.blade.php ENDPATH**/ ?>