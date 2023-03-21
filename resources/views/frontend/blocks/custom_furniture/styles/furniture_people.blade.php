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
    $first_child = $block_childs->first();
    $last_child = $block_childs->last();
  @endphp

  <div id="people">
    <div class="container">
      <h2 class="mb-5">{{ $title }}</h2>
      <div class="people-employee">
        <div class="row">
          @if ($block_childs)
            @foreach ($block_childs as $item)
              @php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $image_sub = $item->image != '' ? $item->image : null;
              @endphp
    
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="people-employee-img">
                <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                data-src="{{ $image_sub }}" alt="{{ $title_sub }}" />
                </div>
              </div>
            @endforeach
          @endif
        </div>
        <div class="swiper">
          <div class="swiper-wrapper">
            @if ($block_childs)
              @foreach ($block_childs as $item)
                @php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $image_sub = $item->image != '' ? $item->image : null;
                @endphp
      
                <div class="swiper-slide">
                  <div class="people-employee-img">
                  <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
                  data-src="{{ $image_sub }}" alt="{{ $title_sub }}" />
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
