@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <div id="interface">
    <div class="container">
      <h2>{{ $title }}</h2>
      <p>
        {{ $brief }}
      </p>
      <div class="row">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $icon_sub = $item->icon != '' ? $item->icon : null;
            @endphp

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="interface-item">
                <i class="{{ $icon_sub }}"></i>
                <div class="interface-item-text">
                  <h3>{{ $title_sub }}</h3>
                  <p>
                    {{ $content_sub }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endif
