@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $seo_title = $page_title . (isset($params['keyword']) && $params['keyword'] != '' ? ': ' . $params['keyword'] : '');
  
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
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


  <section id="content pt-5">
    <div class="content-wrap">
      <div class="container mb-3">
        <div class="row mb-5 mt-5 clearfix">
          <div class="postcontent col-lg-9">
            <div class="row">
              @foreach ($posts as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  // $date = date('H:i d/m/Y', strtotime($item->created_at));
                  $date = date('d', strtotime($item->created_at));
                  $month = date('M', strtotime($item->created_at));
                  $year = date('Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail', $item->taxonomy_title);
                @endphp

                <div class="col-lg-6 col-sm-12">
                  <div class="blog-post-container">
                    <div class="blog-post-img">
                      <a href="{{ $alias }}"><img src="{{ $image }}" alt="{{ $title }}"></a>
                    </div>
                    <div class="blog-post-text">
                      <a href="{{ $alias }}" class="title">{{ $title }}</a>
                      <p class="date">
                        <i class="fa-solid fa-calendar"></i>{{ $date }}/{{ $month }}/{{ $year }}
                      </p>
                    </div>
                  </div>
                </div>
              @endforeach
              {{ $posts->withQueryString()->links('frontend.pagination.default') }}
            </div>
          </div>

          @include('frontend.components.sidebar.post')
        </div>
      </div>
    </div>
  </section>

  {{-- End content --}}
@endsection
