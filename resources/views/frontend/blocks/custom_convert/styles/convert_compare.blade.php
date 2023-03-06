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
    $first_child = $block_childs->first();
  @endphp

  <div id="compare">
    <div class="container">
      <h2>{{ $title }}</h2>
      <p>
        {!! $brief !!}
      </p>
      <div class="row">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image_sub = $item->json_params->image ?? $item->image ?? '';
              $icon_sub = $item->icon != '' ? $item->icon : null;
            @endphp

            @if ($item->id == $first_child->id)
              <div class="col-lg-6 col-sm-12">
                <div class="compare-item">
                  <div class="title">
                    <h3>{{ $title_sub }}</h3>
                  </div>
                  <p>
                    {!! $content_sub !!}
                  </p>
                </div>
              </div>
            @else
              <div class="col-lg-6 col-sm-12">
                <div class="compare-item">
                  <p>
                    {!! $content_sub !!}
                  </p>
                  <div class="title">
                    <h3>{{ $title_sub }}</h3>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endif
