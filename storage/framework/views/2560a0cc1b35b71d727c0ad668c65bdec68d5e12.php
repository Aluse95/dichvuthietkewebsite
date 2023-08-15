<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
  ?>

  <div id="seo-content">
    <div class="container">
      <h2><?php echo e($title); ?></h2>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/custom_seo/styles/seo_seo.blade.php ENDPATH**/ ?>