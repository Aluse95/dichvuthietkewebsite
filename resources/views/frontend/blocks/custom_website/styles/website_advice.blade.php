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

  <div id="advice">
    <div class="">
{{--      <h2>{{ $title }}</h2>--}}
{{--      <p>--}}
{{--        {{ $brief }}--}}
{{--      </p>--}}
      <div class="d-flex box-advice">
        @if ($block_childs)
          @foreach ($block_childs as $item)
            @php
              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
              $image_sub = $item->json_params->image ?? $item->image ?? '';
              $icon_sub = $item->icon != '' ? $item->icon : null;
            @endphp

            <div class="col-lg-6 col-sm-12">
              <div class="advice-item">
{{--                <div class="advice-item-img">--}}
{{--                  <img class="lazyload" --}}
{{--                  src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" --}}
{{--                  data-src="{{ $image_sub }}" alt="{!! $title_sub !!}" />--}}
{{--                </div>--}}
                <div class="advice-item-text">
                    <div class="v-title">
                        <h2 class="title">
                            {!! $title_sub  !!}
                        </h2>
                    </div>
                  <ul>
                    {!! $content_sub !!}
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endif
