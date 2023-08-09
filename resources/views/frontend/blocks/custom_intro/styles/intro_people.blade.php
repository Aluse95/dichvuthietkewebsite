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
  @endphp

      <section id="people" class="power">
          <div class="content">
              <div class="manager text-center">
                  <div class="v-title">
                      <h2 class="title">
                          {{ $title }}
                      </h2>
                  </div>
                  <div class="box-description">
                      <p>
                          {!! $brief !!}
                      </p>
                  </div>
              </div>
              <div class="container">
                  @php
                      $title_child = $first_child->json_params->title->{$locale} ?? $first_child->title;
                      $childs = $blocks->filter(function ($item, $key) use ($first_child) {
                        return $item->parent_id == $first_child->id;
                      });
                  @endphp
                  <div class="text-center">
                      <img src="{{asset('themes/frontend/website-service/images/icon-line.svg')}}" alt="line">
                  </div>
                  <div class="title-content">{{ $title_child }}</div>
                  <div class="row avatar">
                      @if ($childs)
                          @foreach ($childs as $item)
                              @php
                                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                  $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                  $image_sub = $item->image != '' ? $item->image : null;
                              @endphp
                              <div class="avatar-item col-lg-4 col-md-6 col-12">
                          <div class="card">
                              <img class="card-img-top lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                   data-src="{{ $image_sub }}" alt="{{ $brief_sub }}" />
                              <div class="card-body text-center">
                                  <h5 class="card-title">{{ $title_sub }}</h5>
                                  <p class="card-text">{{ $brief_sub }}</p>
                              </div>
                          </div>
                      </div>
                          @endforeach
                      @endif
                  </div>
              </div>
              <div class="container personnel">
                  @php
                      $title_child_2 = $last_child->json_params->title->{$locale} ?? $last_child->title;
                      $childs_2 = $blocks->filter(function ($item, $key) use ($last_child) {
                        return $item->parent_id == $last_child->id;
                      });
                  @endphp
                  <div class="text-center">
                      <img src="{{asset('themes/frontend/website-service/images/icon-line.svg')}}" alt="line">
                  </div>
                  <div class="title-content">{{ $title_child_2 }}</div>
                  <div class="row avatar">
                      @if ($childs_2)
                          @foreach ($childs_2 as $item)
                              @php
                                  $title_sub_2 = $item->json_params->brief->{$locale} ?? $item->brief;
                                  $image_sub_2 = $item->image != '' ? $item->image : null;
                              @endphp
                              <div class="avatar-item col-lg-3 col-md-6 col-12">
                          <div class="card">
                              <img class="card-img-top lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                   data-src="{{ $image_sub_2 }}" alt="{{ $title_child_2 }}" />
                          </div>
                      </div>
                          @endforeach
                      @endif
                  </div>
              </div>
          </div>
      </section>
@endif
