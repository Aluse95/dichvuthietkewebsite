

<?php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
?>



<?php echo $__env->make('frontend.layouts.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/pages/custom/index.blade.php ENDPATH**/ ?>