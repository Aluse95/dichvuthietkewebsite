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
  @endphp

  <style>
    #price {
      margin-top: 50px;
      padding-top: 50px;
      color: var(--blue-4);
      background-color: #f1f1f1;
    }
    .price-img {
      max-width: 30%;
    }
    .btn-price {
      border: none;
      font-weight: 500;
      color: #fff;
      line-height: 40px;
      border-radius: 12px;
      display: inline-block;
      background-color: #ff7b34;
    }
    .btn-price:hover {
      color:rgb(250, 58, 58);
      background-color: #a2b4f8;
    }
    @media (max-width: 540px) {
      .price-img {
      max-width: 100%;
    }
    }
  </style>

  <div id="price">
    <div class="container text-center">
      <h2 class="mb-3">{{ $title }}</h2>
      <h4 class="mb-5">{!! $brief !!}</h4>
      <div class="price-img mx-auto">
        <img class="img-fluid w-100" src="{{ $image }}" alt="{{ $title }}">
        <a href="#form-order" class="button btn-price my-4">
          <span class="px-4 text-uppercase">Đăng kí</span>
        </a>
      </div>
    </div>
  </div>
@endif
