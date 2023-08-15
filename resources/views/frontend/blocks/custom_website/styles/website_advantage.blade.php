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

  <section id="advantage" class="advantage">
      <div class="text-white">
          <img class="card-img" src="{{asset('themes/frontend/website-service/images/bg-advantage.jpg')}}" alt="Card image">
          <div class="box-advantage">
              <div class="v-title text-center">
                  <h2 class="title">
                      {{ $title }}
                  </h2>
                  <div class="desc">
                      <p>{!! $brief !!}</p>
                  </div>
              </div>
              <div class="owl-carousel advantage-list">
                  @if ($block_childs)
                      @foreach ($block_childs as $item)
                          @php
                              $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                              $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                              $icon_sub = $item->icon != '' ? $item->icon : null;
                              $image_sub = $item->image != '' ? $item->image : null;
                          @endphp
                          <div class="advantage-list__item item">
                              <div class="content">
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
  </section>
@endif
