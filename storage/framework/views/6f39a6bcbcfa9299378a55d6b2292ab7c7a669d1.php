 <!-- Stylesheets ============================================= -->
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/f4web/css/bootstrap.min.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/f4web/css/swiper.min.css')); ?>" type="text/css" />
 <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/f4web/css/swiper-bundle.css')); ?>" type="text/css" />

 <link
 rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
 integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
 crossorigin="anonymous"
 referrerpolicy="no-referrer"
/>

<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/f4web/css/all.min.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/f4web/css/style.css')); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/f4web/css/responsive.css')); ?>" type="text/css" />

<?php if(isset($web_information->source_code->header)): ?>
  <?php echo $web_information->source_code->header; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\f4web\resources\views/frontend/panels/styles.blade.php ENDPATH**/ ?>