<footer class="site-footer">
    <div class="footer">
        <div class="container">
            <div class="wrapper w-100 position-relative">
                <div class="box-sologen">
                    <div class="w-100">
                        <section id="contact-form" class="form-default">
                            <div class="container">
                                <div class="bg d-flex flex-wrap justify-content-lg-center">
                                    <div class="col-12 col-lg-6 pl-lg-0 px-0">
                                        <div class="box_title text-left">
                                            <h2 class="title pb-lg-3 pl-lg-2">Đăng ký nhận báo giá</h2>
                                            <p class="bref pb-lg-4 pl-lg-2">Vui lòng điền đầy đủ thông tin. Chúng
                                                tôi sẽ
                                                phản
                                                <br>hồi lại
                                                bạn trong 24h.</p>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <img src="{{asset('themes/frontend/website-service/images/icon-helpline.svg')}}" alt="helpline"/>
                                                </div>
                                                <div class="hotline">
                                                    <p>Hỗ trợ 24/7</p>
                                                    <p>039 824 6112</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-right col-12 col-lg-6">
                                        <form class="form_ajax" method="post" action="{{ route('frontend.contact.store') }}">
                                            @csrf
                                            <div class="form-title text-right"><i>Thông tin bắt buộc *</i></div>
                                            <div class="form-row">
                                                <div class="form-group col-with-border col-lg-6 col-12">
                                                    <div class="border-t">
                                                        <label for="name">@lang('Fullname') <span>*</span></label>
                                                        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Nguyễn Văn A"
                                                               required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-with-border col-lg-6 col-12">
                                                    <div class="border-t">
                                                        <label for="phone">@lang('phone') <span>*</span></label>
                                                        <input type="text" id="phone" name="phone" value="" class="sm-form-control form-control"
                                                               placeholder="" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-6 col-12">
                                                    <div class="border-t">
                                                        <label for="email">Email <span>*</span></label>
                                                        <input type="email" class="form-control" id="email" name="email" value="" placeholder=""
                                                               required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-12">
                                                    <div class="border-t ml-1">
                                                        <label for="inputService">Dịch vụ <span>*</span></label>
                                                        <select id="inputService" class="form-control">
                                                            <option selected>Thiết kế Website</option>
                                                            <option>Convert PSD to HTML</option>
                                                            <option>Lập trình Web App</option>
                                                            <option>Dịch vụ Seo</option>
                                                            <option>Dịch vụ Content</option>
                                                            <option>Thiết kế website giá rẻ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-12">
                                                    <div class="border-t mw-100"></div>
                                                    <label for="content">@lang('Content') <span>*</span></label>
                                                    <input type="text" class="form-control" id="content" name="content" value="" placeholder=""
                                                           required />
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-small">Gửi báo giá
                                            </button>
                                            <input type="hidden" name="is_type" value="contact">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="box-sologen-mid"></div>
                <div class="box-sologen-last"></div>
                <div class="img-footer w-100">
                    <div class="logo-footer mx-auto">
                        <img
                            src="{{ $web_information->image->logo_footer ?? '' }}"
                            alt="{{ $web_information->information->site_name ?? '' }}"
                        />
                    </div>
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
                                    @lang('address'): {{$web_information->information->address}}
                                </li>
                                <li>
                                    @lang('phone'): {{$web_information->information->phone ?? ''}}
                                </li>
                                <li>
                                    Email: {{$web_information->information->email ?? ''}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @isset($menu)
                    @php
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
                    @endphp
                @endisset
                <div class="col-lg-2 col-md-6 col-12 mb-4 pl-lg-0">
                    <div class="block block-menu">
                        <h2 class="block-title text-white">Kết nối với chúng tôi</h2>
                        <div class="block-content">
                            <div class="icon-social d-flex justify-content-between align-items-center">
                                <a href="{{ $web_information->social->facebook ?? '' }}">
                                    <img src="{{ asset('themes/frontend/website-service/images/icon_facebook.svg') }}" alt="Facebook" />
                                </a>
                                <a href="{{ $web_information->social->facebook ?? '' }}">
                                    <img src="{{ asset('themes/frontend/website-service/images/icon_instagram.svg') }}" alt="Facebook" />
                                </a>
                                <a href="{{ $web_information->social->facebook ?? '' }}">
                                    <img src="{{ asset('themes/frontend/website-service/images/icon_twitter.svg') }}" alt="Facebook" />
                                </a>
                                <a href="{{ $web_information->social->facebook ?? '' }}">
                                    <img src="{{ asset('themes/frontend/website-service/images/icon_youtube.svg') }}" alt="Facebook" />
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
                        <img src="{{ asset('themes/frontend/website-service/images/img_fhm.png') }}" alt="FHM" />
                    </div>
                    <div class="col-12 col-lg-6 list-img"
                    >
                        <div class="list-img__item">
                            <img src="{{ asset('themes/frontend/website-service/images/img_announced.png') }}" alt="FHM" />
                        </div>
                        <div class="list-img__item">
                            <img src="{{ asset('themes/frontend/website-service/images/img_ncsc.png') }}" alt="FHM" />
                        </div>
                        <div class="list-img__item">
                            <img src="{{ asset('themes/frontend/website-service/images/img_dmca.png') }}" alt="FHM" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
