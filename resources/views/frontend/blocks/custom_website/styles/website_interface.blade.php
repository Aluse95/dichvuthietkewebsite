@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

  <section id="interface" class="interface">
      <div class="content">
          <div class="text-center">
              <div class="v-title">
                  <h2 class="title">
                      {{ $title }}
                  </h2>
              </div>
              <div class="box-description">
                  <p>
                    {!! $brief !!}}
                  </p>
              </div>
          </div>
          <div class="row box-values">
              @if ($block_childs)
                  @foreach ($block_childs as $item)
                      @php
                          $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                          $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                          $icon_sub = $item->icon != '' ? $item->icon : null;
                          $image_child = $item->image != '' ? $item->image : null;
                      @endphp
                      <div class="box-values__item col-lg-3 col-md-6 col-12">
                          <div class="title">{{ $title_sub }}</div>
                          <div class="box-desc pt-3">
                              <p>
                                  {!! $content_sub !!}
                              </p>
                          </div>
                          <div class="img">
                              <div class="text-center">
                                  <img src="{{$image_child}}" alt="Thấu hiểu">
                              </div>
                          </div>
                      </div>
                  @endforeach
              @endif
          </div>
      </div>
  </section>
@endif
