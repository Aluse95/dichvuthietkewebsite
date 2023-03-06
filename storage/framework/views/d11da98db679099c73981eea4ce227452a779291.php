

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>

<?php $__env->startPush('style'); ?>
<style>
  #banner {
    background-image: url("<?php echo e($image_background); ?>");
    background-position: center top;
    background-repeat: no-repeat;
    background-size: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    padding: 150px 0 0;
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <?php if(isset($page->content) && $page->content != ''): ?>
    <div class="" id="banner">
      <div class="container">
        <h1><?php echo $page->content ?? ''; ?></h1>
      </div>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/pages/custom/index.blade.php ENDPATH**/ ?>