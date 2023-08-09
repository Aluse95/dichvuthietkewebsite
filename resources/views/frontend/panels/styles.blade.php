<!-- Stylesheets ============================================= -->

{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/bootstrap.min.css') }}" type="text/css" />--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
  integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--<link rel="preload" href="{{ asset('themes/frontend/f4web/css/style.css') }}" as="style" />--}}
<link rel="preload" href="{{ asset('themes/frontend/f4web/css/responsive.css') }}" as="style" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/all.min.css') }}" type="text/css" />
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/style.css') }}" type="text/css" />--}}
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/custom.css?v=1.1') }}" type="text/css" />
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/introduce.css') }}" type="text/css" />--}}
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/contact.css') }}" type="text/css" />--}}
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/blog-category.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/blog-detail.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/template-detail.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/swiper.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/swiper-bundle.css') }}" type="text/css" />
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/website-design.css') }}" type="text/css" />--}}
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/psd-to-html.css') }}" type="text/css" />--}}
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/webapp.css') }}" type="text/css" />--}}
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/seo.css') }}" type="text/css" />--}}
{{--<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/content-seo.css') }}" type="text/css" />--}}
<link rel="stylesheet" href="{{ asset('themes/frontend/f4web/css/responsive.css') }}" type="text/css" />

{{--VanHT--}}
<link rel="stylesheet" href="{{ asset('themes/frontend/website-service/css/all.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/website-service/css/owl.carousel.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/website-service/css/bootstrap.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/website-service/css/slick.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/website-service/css/slick-theme.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/website-service/css/style.css') }}" type="text/css" />



<style>
  #banner .swiper-slide img {
    height: auto !important;
  }
</style>

{{-- JS Jquery --}}
<script default src="{{ asset('themes/frontend/f4web/js/jquery.js') }}"></script>

@isset($web_information->source_code->header)
  {!! $web_information->source_code->header !!}
@endisset
