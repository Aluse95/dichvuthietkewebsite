















<header
    class="site-navbar js-sticky-header site-navbar-target"
    role="banner"
>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="site-logo">
                <a href="<?php echo e(route('frontend.home')); ?>" class="logo"
                   data-dark-logo="<?php echo e($web_information->image->logo_header ?? ''); ?>">
                    <img
                        src="<?php echo e($web_information->image->logo_header ?? ''); ?>"
                        alt="logo Website service"
                    />
                </a>
            </div>

            <div class="menu-right">
                <nav class="site-navigation text-right ml-auto" role="navigation">
                    <ul
                        class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block"
                    >
                        <?php if(isset($menu)): ?>
                            <?php
                                $main_menu = $menu->first(function ($item, $key) {
                                    return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == null || $item->parent_id == 0);
                                });
                                if ($main_menu){
                                    $content = '';
                                    foreach ($menu as $item){
                                        $url = $title = '';
                                        if ($item->parent_id == $main_menu->id){
                                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->$title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                            $url = env('APP_URL').$item->url_link;
                                            $active = $url == url()->full() ? ' active' : ''; // Thêm class 'active' nếu là mục hiện tại
                                            $icon = ($item->sub > 0) ? 'fa-solid fa-chevron-down' : '';
                                            $sub = ($item->sub > 0) ? 'sub-menu' : '';

                                            $content .= '<li class="' . $sub . '"><a href="' . $url .'" class="nav-link' . $active . '">' . $title . '</a>';

                                            if ($item->sub > 0) {
                                                $content .= '<ul class="sub-menu-container">';
                                                foreach ($menu as $item_sub){
                                                    $url = $title = '';
                                                    if ($item_sub->parent_id == $item->id){
                                                        $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                                        $url = $item_sub->url_link;
                                                        $sub_child = ($item_sub->$sub >0) ? 'sub-child' : '';
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
                            ?>
                        <?php endif; ?>
                        <li class="search-container">
                                <img
                                    class=""
                                    src="<?php echo (asset('themes/frontend/website-service/images/icon-search.svg')); ?>"
                                    alt="icon-search"
                                />
                        </li>
                        <li>
                            <a href="/lien-he" class="nav-link text-white">
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="toggle-button d-inline-block d-lg-none">
                <a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"
                ><span class="icon-menu h3"></span
                    ></a>
            </div>
        </div>
    </div>
</header>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/header/styles/default.blade.php ENDPATH**/ ?>