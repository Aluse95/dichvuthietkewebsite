@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $seo_title = $page_title . (isset($params['keyword']) && $params['keyword'] != '' ? ': ' . $params['keyword'] : '');
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

  $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
  $params['taxonomy'] = App\Consts::TAXONOMY['product'];
  $taxonomys = App\Models\CmsTaxonomy::where('taxonomy','product')
              ->where('status','active')
              ->get();
  $datas = $taxonomys->chunk(6);

@endphp

@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <style>
    #banner {
      background-image: url("{{ $image_background }}");
      background-position: center top;
      background-repeat: no-repeat;
      background-size: 100%;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      padding: 250px 0 0;
    }
    #category h4,
    .content-wrap h4 {
      font-size: 25px;
      text-transform: capitalize;
      font-weight: 600;
      padding: 10px 20px !important;
      background-color: var(--blue-4);
      color: #fff;
      margin: 0 auto;
      width: fit-content;
      border-radius: 30px;
    }
    #project .project-wrap {
      border: 1px solid var(--blue-4);
    }
    #project .project-item-img {
      border: none;
      border-radius: 16px;
    }
  </style>
  
  <div id="banner">
    <div class="container">
      <h1>
        {{ $page_title }}
        @if (isset($params['keyword']) && $params['keyword'] != '')
          {!! ': ' . $params['keyword'] !!}
        @endif
      </h1>
    </div>
  </div>
  <div id="project">
    <div class="container">
      <h4>
        <span>Kết quả tìm kiếm</span>
      </h4>
      <div class="p-project row">
        @foreach ($posts as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            $link_demo = $item->json_params->link_demo ?? '';
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $item->taxonomy_title, $item->taxonomy_id);
            // $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          @endphp
          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-wrap">
              <div class="project-item-img">
                <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                data-src="{{ $image }}" alt="{{ $title }}" />
                @if ($link_demo)
                  <a href="{{ $link_demo }}" class="demo-btn">Xem Demo</a>
                @endif
                <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
              </div>
              <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
            </div>
          </div>
        @endforeach
      </div>

      <div class="p-project mt-3">
        <div class="d-flex justify-content-center w-100">
          {{ $posts->withQueryString()->links('frontend.pagination.default') }}
        </div>
      </div>

      <div class="m-project row">
        @foreach ($posts as $item)
          @php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            $link_demo = $item->json_params->link_demo ?? '';
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $item->taxonomy_title, $item->taxonomy_id);
            // $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
            // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
          @endphp
          <div class="col-lg-4 col-md-6 col-sm-12 project-item">
            <div class="project-wrap">
              <div class="project-item-img">
                <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                data-src="{{ $image }}" alt="{{ $title }}" />
                @if ($link_demo)
                  <a href="{{ $link_demo }}" class="demo-btn">Xem Demo</a>
                @endif
                <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
              </div>
              <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
            </div>
          </div>
        @endforeach

      </div>
      <div class="m-project mt-3">
        {{ $posts->withQueryString()->links('frontend.pagination.default') }}
      </div>
    </div>
  </div>
  <hr>
  <div id="category">
    <div class="container">
      <h4 class="mt-5">
        <span> Giao diện website theo lĩnh vực </span>
      </h4>
      <div class="p-category row mt-5">
        @isset($taxonomys)
              @foreach ($taxonomys as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->json_params->image ?? '';
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                @endphp

                <a href="{{ $alias_category }}" class="col-lg-2 col-md-3 col-sm-4 category-item">
                  <div class="category-item-img">
                    <img class="img-fluid w-100 h-100 lazyload" 
                    src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                    data-src="{{ $image }}" alt="{{ $title }}">
                  </div>
                  <p>{{ $title }}</p>
                </a>
              @endforeach
            @endisset
      </div>
      <div class="m-category swiper">
        <div class="swiper-wrapper">
          @isset($datas)
            @foreach ($datas as $data)
              <div class="swiper-slide">
                <div class="container">
                  <div class="row">
                    @foreach ($data as $item)
                      @php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $image = $item->json_params->image ?? '';
                        $date = date('H:i d/m/Y', strtotime($item->created_at));
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                      @endphp
                      
                      <div class="col-4">
                        <a href="{{ $alias_category }}" class="category-item">
                          <div class="category-item-img">
                            <img class="img-fluid w-100 h-100 lazyload" 
                            src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                            data-src="{{ $image }}" alt="{{ $title }}">
                          </div>
                          <p>{{ $title }}</p>
                        </a>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            @endforeach
          @endisset
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
  
@endsection
