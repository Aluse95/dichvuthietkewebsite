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

  <section id="why-choose" class="why_choose">
      <div class="content">
          <div class="text-center">
              <div class="v-title">
                  <h2 class="title">
                      {!! $title !!}
                  </h2>
              </div>
              <div class="box-description">
                  <p>
                      {!! $brief !!}
                  </p>
              </div>
          </div>
          <div class="row box-values">
              @if ($block_childs)
                  @foreach ($block_childs as $item)
                      @php
                          $title_child = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                          $content_child = $item->json_params->content->{$locale} ?? $item->content;
                          $image_child = $item->image != '' ? $item->image : null;
                          $icon = $item->icon != '' ? $item->icon : '';
                      @endphp
              <div class="box-values__item col-lg-4 col-12">
                  <div class="box-img">
                      <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                           data-src="{{ $image_child }}" alt="{{ $title_child }}" />
                  </div>
                  <div class="title">{{ $title_child }}
                  </div>
                  <div class="box-desc pt-3">
                      <p>
                          {!! $content_child !!}
                      </p>
                  </div>
              </div>
                  @endforeach
              @endif
          </div>
      </div>
  </section>

@endif
