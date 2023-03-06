@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
  @endphp

  <div id="seo-content">
    <div class="container">
      <h2>{{ $title }}</h2>
    </div>
  </div>
@endif
