@extends('frontend.layouts.page')

@php
  $image_background = $web_information->image->background_breadcrumbs ?? '';
@endphp

@push('style')
<style>
  #banner {
    background-image: url("{{ $image_background }}");
    background-position: center top;
    background-repeat: no-repeat;
    background-size: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    padding: 80px 0 0;
  }
</style>
@endpush

@section('content')
  <div id="banner"></div>
  <div id="rss">
    <div class="container">
      <h2 class="my-4">RSS</h2>
      <h3 class="mb-3">Khái niệm RSS</h3>
      <p>RSS ( viết tắt từ Really Simple Syndication ) là một tiêu chuẩn định dạng tài liệu dựa trên 
        XML nhằm giúp người sử dụng dễ dàng cập nhật và tra cứu thông tin một cách nhanh chóng và 
        thuận tiện nhất bằng cách tóm lược thông tin vào trong một đoạn dữ liệu ngắn gọn, hợp chuẩn.
      </p>
      <p>
        Dữ liệu này được các chương trình đọc tin chuyên biệt ( gọi là News reader) phân tích 
        và hiển thị trên máy tính của người sử dụng. Trên trình đọc tin này, người sử dụng có 
        thể thấy những tin chính mới nhất, tiêu đề, tóm tắt và cả đường link để xem toàn bộ tin.
      </p>
      <h3>Kênh do Dichvuthietkewebsite.vn cung cấp</h3>
      <div class="row">
        <div class="col-6">
          <ul class="list-unstyled">
            <li class="py-2">
              <a href="{{ route('frontend.rss.detail', ['alias' => 'tin-moi-nhat'])}}" class="d-flex justify-content-between">
                <div class="rss-item">Tin mới nhất</div>
                <div>RSS <span class="rss-icon"><i class="fa-solid fa-rss"></i></span></div>
              </a>
            </li>
            <li class="py-2">
              <a href="{{ route('frontend.rss.detail', ['alias' => 'tin-xem-nhieu'])}}" class="d-flex justify-content-between">
                <div class="rss-item">Tin xem nhiều</div>
                <div>RSS <span class="rss-icon"><i class="fa-solid fa-rss"></i></span></div>
              </a>
            </li> 
            <li class="py-2">
              <a href="{{ route('frontend.rss.detail', ['alias' => 'tin-noi-bat'])}}" class="d-flex justify-content-between">
                <div class="rss-item">Tin nổi bật</div>
                <div>RSS <span class="rss-icon"><i class="fa-solid fa-rss"></i></span></div>
              </a>
            </li>
            @php
              $params['taxonomy'] = App\Consts::TAXONOMY['post'];
              $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
              $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
            @endphp
            @isset($taxonomys)
              @foreach ($taxonomys as $item)
                <li class="py-2">
                  <a href="{{ route('frontend.rss.detail', ['alias' => $item->alias, 'id' => $item->id ]) }}" class="d-flex justify-content-between">
                    <div class="rss-item">{{ $item->title ?? '' }}</div>
                    <div>RSS <span class="rss-icon"><i class="fa-solid fa-rss"></i></span></div>
                  </a>
                </li>
              @endforeach  
            @endisset
          </ul>
        </div>
      </div>
      <h3>Điều khoản sử dụng</h3>
      <p>
        Các nguồn kênh tin được cung cấp miễn phí cho các cá nhân và các tổ chức phi lợi nhuận. Chúng tôi yêu cầu 
        bạn cung cấp rõ các thông tin cần thiết khi bạn sử dụng các nguồn kênh tin này từ Dichvuthietkewebsite.vn.
      </p>
    </div>
  </div>
@endsection


