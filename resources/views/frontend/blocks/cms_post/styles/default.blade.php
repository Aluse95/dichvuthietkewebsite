@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $params['status'] = App\Consts::POST_STATUS['active'];
    $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['post'];

    $rows = App\Http\Services\ContentService::getCmsPost($params)
        ->limit(3)
        ->get();
  @endphp
  <style>
      #blog{
          padding-bottom: 153px;
      }
  </style>
  <section id="blog" class="category news-list">
      <div class="container">
          <div class="v-title text-center">
              <h2 class="title">
                  Blog & Tin tức
              </h2>
          </div>
          <div class="category-list row">
              @if ($rows)
                  @foreach ($rows as $item)
                      @php
                          $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                          $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                          $image_sub = $item->image != '' ? $item->image : null;
                          $icon_sub = $item->icon != '' ? $item->icon : null;
                          $alias = $item->alias ?? '';
                          $date = date('d', strtotime($item->created_at));
                          $month = date('M', strtotime($item->created_at));
                          $year = date('Y', strtotime($item->created_at));
                      @endphp
                  <div class="category-list__item col-lg-4 col-6">
                      <a href="{{ $alias }}">
                          <div class="content text-left bora-10">
                              <div class="img-animation">
                                  <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                       data-src="{{ $image_sub }}" alt="{{ $title_sub }}">
                              </div>
                              <p class="date">
                                  {{ $date }}/{{ $month }}/{{ $year }}
                              </p>
                              <h3 class="title line-two">
                                  {{ $title_sub }}
                              </h3>
                          </div>
                      </a>
                  </div>
              @endforeach
              @endif
          </div>
      </div>
  </section>

@endif
