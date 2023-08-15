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

  <div id="why-choose">
    <div class="container">
      <h2>
        {{ $title }}
      </h2>
      <p>
        {!! $brief !!}
      </p>
      <div class="why-choose-img">
        <img src="{{ $image }}" alt="{{ $title }}" />
      </div>
      <div class="why-choose-m">
        <div class="row">
          <div class="col-sm-12">
            @if ($block_childs)
              @foreach ($block_childs as $item)
              @php
                  $title_child = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_child = $item->json_params->content->{$locale} ?? $item->content;
                  $image_child = $item->image != '' ? $item->image : null;
                  $icon = $item->icon != '' ? $item->icon : '';
              @endphp

              <div class="why-choose-item">
                <i class="{{ $icon }}"></i>
                <h3>{{ $title_child }}</h3>
                <p>
                  {!! $content_child !!}
                </p>
              </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

@endif
