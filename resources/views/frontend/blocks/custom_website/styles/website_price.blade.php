@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <style>
      .price-template{
          display: flex;
          justify-content: flex-end;
          position: relative;
          top: -59px;
          right: 0;
      }
      .price-template .table{
          max-width: 807px;
      }
      .icon-price img{
          max-width: 116px;
      }
      .icon-price{
          margin-left: -58px;
      }
      .table-price-template{
          position: relative;
          top: -30px;
          left: 58px;
      }
      #price-table-web .table-price-template h2{
          padding: 0;
          margin: 0;
      }
  </style>

  <div id="price-table-web" class="">
    <div class="text-center">
      <h2>{{ $title }}</h2>
      <div class="service-price">
          <table class="table table-striped">
              <thead>
              <tr class="position-relative">
                  <th scope="col">

                  </th>
                  <th scope="col">
                      <p>Gói Basic</p>
                      <p class="price">6.000.000<sup>đ</sup></p>
                  </th>
                  <th scope="col">
                      <p>Gói Advance</p>
                      <p class="price">9.000.000<sup>đ</sup></p>
                  </th>
                  <th scope="col">
                      <p>Gói PRO</p>
                      <p class="price">15.000.000<sup>đ</sup></p>
                  </th>
                  <th scope="col">
                      <p>Gói EXTRA</p>
                      <a href="/lien-he"><p class="contact">Liên hệ</p></a>
                  </th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>Tặng tên miên quốc tế(.com hoặc .net)</td>
                  <td class=""></td>
                  <td class=""></td>
                  <td class=""></td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
              </tr>
              <tr>
                  <td class="">Tặng hosting lưu trữ Website</td>
                  <td class="">05GB</td>
                  <td class="">05GB</td>
                  <td class="">10GB</td>
                  <td class="">Tùy chọn</td>
              </tr>
              <tr>
                  <td class="">Thiết k giao diện (Layout Design)</td>
                  <td class="">Đơn giản, giới thiệu thông tin</td>
                  <td class="">Chuyên nghiệp, chỉnh sửa
                      theo yêu câu</td>
                  <td class="">Thiết kế độc quyền thei
                      yêu cầu</td>
                  <td class="">Theo yêu cầu, Responsive
                      PCs và Mobile</td>
              </tr>
              <tr>
                  <td class="">Tương thích nhều thiết bị: Mobile, Tablets,
                      Desktop</td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
              </tr>
              <tr>
                  <td class="">Tương thích nhều trình duyệt: Chrome, CocCoc, Fire, IE, Safari</td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
              </tr>
              <tr>
                  <td class="border">Thời gian bàn giao</td>
                  <td class="">
                      7 - 10 ngày
                  </td>
                  <td class="">
                      10 - 15 ngày
                  </td>
                  <td class="">
                      15 - 20 ngày
                  </td>
                  <td class="">
                      Liên hê
                  </td>
              </tr>
              <tr>
                  <td class=""></td>
                  <td class="">
                      trọn đơời
                  </td>
                  <td class="">
                      trọn đơời
                  </td>
                  <td class="">
                      trọn đơời
                  </td>
                  <td class="">
                      trọn đơời
                  </td>
              </tr>
              <tr>
                  <td class="">Hỗ trợ đăng bi viết, sản phẩm ban đầu</td>
                  <td class="">
                      10 bài
                  </td>
                  <td class="">
                     25 bài
                  </td>
                  <td class="">
                     50 bài
                  </td>
                  <td class="">
                      Theo yêu cầu
                  </td>
              </tr>
              <tr>
                  <td class="">Đào tạo, hướng dẫn quản trị trực tiếp</td>
                  <td class="">
                     -
                  </td>
                  <td class="">
                     3
                  </td>
                  <td class="">
                     6
                  </td>
                  <td class="">
                      Theo yêu cầu
                  </td>
              </tr>
              <tr>
                  <td class="">Bàn giao Source Code</td>
                  <td class="">
                      -
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
              </tr>
              <tr>
                  <td class="">Nhúng Live chat, Face chat</td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
              </tr>
              <tr>
                  <td class="">Thiết kế chuẩn SEO</td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
              </tr>
              <tr>
                  <td class="">Tư vấn chiến lược Marketing miễn phí</td>
                  <td class="">
                      -
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
                  <td class="">
                      <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                  </td>
              </tr>


              </tbody>
          </table>
      </div>
    </div>
      <div class="position-relative">
          <div class="icon-price">
              <img class="" src="{{asset('themes/frontend/website-service/images/arr-prite.svg')}}" alt="icon price">
          </div>
          <div class="table-price-template">
              <h2 class="title-price">{!! $brief !!}</h2>
              <div class="service-price price-template">
                  <table class="table table-striped">
                      <thead>
                      <tr class="position-relative">
                          <th scope="col">

                          </th>
                          <th scope="col">
                              <p>Gói Basic</p>
                              <p class="price">3.000.000<sup>đ</sup></p>
                          </th>
                          <th scope="col">
                              <div>
                                  <p>Gói Advance</p>
                                  <p class="price">4.500.000<sup>đ</sup></p>
                              </div>

                          </th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>Tặng tên miên quốc tế(.com hoặc .net)</td>
                          <td class=""></td>
                          <td class="">
                              <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                          </td>
                      </tr>
                      <tr>
                          <td class="">Tặng hosting lưu trữ Website</td>
                          <td class="">02 GB</td>
                          <td class="">05 GB</td>
                      </tr>
                      <tr>
                          <td class="">Thiết kế giao diện (Layout Design)</td>
                          <td class="">Chọn giao diện màu có sẵn, tùy chỉnh mãu sắc</td>
                          <td class="">Chọn giao diện màu và tùy chỉnh màu sắc, bố cục</td>
                      </tr>
                      <tr>
                          <td class="">Tương thích nhều trình duyệt: Chrome, CocCoc, Fire, IE, Safari</td>
                          <td class="">
                              <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                          </td>
                          <td class="">
                              <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                          </td>
                      </tr>
                      <tr>
                          <td class="border">Thời gian bàn giao</td>
                          <td class="">
                              7 - 10 ngày
                          </td>
                          <td class="">
                              10 - 15 ngày
                          </td>
                      </tr>
                      <tr>
                          <td class="">Thời hạn bảo hành</td>
                          <td class="">
                              trọn đời
                          </td>
                          <td class="">
                              trọn đời
                          </td>
                      </tr>
                      <tr>
                          <td class="">Đào tạo, hướng dẫn quản trị trực tiếp</td>
                          <td class="">
                              -
                          </td>
                          <td class="">
                              3
                          </td>
                      </tr>
                      <tr>
                          <td class="">Nhúng Live chat, Face chat</td>
                          <td class="">
                              <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                          </td>
                          <td class="">
                              <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                          </td>
                      </tr>
                      <tr>
                          <td class="">Thiết kế chuẩn SEO</td>
                          <td class="">
                              <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                          </td>
                          <td class="">
                              <img class="icon-check-circle" src="{{ asset('themes/frontend/website-service/images/icon-check-circle.svg')}}" alt="icon check"/>
                          </td>
                      </tr>
                      <tr>
                          <td class="">Thời gian và chi phí gia hạn dịch vụ</td>
                          <td class="">
                              <span class="price">900.000<sup>đ</sup></span><span class="number">/năm/lần</span>
                          </td>
                          <td class="">
                              <span class="price">900.000<sup>đ</sup></span><span class="number">/năm/lần</span>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
@endif
