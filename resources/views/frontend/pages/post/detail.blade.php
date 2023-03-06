@extends('frontend.layouts.default')

@php
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? '';
  $content = $detail->json_params->content->{$locale} ?? '';
  $image = $detail->image != '' ? $detail->image : '';
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : '';
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $taxonomy_alias = Str::slug($taxonomy_title);
  if (isset($taxonomy) && $taxonomy->parent_title !== null) {
      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy->parent_alias ?? $taxonomy->parent_title, $taxonomy->id, null, $taxonomy->alias ?? $taxonomy_title);
  } else {
      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
  }
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
  // schema information
  $datePublished = date('Y-m-d', strtotime($detail->created_at));
  $dateModified = date('Y-m-d', strtotime($detail->updated_at));
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
      <h1>{{ $title }}</h1>
    </div>
  </div>

  <div id="blog-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-sm-12">
          <p style="text-align: justify">
            {!! $content !!}
          </p>
          <div class="blog-detail-share">
            <p>@lang('Share this post'):</p>
            <div class="social">
              <a href="http://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}"
                class="" rel="nofollow" target="_blank">
                <i class="fa-brands fa-facebook"></i>
              </a>
              <a href="https://twitter.com/intent/tweet?url={{ Request::fullUrl() }}"
                class="" rel="nofollow" target="_blank">
                <i class="fa-brands fa-twitter"></i>
              </a>
            </div>
          </div>
          <div class="blog-detail-relate-post">
            @if (isset($relatedPosts) && count($relatedPosts) > 0)
                <p class="title">@lang('Related Posts')</p>
                <div class="row">
                  @foreach ($relatedPosts as $item)
                    @php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                      // $date = date('d/m/Y', strtotime($item->created_at));
                      $date = date('d', strtotime($item->created_at));
                      $month = date('M', strtotime($item->created_at));
                      $year = date('Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                    @endphp

                    <div class="col-lg-4 col-sm-12">
                      <div class="blog-post-container">
                        <div class="blog-post-img">
                          <a href="{{ $alias }}">
                            <img  class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                            data-src="{{ $image }}" alt="{{ $title }}">
                          </a>
                        </div>
                        <div class="blog-post-text">
                          <a href="{{ $alias }}" class="title">
                            {{ Str::limit($title, 100) }}
                          </a>
                          <p class="date">
                            <i class="fa-solid fa-calendar"></i>{{ $date }}/{{ $month }}/{{ $year }}
                          </p>
                        </div>
                      </div>
                    </div>
                  @endforeach

                </div>
              @endif
          </div>
        </div>
        @include('frontend.components.sidebar.post')
        
      </div>
    </div>
  </div>

  {{-- End content --}}
@endsection
