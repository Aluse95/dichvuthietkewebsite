

<form class="" action="<?php echo e(route('frontend.search.index')); ?>" method="get">
  <div id="search-modal">
    <div class="search-modal-container">
      <div class="search-modal-close-button">
        <i class="fa-solid fa-circle-xmark"></i>
      </div>
      <p class="title">Tìm kiếm</p>
      <input type="search" name="keyword" placeholder="Tìm kiếm" value="<?php echo e($params['keyword'] ?? ''); ?>"/>
      
      <button type="submit" class="search-submit-button">
        Tìm kiếm
      </button>
    </div>
  </div>
</form>

<div id="header">
  <div class="container">
    <a href="<?php echo e(route('frontend.home')); ?>" class="logo" data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>">
      <img
        src="<?php echo e($web_information->image->logo_header ?? ''); ?>"
        alt="F4Web Logo"
      />
    </a>
    <div class="menu-container">
      <ul class="list-unstyled d-flex m-0">
        <?php if(isset($menu)): ?>
          <?php
            $main_menu = $menu->first(function ($item, $key) {
                return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
            });
            if ($main_menu) {
                $content = '';
                foreach ($menu as $item) {
                    $url = $title = '';
                    if ($item->parent_id == $main_menu->id) {
                        $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                        $url = $item->url_link;
                        $active = $url == url()->full() ? 'current' : '';
                        $icon = ($item->sub > 0) ? 'fa-solid fa-chevron-down' : '';
                        $sub = ($item->sub > 0) ? 'sub-menu' : '';

                        $content .= '<li class="' . $sub . '"><a href= "' . $url . '" class="menu-link '. $active .'">' . $title . '<i class=" '. $icon . '"></i></a>';
            
                          if ($item->sub > 0) {
                            $content .= '<ul class="sub-menu-container">';
                            foreach ($menu as $item_sub) {
                              $url = $title = '';
                              if ($item_sub->parent_id == $item->id) {
                                $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                $url = $item_sub->url_link;
                                $sub_child = ($item_sub->sub > 0) ? 'sub-child' : '';
                                $icon = ($item_sub->sub > 0) ? 'fa-solid fa-chevron-down' : '';
        
                                $content .= '<li class="' . $sub_child . '"><a class="d-flex justify-content-between" href="' . $url . '"><div class="p-2">' . $title . '</div><i class=" '. $icon . ' "></i></a>';
                                if ($item_sub->sub > 0) {
                                  $content .= '<ul class="sub-menu-child">';
                                  foreach ($menu as $item_sub_2) {
                                    $url = $title = '';
                                    if ($item_sub_2->parent_id == $item_sub->id) {
                                      $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                      $url = $item_sub_2->url_link;
  
                                      $content .= '<li><a href="' . $url . '"><div class="p-2">' . $title . '</div></a></li>';
                                    }
                                  }
                                  $content .= '</ul>';
                                }
                                $content .= '</li>';
                              }
                            }
                            $content .= '</ul>';
                          }
                        $content .= '</li>';
                    }
                }
                echo $content;
            }
          ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="search-container">
      <i class="fa-solid fa-magnifying-glass"></i>
      <a href="/lien-he" class="search-contact-btn-container">
        <img src="<?php echo e(asset('themes/frontend/f4web/images/email.png')); ?>" alt="" />
        Liên hệ
      </a>
    </div>
    
    <!-- Start mobile menu -->
    <div class="m-menu">
      <div class="menu-btn">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
    <!-- End mobile menu -->
  </div>
</div>
<?php /**PATH /home/dvthietkewebsite/domains/dichvuthietkewebsite.vn/public_html/resources/views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>