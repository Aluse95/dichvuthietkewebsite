<footer class="site-footer">
    <div class="footer footer-contact">
        <div class="container">
            <div class="wrapper w-100 position-relative">
            <div class="box-sologen">
                <div class="row">
                    <div class="address col-lg-6 col-12">
                        <div class="v-title">
                            <h2 class="title black">
                                Liên hệ với chúng tôi
                            </h2>
                        </div>
                        <div class="address-content">
                            <div class="address-content__item">
                                <p class="f-w-500">Hà Nội</p>
                                <p><?php echo e($web_information->information->address); ?></p>
                                <p><?php echo e($web_information->information->phone ?? ''); ?></p>
                                <p class="d-flex justify-content-between"><span><?php echo e($web_information->information->email ?? ''); ?></span>
                                    <span><img src="<?php echo e(asset('themes/frontend/website-service/images/icon-add.svg')); ?>" alt="icon address"> Xem bản đồ</span>
                                </p>
                            </div>
                            <div class="address-content__item">
                                <p class="f-w-500">Hồ Chí Minh City</p>
                                <p>Phòng L17-11, Tầng 17, Vincom Center, 45A Lý Tự<br>
                                    Trọng, Phường Bến Nghé, Quận 1, TP HCM</p>
                                <p>039 824 6112</p>
                                <p class="d-flex justify-content-between"><span>fhmvietnam@gmail.com</span>
                                    <span><img src="<?php echo e(asset('themes/frontend/website-service/images/icon-add.svg')); ?>" alt="icon address"> Xem bản đồ</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="box-map">
                            <?php echo $web_information->information->map ?? 'ahihi'; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="box-sologen-mid"></div>
            <div class="box-sologen-last"></div>
            <div class="img-footer w-100">
                <div class="logo-footer mx-auto">
                    <img
                        src="<?php echo e($web_information->image->logo_footer ?? ''); ?>"
                        alt="<?php echo e($web_information->information->site_name ?? ''); ?>"
                    />
                </div>
            </div>
        </div>
        <div class="container footer-list">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="block block-menu">
                        <h2 class="block-title text-white">Liên hệ</h2>
                        <div class="block-content">
                            <ul>
                                <li class="lh-28">
                                    <?php echo app('translator')->get('address'); ?>: <?php echo e($web_information->information->address); ?>

                                </li>
                                <li>
                                    <?php echo app('translator')->get('phone'); ?>: <?php echo e($web_information->information->phone ?? ''); ?>

                                </li>
                                <li>
                                    Email: <?php echo e($web_information->information->email ?? ''); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if(isset($menu)): ?>
                    <?php
                        $footer_menu = $menu->filter(function ($item, $key){
                            return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                        });

                        $content = '';

                        foreach ($footer_menu as $main_menu){
                            $url = $title = '';
                            $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                            $content .= '<div class="col-lg-3 col-md-6 col-12 mb-4">';
                            $content .= '<div class="block block-menu">';
                            $content .= '<h2 class="block-title text-white">' . $title . '</h2>';
                            $content .= '<div class="block-content">';
                            $content .= '<ul>';
                            $sub = $main_menu->sub;

                      if($sub <= 8) {

                        foreach ($menu as $item) {

                          if ($item->parent_id == $main_menu->id) {
                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                            $url = $item->url_link;
                            $active = $url == url()->current() ? 'active' : '';
                            $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                            if ($item->sub > 0) {
                              $content .= '<ul class="sub-footer">';
                              foreach ($menu as $item_sub) {
                                $url = $title = '';
                                if ($item_sub->parent_id == $item->id) {
                                  $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                  $url = $item_sub->url_link;

                                  $content .= '<li><a href="' . $url . '">' . $title . '</a></li>';
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
                          $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                          $content .= '</li>';
                        }
                      }

                      $content .= '</ul>';
                      $content .= '</div>';
                      $content .= '</div>';
                      $content .= '</div>';

                        }
                        echo $content;
                    ?>
                <?php endif; ?>
                <div class="col-lg-2 col-md-6 col-12 mb-4 pl-lg-0">
                    <div class="block block-menu">
                        <h2 class="block-title text-white">Kết nối với chúng tôi</h2>
                        <div class="block-content">
                            <div class="icon-social d-flex justify-content-between align-items-center">
                                <a href="<?php echo e($web_information->social->facebook ?? ''); ?>">
                                    <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_facebook.svg')); ?>" alt="Facebook" />
                                </a>
                                <a href="<?php echo e($web_information->social->facebook ?? ''); ?>">
                                    <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_instagram.svg')); ?>" alt="Facebook" />
                                </a>
                                <a href="<?php echo e($web_information->social->facebook ?? ''); ?>">
                                    <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_twitter.svg')); ?>" alt="Facebook" />
                                </a>
                                <a href="<?php echo e($web_information->social->facebook ?? ''); ?>">
                                    <img src="<?php echo e(asset('themes/frontend/website-service/images/icon_youtube.svg')); ?>" alt="Facebook" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom container">
                <div
                    class="row align-items-center"
                >
                    <div class="col-12 col-lg-6 mb-3 px-lg-0 mb-lg-0">
                        <span class="pr-4">Bản quyền © 2023 FHM Vietnam. Bảo lưu mọi quyền.</span>
                        <img src="<?php echo e(asset('themes/frontend/website-service/images/img_fhm.png')); ?>" alt="FHM" />
                    </div>
                    <div class="col-12 col-lg-6 list-img"
                    >
                        <div class="list-img__item">
                            <img src="<?php echo e(asset('themes/frontend/website-service/images/img_announced.png')); ?>" alt="FHM" />
                        </div>
                        <div class="list-img__item">
                            <img src="<?php echo e(asset('themes/frontend/website-service/images/img_ncsc.png')); ?>" alt="FHM" />
                        </div>
                        <div class="list-img__item">
                            <img src="<?php echo e(asset('themes/frontend/website-service/images/img_dmca.png')); ?>" alt="FHM" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH D:\FHM\dichvuthietkewebsite\resources\views/frontend/blocks/footer/styles/footer_contact.blade.php ENDPATH**/ ?>