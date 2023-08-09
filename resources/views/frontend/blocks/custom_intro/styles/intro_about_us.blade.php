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
  <style>
     #about-us.introduce .content p{
          margin-bottom: 30px;
      }
  </style>

  <section id="about-us" class="introduce box-bg">
      <div class="bg container">
          <div class="col-12 col-lg-6 img position-relative">
              <img class="img-fluid lazyload"
                   src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                   data-src="{{ $image }}" alt="{{ $title }}" />
          </div>
          <div class="content col-12 col-lg-6">
              <div class="v-title">
                  <div class="box-title">
                      <span>/</span>
                      <span>About us</span>
                  </div>
                  <h2 class="title">
                      {{ $title }}
                  </h2>
              </div>
              <div class="content">
                      @if (request()->is('/'))
                          <p class="text-justify mb-5 bref">
                              {!! $brief !!}
                          </p>
                      @else
                          {!! $content !!}
                      @endif
              </div>
              @if (request()->is('/'))
                  <div class="template-detail-button">
                      <a href="/gioi-thieu" class="">
                          <button class="btn bg-primary btn-medium">
                              Xem thêm về chúng tôi
                          </button>
                      </a>
                  </div>
              @endif
          </div>
          <div class="col-12 bg-logo">
              <img src="{{asset('themes/frontend/website-service/images/bg-logo.jpg')}}" alt="banner-logo">
          </div>
      </div>
  </section>

@endif
