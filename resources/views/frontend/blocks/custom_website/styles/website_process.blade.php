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
  <section id="process-web" class="process">
      <div class="text-center">
          <div class="v-title">
              <h2 class="title">
                  {{ $title }}
              </h2>
          </div>
      </div>
      <div class="owl-carousel process-list">
          @if ($block_childs)
              @php
                  $stepCount = 1; // Khởi tạo biến đếm bước
              @endphp
              @foreach ($block_childs as $item)
                  @php
                      $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                      $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                      $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                      $image_sub = $item->image != '' ? $item->image : null;
                      $icon_sub = $item->icon != '' ? $item->icon : null;
                  @endphp
          <div class="process-list__item item">
              <div class="content">
                  <div class="w-100 text-center">
                      <div class="step"><span>Bước {{$stepCount++}}</span></div>
                  </div>
                  @if($image_sub)
                      <div class="box-img">
                          <img src="{{$image_sub}}" alt="{{ $title_sub }}">
                      </div>
                  @else
                      <div class="box-icon">
                          <div class="box-icon_item">
                              <i class="{{ $icon_sub }}"></i>
                          </div>
                      </div>
                  @endif
                  <div class="title">{{ $title_sub }}
                  </div>
                  <div class="box-desc">
                      <p>
                          {{ $brief_sub }}
                      </p>
                  </div>
              </div>
          </div>
              @endforeach
          @endif
      </div>

  </section>
@endif
