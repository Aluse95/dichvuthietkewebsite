@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $image_background = $block->image_background != '' ? $block->image_background : null;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <style>
    #advantage-content {
      background-image: url("{{ $image }}");
      background-size: contain;
      background-position: center;
      background-repeat: no-repeat;  
    }
    @media (max-width: 540px) {
      #advantage-content {
        background-image: none;
      }
    }
  </style>

  <div id="advantage-content">
    <div class="container">
      <h2>{{ $title }}</h2>
      <div class="row bg-content">
        <div class="col-lg-6 col-sm-12">
          {{-- <div class="advantage-img">
            <img
            class="lazyload" 
            src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" 
            data-src="{{ $image }}" alt="{{ $title }}" 
            />
          </div> --}}
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="advatage-content-list">
            @if ($block_childs)
              @foreach ($block_childs as $item)
                @php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                @endphp

                <div class="advantage-content-item">
                  <div class="advantage-content-item-text">
                    <h3>
                      {{ $title_sub }}
                    </h3>
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
  </div>
@endif
