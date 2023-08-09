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
      ->limit(6)
      ->get();
  @endphp

  <div id="project">
    <div class="container">
      <h2>
        <span>{{ $title }}</span>
      </h2>
      <div class="p-project row">
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->json_params->image ?? $item->image ?? '';
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            $link_demo = $item->json_params->link_demo ?? '';
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
          @endphp

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-wrap">
              <div class="project-item-img">
                <img
                class="lazyload" 
                src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                data-src="{{ $image }}" alt="{{ $title }}" 
                />
                @if ($link_demo)
                  <a href="{{ $link_demo }}" class="demo-btn">Xem Demo</a>
                @endif
                <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
              </div>
              <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
            </div>
          </div>         
        @endforeach
        
        <div class="col-lg-12 d-flex justify-content-center align-items-center mt-4">
          <a href="{{ $url_link }}" class="button"
            >{{ $url_link_title }}<i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="m-project row">
        @foreach ($rows as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->json_params->image ?? $item->image ?? '';
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            $link_demo = $item->json_params->link_demo ?? '';
            // Viet ham xu ly lay slug
            $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            // $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
          @endphp

          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-wrap">
              <div class="project-item-img">
                <img
                class="lazyload" 
                src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                data-src="{{ $image }}" alt="{{ $title }}" 
                />
                @if ($link_demo)
                  <a href="{{ $link_demo }}" class="demo-btn">Xem Demo</a>
                @endif
                <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
              </div>
              <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
            </div>
          </div>         
        @endforeach
        
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="{{ $url_link }}" class="button"
            >{{ $url_link_title }}<i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
@endif
