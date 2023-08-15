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

  <div id="point-web">
    <div class="">
      <div class="row">
        <div class="col-lg-6 col-sm-12 d-flex justify-content-end">
          <div class="point-content">
              <div class="v-title">
                  <h2 class="title">
                      {{ $title }}
                  </h2>
              </div>
              <ul>
              @if ($block_childs)
                @foreach ($block_childs as $item)
                  @php
                    $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image_sub = $item->image != '' ? $item->image : null;
                    $icon_sub = $item->icon != '' ? $item->icon : null;
                  @endphp
                  <li>
                      <img class="" src="{{asset('themes/frontend/website-service/images/icon-check.svg')}}" alt="Icon check">
                      <p>
                      {{ $brief_sub }}
                    </p>
                  </li>
                @endforeach
              @endif
            </ul>
              <div class="template-detail-button">
                  <a href="/lien-he" class="">
                      <button class="btn bg-primary btn-medium">
                         Đăng ký tư vấn
                      </button>
                  </a>
              </div>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="point-img">
            <img class="lazyload img-fluid h-100"
            src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
            data-src="{{ $image }}" alt="{{ $title }}"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
