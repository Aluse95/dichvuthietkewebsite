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

  <div id="process">
    <div class="container">
      <h2>{{ $title }}</h2>
      <div class="process-container">
        <div class="process-list">
          <div class="process-line"></div>
          @if ($block_childs)
            @foreach ($block_childs as $item)
              @php
                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                $image_sub = $item->image != '' ? $item->image : null;
                $icon_sub = $item->icon != '' ? $item->icon : null;
              @endphp

              <div class="process-item">
                <i class="{{ $icon_sub }}"></i>
                <div class="process-item-text">
                  <h3>{{ $title_sub }}</h3>
                  <p>
                    {!! $content_sub !!}
                  </p>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
@endif
