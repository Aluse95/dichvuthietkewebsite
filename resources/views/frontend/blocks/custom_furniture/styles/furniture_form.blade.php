@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
  @endphp

  <style>
    .btn-form {
      color: #fff;
      border: none;
      border-radius: 10px;
      background-color: #ff7b34;
    }
    .card {
      border-radius: 20px;
      background-color: #c0d9f9;
    }
  </style>

  <div class="section m-0 border-bottom" id="form-order"
    @if ($agent->isDesktop()) style="background: url('{{ $background }}') no-repeat center center; background-size: cover; padding: 100px 0;" @endif>
    <div class="container">
      <div class="card card-form shadow-sm py-4 px-3" style="max-width: 50%; margin:auto">
        <div class="card-body">
          <h3 class="mb-3 text-center" style="color: #094ea1">{{ $title }}</h3>
          <p class="mb-3 text-center">{{ $brief }}</p>
          <div class="">
            <div class="form-result"></div>
            <form class="row mb-0 form_ajax" id="template-contactform" name="template-contactform"
              action="{{ route('frontend.contact.store') }}" method="post">
              @csrf
              <div class="col-12 form-group mb-3">
                <label for="name">@lang('Fullname') *</label>
                <input type="text" id="name" name="name" class="form-control input-sm required"
                  value="" required>
              </div>
              <div class="col-12 form-group mb-3">
                <label for="phone">@lang('phone') *</label>
                <input type="text" id="phone" name="phone" class="form-control input-sm required"
                  value="" required>
              </div>
              <div class="col-12 form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control input-sm" value="">
              </div>
              <div class="col-12 form-group mb-4">
                <label for="content">@lang('Content')</label>
                <textarea type="text" id="content" name="content" class="form-control input-sm required" value=""></textarea>
              </div>
              <div class="col-12 form-group mb-0">
                <button
                  class="button btn-form w-100 m-0 py-2 text-uppercase"
                  type="submit" id="submit" name="submit" value="submit">
                  <span>Đăng ký tư vấn</span>
                </button>
              </div>
              <input type="hidden" name="is_type" value="call_request">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
