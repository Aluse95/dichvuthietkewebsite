@extends('frontend.layouts.page')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? ($page->name ?? ''));
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
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
    padding: 150px 0 0;
  }
</style>
@endpush

@section('content')
  @if (isset($page->content) && $page->content != '')
    <div class="" id="banner">
      <div class="container">
        <h1>{!! $page->content ?? '' !!}</h1>
      </div>
    </div>
  @endif
@endsection


