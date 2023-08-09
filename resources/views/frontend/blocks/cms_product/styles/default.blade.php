@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];

    $rows = App\Http\Services\ContentService::getCmsPost($params)
      ->limit(20)
      ->get();
    $m_rows = App\Http\Services\ContentService::getCmsPost($params)
      ->limit(3)
      ->get();
  @endphp

  <section id="project" class="our-projects box-bg">
      <div class="bg">
          <div class="card text-white">
              <img class="card-img" src="{{$background}}" alt="Card image">
              <div class="card-img-overlay">
                  <div class="v-title text-center">
                      <div class="box-title text-white">
                          <span>/</span>
                          <span>Our projects</span>
                      </div>
                      <h2 class="title">
                          {{ $title }}
                      </h2>
                  </div>
                  <div class="content">
                      <div class="box_slick">
                          <div class="slider center">
                              @foreach ($rows as $item)
                                  @php
                                      $title = $item->json_params->title->{$locale} ?? $item->title;
                                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                      $link_demo = $item->json_params->link_demo ?? '';
                                      $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                                      $date = date('H:i d/m/Y', strtotime($item->created_at));
                                      // Viet ham xu ly lay slug
                                      $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                                  @endphp

                                  <div class="slide-item">
                                  <div class="position-relative">
                                      <img class="lazyload"  src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                           data-src="{{ $image }}" alt="{{ $title }}" />
                                      <div class="title-bottom">
                                          <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
                                      </div>
                                  </div>
                              </div>

                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
              <div class="template-detail-button text-center">
                  <a href="/kho-giao-dien" class="nav-link">
                      <button class="btn btn-primary btn-medium">
                          Xem toàn bộ sản phẩm
                      </button>
                  </a>
              </div>
          </div>
      </div>
  </section>
@endif
