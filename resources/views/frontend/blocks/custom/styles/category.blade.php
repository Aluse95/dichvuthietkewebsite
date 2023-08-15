@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $icon = $block->icon ?? '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];

    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)
    ->limit(10)
    ->get();
    $m_taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    $datas = $m_taxonomys->chunk(6);
  @endphp

  <!-- START CATEGORY -->
      <section id="category" class="category">
          <div class="container">
              <div class="v-title text-center">
                  <div class="box-title">
                      <span>/</span>
                      <span>Our categories</span>
                  </div>
                  <h2 class="title">
                      {{ $title }}
                  </h2>
              </div>
              <div id="categoryList" class="category-list row">
                  @foreach ($taxonomys as $item)
                      @php
                          $title = $item->json_params->title->{$locale} ?? $item->title;
                          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image = $item->json_params->image ?? '';
                          $date = date('H:i d/m/Y', strtotime($item->created_at));
                          // Viet ham xu ly lay slug
                          // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                          $alias = $item->alias ?? '';
                          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                      @endphp
                  <div class="category-list__item col-md-4 col-6 col-lg-20">
                      <a href="{{ $alias_category }}" class="category-item">

                      <div class="content text-center">
                          <div class="img">
                              <img class="img-fluid w-100 h-100 lazyload"
                                   src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                   data-src="{{ $image }}" alt="{{ $title }}">                          </div>
                          <p class="title text-center text-uppercase font-weight-bold line-one">
                              {{ $title }}
                          </p>
                      </div>
                      </a>
                  </div>
                  @endforeach
              </div>
              <div class="template-detail-button text-center">
                  <a href="/kho-giao-dien">
                      <button id="loadMoreButton" class="btn btn-primary btn-medium">
                          Xem toàn bộ Ngành hàng
                      </button>
                  </a>
              </div>
          </div>
      </section>
  <!-- END CATEGORY -->
@endif
