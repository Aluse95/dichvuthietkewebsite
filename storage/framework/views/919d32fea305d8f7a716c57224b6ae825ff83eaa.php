<div id="footer">
  <div class="container">
    <div class="row">
      <?php if(isset($menu)): ?>
        <?php
          $footer_menu = $menu->filter(function ($item, $key) {
            return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
          });
          
          $content = '';

          foreach ($footer_menu as $main_menu) {
            $url = $title = '';
            $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
            $content .= '<div class="col-lg-3 col-md-6 col-sm-12">';
            $content .= '<h2>' . $title . '</h2>';
            $content .= '<ul>';
            $sub = $main_menu->sub;

            if($sub <= 8) {
              
              foreach ($menu as $item) {
                
                if ($item->parent_id == $main_menu->id) {
                  $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                  $url = $item->url_link;
                  $active = $url == url()->current() ? 'active' : '';
                  $content .= '<li><a href="' . $url . '"><i class="fa-solid fa-angle-right"></i> ' . $title . '</a>';
                  if ($item->sub > 0) {
                    $content .= '<ul class="sub-footer">';
                    foreach ($menu as $item_sub) {
                      $url = $title = '';
                      if ($item_sub->parent_id == $item->id) {
                        $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                        $url = $item_sub->url_link;

                        $content .= '<li><a href="' . $url . '"><i class="fa-solid fa-angle-right"></i>' . $title . '</a></li>';
                      }
                    }
                    $content .= '</ul>';
                  }
                  $content .= '</li>';
                }
              }
              
            } else {

              $list = $menu->filter(function ($item, $key) use ($main_menu) {
                return $item->parent_id == $main_menu->id;
              });
              $result = $list->chunk(8);

              foreach ($result[0] as $item) {

                $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                $url = $item->url_link;
    
                $active = $url == url()->current() ? 'active' : '';
                $content .= '<li><a href="' . $url . '"><i class="fa-solid fa-angle-right"></i> ' . $title . '</a>';
                $content .= '</li>';
              }
              $content .= '<li class="toggle-container"><h2>Xem thêm <i class="fa-solid fa-plus"></i></h2><ul class="toggle">';
              foreach ($result[1] as $item) {

                $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                $url = $item->url_link;

                $active = $url == url()->current() ? 'active' : '';
                $content .= '<li><a href="' . $url . '"><i class="fa-solid fa-angle-right"></i> ' . $title . '</a>';
                $content .= '</li>';
              }

              $content .= '</ul>';
              $content .= '</li>';
            }

            $content .= '</ul>';
            $content .= '</div>';

          }
          echo $content;
        ?>
      <?php endif; ?>

      <div class="col-lg-3 col-md-6 col-sm-12">
        <h2>Kết nối với chúng tôi</h2>
        <p><strong><?php echo app('translator')->get('phone'); ?>:</strong> <?php echo e($web_information->information->phone ?? ''); ?></p>
        <p><strong>Email:</strong> <?php echo e($web_information->information->email ?? ''); ?></p>
        <p>
          <strong><?php echo app('translator')->get('address'); ?>:</strong> <?php echo e($web_information->information->address ?? ''); ?>

        </p>
        <div class="social-link-container">
          <a href="<?php echo e($web_information->social->facebook ?? ''); ?>"><i class="fa-brands fa-facebook"></i></a>
          <a href="<?php echo e($web_information->social->instagram ?? ''); ?>"><i class="fa-brands fa-square-instagram"></i></a>
          <a href="<?php echo e($web_information->social->twitter ?? ''); ?>"><i class="fa-brands fa-square-twitter"></i></a>
          <a href="<?php echo e($web_information->social->youtube ?? ''); ?>"><i class="fa-brands fa-youtube"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12">
        <a href="#" class="logo"
          ><img
            src="<?php echo e($web_information->image->logo_footer ?? ''); ?>"
            alt="<?php echo e($web_information->information->site_name ?? ''); ?>"
        /></a>
        <div class="certificate-container">
          <a href="#"
            ><img src="<?php echo e(asset('themes/frontend/f4web/images/sys_basic_2x.png')); ?>" alt="Chứng chỉ"
          /></a>
          <a href="#"
            ><img src="<?php echo e(asset('themes/frontend/f4web/images/DMCA-01.png')); ?>" alt="Chứng chỉ"
          /></a>
          <a href="#"
            ><img src="<?php echo e(asset('themes/frontend/f4web/images/bo-cong-thuong.png')); ?>" alt="Chứng chỉ"
          /></a>
        </div>
        <h2>Website liên quan</h2>
        <div class="relative-website-container">
          <a href="https://f4web.vn/"
            ><img
              src="<?php echo e(asset('themes/frontend/f4web/images/logo_new_dark.png')); ?>"
              alt="FHM"
          /></a>
          <a href="https://f4web.vn/"
            ><img
              src="<?php echo e(asset('themes/frontend/f4web/images/logo_new_dark.png')); ?>"
              alt="FHM"
          /></a>
          <a href="https://f4web.vn/"
            ><img
              src="<?php echo e(asset('themes/frontend/f4web/images/logo_new_dark.png')); ?>"
              alt="FHM"
          /></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH D:\Xampp\htdocs\dichvuthietkewebsite\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>