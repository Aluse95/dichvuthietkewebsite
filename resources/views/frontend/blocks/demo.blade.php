@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $params['status'] = App\Consts::POST_STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::POST_TYPE['post'];

        $rows = App\Http\Services\ContentService::getCmsPost($params)
            ->limit(6)
            ->get();
    @endphp

    <div id="blog">
        <div class="container">
            <h2>{{ $title }}</h2>
            <div class="blog-pc">
                <div class="row">
                    @if ($rows)
                        @foreach ($rows as $item)
                            @php
                                $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                                $image_sub = $item->image != '' ? $item->image : null;
                                $icon_sub = $item->icon != '' ? $item->icon : null;
                                $alias = $item->alias ?? '';
                            @endphp

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="blog-item">
                                    <a href="{{ $alias }}" class="blog-item-img">
                                        <img class="lazyload"
                                             src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                             data-src="{{ $image_sub }}" alt="{{ $title_sub }}"
                                        />
                                    </a>
                                    <div class="blog-item-text">
                                        <a href="{{ $alias }}">{{ $title_sub }}</a>
                                        <p>
                                            {{ Str::limit($brief_sub, 100) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="blog-m">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @if ($rows)
                            @foreach ($rows as $item)
                                @php
                                    $title_sub = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_sub = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_sub = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_sub = $item->image != '' ? $item->image : null;
                                    $icon_sub = $item->icon != '' ? $item->icon : null;
                                    $alias = $item->alias ?? '';
                                @endphp

                                <div class="swiper-slide">
                                    <div class="blog-item">
                                        <a href="{{ $alias }}" class="blog-item-img">
                                            <img
                                                class="lazyload"
                                                src="{{ asset('themes/frontend/f4web/images/lazyload.gif')}}"
                                                data-src="{{ $image_sub }}" alt="{{ $title_sub }}"
                                            />
                                        </a>
                                        <div class="blog-item-text">
                                            <a href="{{ $alias }}">{{ $title_sub }}</a>
                                            <p>
                                                {!! Str::limit($brief_sub, 100) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
@endif
