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

  <div id="price-table">
    <div class="container">
      <h2>{{ $title }}</h2>
      <div class="price-table-img">
        <img
        class="lazyload" 
        src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
        data-src="{{ $image }}" alt="{{ $title }}" 
        />
      </div>
      <h2 class="mt-5">{{ $brief }}</h2>
      <div class="price-table-img">
        <img
        class="lazyload" 
        src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
        data-src="{{ $image_background }}" alt="{{ $brief }}"
        />
      </div>
    </div>
  </div>
@endif