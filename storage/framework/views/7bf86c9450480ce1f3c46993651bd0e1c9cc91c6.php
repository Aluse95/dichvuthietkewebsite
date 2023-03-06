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
<?php /**PATH D:\xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/custom_convert/styles/convert_seo.blade.php ENDPATH**/ ?>