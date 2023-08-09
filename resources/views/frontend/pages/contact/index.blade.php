@extends('frontend.layouts.default')

@section('content')
    <div class="contact-us">
        <section class="slider-title">
            <div class="bg_page position-relative">
                <div class="img">
                    <img class="d-block w-100 h-100" src="{{ asset('themes/frontend/website-service/images/bg_contact_us.jpg') }}" alt="banner">
                </div>
                <div class="container">
                    <div class="content-page position-absolute">
                        <div class="text-left">
                            <h2 class="title pb-lg-3">
                                Liên hệ tư vấn
                            </h2>
                            <p class="d-md-block d-none">
                                Chúng tôi cung cấp giải pháp thiết kế Website<br> tổng thể cho Doanh nghiệp.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Print all content by [module - route - page] without blocks content at here --}}
        <section id="contact-form" class="form-contact">
            <div class="container">
                <div class="bg">
                    <div class="box_title text-center">
                        <h2 class="title">Đăng ký nhận báo giá</h2>
                        <p class="bref py-4">Vui lòng điền đầy đủ thông tin. Chúng tôi sẽ
                            phản hồi lại bạn trong 24h.</p>
                        <div class="line-bottom mt-2"></div>
                    </div>
                    <div class="w-100">
                        <form class="form_ajax" method="post" action="{{ route('frontend.contact.store') }}">
                            @csrf
                            <div class="form-title text-right"><i>Thông tin bắt buộc *</i></div>
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-12">
                                    <div class="border-t">
                                        <label for="name">@lang('Fullname') <span>*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Nguyễn Văn A"
                                               required />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <div class="border-t border-l">
                                        <label for="phone">@lang('phone') <span>*</span></label>
                                        <input type="text" id="phone" name="phone" value="" class="sm-form-control form-control"
                                               placeholder="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-12">
                                    <div class="border-t">
                                        <label for="email">Email <span>*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="" placeholder=""
                                               required />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <div class="border-t border-l">
                                        <label for="inputService">Dịch vụ <span>*</span></label>
                                        <select id="inputService" class="form-control">
                                            <option selected>Thiết kế Website</option>
                                            <option>Convert PSD to HTML</option>
                                            <option>Lập trình Web App</option>
                                            <option>Dịch vụ Seo</option>
                                            <option>Dịch vụ Content</option>
                                            <option>Thiết kế website giá rẻ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <div class="border-t mw-100"></div>
                                    <label for="content">@lang('Content') <span>*</span></label>
                                    <input type="text" class="form-control" id="content" name="content" value="" placeholder=""
                                           required />
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-small">Gửi báo giá
                                </button>
                                <input type="hidden" name="is_type" value="contact">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
