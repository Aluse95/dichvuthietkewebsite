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
    if(count($block_childs) > 2) {
        $childs = $block_childs->chunk(2);
    }
  @endphp
  <style>
      .introduce-us .introduce-us__items:first-child .col-lg-6.col-12{
          display: flex;
          justify-content: end;
          padding-right: 76px;
      }
      .introduce-us .introduce-us__items.flex-row-reverse .col-lg-6.col-12{
          padding-left: 99px;
      }
      .introduce-us .introduce-us__items .bg-img{
          max-height: 590px;
      }
      .introduce-us .introduce-us__items .bg-img img{
         object-fit: cover;
          max-height: 590px;
      }
  </style>

  <section id="vision" class="introduce-us">
      @if ($childs[0])
          @foreach ($childs[0] as $item)
              @php
                  $title_child = $item->json_params->title->{$locale} ?? $item->title;
                  $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                  $content_child = $item->json_params->content->{$locale} ?? $item->content;
                  $image_child = $item->image != '' ? $item->image : null;
                  $row = $item->id == $first_child->id ? '' : 'flex-row-reverse';
              @endphp
              <div class="introduce-us__items d-flex {{$row}}">
                  <div class="col-lg-6 col-12">
                      <div class="content h-100">
                          <div class="h-100 d-flex align-items-center">
                              <div class="col-12">
                                  <div class="v-title">
                                      <h2 class="title">
                                          {!! $title_child !!}
                                      </h2>
                                  </div>
                                  <div>
                                      {!! $brief_child !!}
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-6 col-12 bg-img px-0 d-lg-block d-none">
                      <img class="lazyload img-fluid" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                           data-src="{{ $image_child }}" alt="{{ $title_child }}"/>
                  </div>
      </div>
          @endforeach
      @endif
          <div class="core-values">
              @if ($childs[1])
                  @foreach ($childs[1] as $item)
                      @php
                          $title_child = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                          $sub = $item->sub;
                          $block_sub = $blocks->filter(function ($val, $key) use ($item) {
                              return $val->parent_id == $item->id;
                          });
                      @endphp
              <div class="content">
                  <div class="text-center">
                      <div class="v-title">
                          <h2 class="title">
                              {!! $title_child !!}
                          </h2>
                      </div>
                      <div class="box-description">
                          <p>{!! $brief_child !!}</p>
                      </div>
                  </div>
                  <div class="row box-values">
                      @if ($block_sub)
                          @foreach ($block_sub as $item)
                              @php
                                  $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                  $image_sub = $item->image != '' ? $item->image : null;
                                  $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                              @endphp
                      <div class="box-values__item col-lg-3 col-md-6 col-12">
                          <div class="title">{{$title_sub}}</div>
                          <div class="box-desc pt-3">
                              <p>
                                {!! $brief_sub !!}
                              </p>
                          </div>
                          <div class="img">
                              <div class="text-center">
                                  <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                       data-src="{{ $image_sub }}" alt="{{ $title_sub }}"/>
                              </div>
                          </div>
                      </div>
                          @endforeach
                      @endif
                  </div>
              </div>
                  @endforeach
              @endif
          </div>
  </section>
@endif
