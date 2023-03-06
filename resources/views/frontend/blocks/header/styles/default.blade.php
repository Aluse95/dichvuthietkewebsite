{{-- START HEADER --}}

<form class="" action="{{ route('frontend.search.index') }}" method="get">
  <div id="search-modal">
    <div class="search-modal-container">
      <div class="search-modal-close-button">
        <i class="fa-solid fa-circle-xmark"></i>
      </div>
      <p class="title">Tìm kiếm</p>
      <input type="search" name="keyword" placeholder="Tìm kiếm" value="{{ $params['keyword'] ?? '' }}"/>
      {{-- <p class="label">Lọc theo lĩnh vực</p>
      <select>
        <option value="Thiết kế">Thiết kế</option>
        <option value="Công nghệ">Công nghệ</option>
        <option value="Thương mại điện tử">Thương mại điện tử</option>
        <option value="Thời trang">Thời trang</option>
      </select> --}}
      <button type="submit" class="search-submit-button">
        Tìm kiếm
      </button>
    </div>
  </div>
</form>

<div id="header">
  <div class="container">
    <a href="{{ route('frontend.home') }}" class="logo" data-dark-logo="{{ $web_information->image->logo_header ?? '' }}">
      <img
        src="{{ $web_information->image->logo_header ?? '' }}"
        alt="F4Web Logo"
      />
    </a>
    <div class="menu-container">
      <ul class="list-unstyled d-flex m-0">
        @isset($menu)
          @php
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
        
                                $content .= '<li class="' . $sub_child . '"><a class="d-flex justify-content-between align-items-center" href="' . $url . '"><div class="p-2">' . $title . '</div><span><i class=" '. $icon . ' "></i></span></a>';
                                if ($item_sub->sub > 0) {
                                  $content .= '<ul class="sub-menu-child">';
                                  foreach ($menu as $item_sub_2) {
                                    $url = $title = '';
                                    if ($item_sub_2->parent_id == $item_sub->id) {
                                      $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                      $url = $item_sub_2->url_link;
  
                                      $content .= '<li class="test-sub"><a href="' . $url . '"><div class="p-2">' . $title . '</div></a></li>';
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
          @endphp
        @endisset
      </ul>
    </div>
    <div class="search-container">
      <i class="fa-solid fa-magnifying-glass"></i>
      <a href="/lien-he" class="search-contact-btn-container">
        <img src="{{ asset('themes/frontend/f4web/images/email.png') }}" alt="" />
        Liên hệ
      </a>
    </div>
    
    <!-- Start mobile menu -->
    <div class="m-menu">
      <div class="menu-btn" onclick="openMenu()">
        <i class="fa-solid fa-bars"></i>
      </div>
      <div class="m-menu-modal">
        <div class="m-menu-close-btn" onclick="closeMenu()">
          <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="menu-container">
          <ul class="list-unstyled m-0">
            @isset($menu)
              @php
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
    
                            $content .= '<li class="my-4 ' . $sub . '"><a href= "' . $url . '" class="menu-link '. $active .'">' . $title . '<i class=" '. $icon . '"></i></a>';
                
                              if ($item->sub > 0) {
                                $content .= '<ul class="sub-menu-container">';
                                foreach ($menu as $item_sub) {
                                  $url = $title = '';
                                  if ($item_sub->parent_id == $item->id) {
                                    $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                    $url = $item_sub->url_link;
                                    $sub_child = ($item_sub->sub > 0) ? 'sub-child' : '';
                                    $icon = ($item_sub->sub > 0) ? 'fa-solid fa-chevron-down' : '';
            
                                    $content .= '<li class="' . $sub_child . '"><a class="d-flex justify-content-between align-items-center" href="' . $url . '"><div class="p-2">' . $title . '</div><span><i class=" '. $icon . ' "></i></span></a>';
                                    if ($item_sub->sub > 0) {
                                      $content .= '<ul class="sub-menu-child">';
                                      foreach ($menu as $item_sub_2) {
                                        $url = $title = '';
                                        if ($item_sub_2->parent_id == $item_sub->id) {
                                          $title = isset($item_sub_2->json_params->title->{$locale}) && $item_sub_2->json_params->title->{$locale} != '' ? $item_sub_2->json_params->title->{$locale} : $item_sub_2->name;
                                          $url = $item_sub_2->url_link;
      
                                          $content .= '<li class="test-sub"><a href="' . $url . '"><div class="p-2">' . $title . '</div></a></li>';
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
              @endphp
            @endisset
          </ul>
        </div>
      </div>
    </div>
    <!-- End mobile menu -->
  </div>
</div>
