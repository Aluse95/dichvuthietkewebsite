@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <div id="blog">
    <div class="container">
      <h2>{{ $title }}</h2>
      <div class="blog-pc">
        <div class="row">
          @if ($block_childs)
            @foreach ($block_childs as $item)
              @php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                $image_sub = $item->image != '' ? $item->image : null;
                $icon_sub = $item->icon != '' ? $item->icon : null;
              @endphp
  
              <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="blog-item">
                  <div class="blog-item-img">
                    <img class="lazyload" 
                    src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                    data-src="{{ $image_sub }}" alt="{{ $title_sub }}"
                    />
                  </div>
                  <div class="blog-item-text">
                    <a href="#">{{ $title_sub }}</a>
                    <p>
                      {{ Str::limit($content_sub, 100)  }}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
      <div class="blog-m">
        <div class="swiper">
          <div class="swiper-wrapper">
            @if ($block_childs)
              @foreach ($block_childs as $item)
                @php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $image_sub = $item->image != '' ? $item->image : null;
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                @endphp

                <div class="swiper-slide">
                  <div class="blog-item">
                    <div class="blog-item-img">
                      <img
                      class="lazyload" 
                      src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                      data-src="{{ $image_sub }}" alt="{{ $title_sub }}"
                      />
                    </div>
                    <div class="blog-item-text">
                      <a href="#">{{ $title_sub }}</a>
                      <p>
                        {{ Str::limit($content_sub, 100)  }}
                      </p>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
@endif
