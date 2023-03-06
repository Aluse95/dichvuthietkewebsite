@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
    $first_child = $block_childs->first();
    $last_child = $block_childs->last();
    $childs = $block_childs->filter(function ($value, $key) use ($block_childs, $first_child) {
      return $value->id != $first_child->id;
    });
    $datas = $childs->chunk(2)
  @endphp

  <div id="point">
    <div class="container">
      <h2>{{ $title }}</h2>
      <div class="point-pc">
        <div class="point-container">
          <div class="point-heading-row">
            <div class="row">
              <div class="col-lg-12">
                <div class="point-heading active">
                  <h3>{{ $first_child->json_params->title->{$locale} ?? $first_child->title }}</h3>
                  <i class="{{ $first_child->icon != '' ? $first_child->icon : null }}"></i>
                </div>
              </div>
            </div>
          </div>
          @if ($datas)
            @foreach ($datas as $data)
              <div class="point-heading-row">
                <div class="row">
                  @foreach ($data as $item)
                    @php
                      $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                      $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                      $image_sub = $item->json_params->image ?? $item->image ?? '';
                      $icon_sub = $item->icon != '' ? $item->icon : null;
                      $order = $item->iorder != '' ? $item->iorder : null;
                      $col = $item->id == $last_child->id ? 'col-lg-12' : 'col-lg-6';
                    @endphp
  
                    @if ($order %2 == 0)
                      <div class="{{ $col }}">
                        <div class="point-heading">
                          <h3>{!! $title_sub !!}</h3>
                          <i class="{{ $icon_sub }}"></i>
                        </div>
                      </div>
                    @else
                      <div class="{{ $col }}">
                        <div class="point-heading">
                          <i class="{{ $icon_sub }}"></i>
                          <h3>{!! $title_sub !!}</h3>
                        </div>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            @endforeach
          @endif
          <div class="point-content">
            @if ($block_childs)
              @foreach ($block_childs as $item)
                @php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $image_sub = $item->json_params->image ?? $item->image ?? '';
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                  $active = $item->id == $first_child->id ? 'active' : '';
                @endphp
                
                <div class="point-content-item {{ $active }}">
                  <h3>{!! $title_sub !!}</h3>
                  <p>
                    {!! $content_sub !!}
                  </p>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
      <div class="point-m">
        <div class="swiper">
          <div class="swiper-wrapper">
            @if ($block_childs)
              @foreach ($block_childs as $item)
                @php
                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                  $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                  $image_sub = $item->json_params->image ?? $item->image ?? '';
                  $icon_sub = $item->icon != '' ? $item->icon : null;
                  $active = $item->id == $first_child->id ? 'active' : '';
                @endphp

                <div class="swiper-slide">
                  <div class="point-heading">
                    <i class="fa-solid fa-list-check"></i>
                    <h3>{!! $title_sub !!}</h3>
                    <p>
                      {!! $content_sub !!}
                    </p>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
@endif
