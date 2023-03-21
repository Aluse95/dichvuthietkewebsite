@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <div id="project">
    <div class="container">
      <h2>
        <span>{{ $title }}</span>
      </h2>
      <div class="p-project row">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              $alias = $item->url_link ?? '';
              $link_demo = $item->json_params->link_demo ?? '';
            @endphp
  
            <div class="col-lg-4 col-md-6 col-sm-12 project-item">
              <div class="project-item-img">
                <img
                class="lazyload" 
                src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                data-src="{{ $image_sub }}" alt="{{ $title_sub }}"
                />
                @if ($link_demo)
                  <a href="{{ $link_demo }}" class="demo-btn">Xem Demo</a>
                @endif
                <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
              </div>
              <a href="{{ $alias }}" class="project-item-title">{{ $title_sub }}</a>
            </div>
          @endforeach
        @endif
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="{{ $url_link }}" class="button"
            >{{ $url_link_title }}<i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="m-project row">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image_sub = $item->image != '' ? $item->image : null;
              $icon_sub = $item->icon != '' ? $item->icon : null;
              $alias = $item->url_link ?? '';
              $link_demo = $item->json_params->link_demo ?? '';
            @endphp
  
            <div class="col-lg-6 col-md-6 col-sm-6 project-item">
              <div class="project-item-img">
                <img
                class="lazyload" 
                src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                data-src="{{ $image_sub }}" alt="{{ $title_sub }}"
                />
                @if ($link_demo)
                  <a href="{{ $link_demo }}" class="demo-btn">Xem Demo</a>
                @endif
                <a href="{{ $alias }}" class="detail-btn">Xem chi tiết</a>
              </div>
              <a href="{{ $alias }}" class="project-item-title">{{ $title_sub }}</a>
            </div>
          @endforeach
        @endif

        <div class="col-lg-12 d-flex justify-content-center align-items-center">
          <a href="{{ $url_link }}" class="button"
            >{{ $url_link_title }}<i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
@endif
