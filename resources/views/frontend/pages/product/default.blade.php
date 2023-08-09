@extends('frontend.layouts.default')

@push('style')
{{--  <link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/template.css') }}" type="text/css" />--}}
@endpush

@php
$page_title = $taxonomy->title ?? ($page->title ?? null);
$page_content = $taxonomy->json_params->content->{$locale} ?? ($page->content ?? null);
$image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
$page_description = $taxonomy->json_params->description->{$locale} ?? $page->description;
@endphp

@section('content')
    <style>
        .category-item .img img {
            transition: transform 0.3s, filter 0.3s;
        }

        .category-item p.title {
            transition: color 0.3s;
        }

        .category-item:hover .img img {
            transform: scale(1.15); /* Tăng kích thước ảnh khi hover */
            /*filter: brightness(0.8); !* Điều chỉnh độ sáng của ảnh *!*/
        }


        .category-item .img  {
            overflow: hidden;
        }

        .category-item:hover p.title {
            color: #364CC3; /* Đổi màu chữ khi hover */
        }
        /*#project .img:hover {*/
        /*    transform: translateY(-10px);*/
        /*    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);*/
        /*}*/
        /*#project .img:hover img {*/
        /*    transform: translateY(-80%);*/
        /*    transition: all linear 8s;*/
        /*}*/
        /*#project .img {*/
        /*    overflow: hidden;*/
        /*    transition: all ease 0.3s;*/
        /*    position: relative;*/
        /*}*/
        /*#project .img img {*/
        /*    width: 100%;*/
        /*    transition: all cubic-bezier(0.77, 0, 0.175, 1) 2s;*/
        /*}*/
    </style>
    <section id="banner" class="slider-title">
    <div class="bg_page position-relative">
        <div class="img">
            <img class="d-block w-100" src="{{ asset('themes/frontend/website-service/images/bg_blog.jpg')}}" alt="banner">
        </div>
        <div class="container">
            <div class="content-page">
                <div class="text-left">
                    <h2 class="title pb-lg-3">
                        {{$page_title}}
                    </h2>
                    <p class="d-md-block d-none">
                     {!! $page_description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
    <section id="project" class="interface-store">
        <div class="v-title text-center">
            <h2 class="title">
                Kho giao diện Website
            </h2>
        </div>
        <div class="category-list row">
            @foreach ($posts as $item)
                @php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    $link_demo = $item->json_params->link_demo ?? '';
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $item->taxonomy_title, $item->taxonomy_id);
                    // $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
                    // $alias = route(App\Consts::ROUTE_POST['product'], ['alias_category' => $item->alias ?? Str::slug($item->title)]);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                @endphp
                <div class="category-list__item col-lg-4 col-4">
                    <div class="content">
                        <div class="img">
                            <img class="lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                 data-src="{{ $image }}" alt="{{ $title }}" />
                        </div>
                        <a href="{{ $alias }}" class="project-item-title">{{ $title }}</a>
                    </div>
                </div>
            @endforeach
            <div class="col-12 page-navigation pr-lg-0">
                {{ $posts->withQueryString()->links('frontend.pagination.default') }}
            </div>
        </div>
    </section>
    <section id="category" class="category industry-directory">
        <div class="container">
            <div class="v-title text-center">
                <h2 class="title">
                    Website theo Ngành hàng
                </h2>
            </div>
            <div class="category-list row">
                @isset($taxonomys)
                    @foreach ($taxonomys as $item)
                        @php
                                $title = $item->json_params->title->{$locale} ?? $item->title;
                                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image = $item->json_params->image ?? '';
                                // Viet ham xu ly lay slug
                                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->alias ?? $title, $item->id);
                        @endphp
                        <div class="category-list__item col-4 col-lg-20">
                            <a href="{{ $alias_category }}" class="category-item">
                            <div class="content text-center bora-10">
                        <div class="img">
                            <img class="img-fluid w-100 h-100 lazyload" src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}" data-src="{{ $image }}" alt="{{ $title }}">
                        </div>
                        <p class="title text-center text-uppercase font-weight-bold line-one">
                            {{ $title }}
                        </p>
                    </div>
                            </a>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
  {{-- End content --}}
@endsection
