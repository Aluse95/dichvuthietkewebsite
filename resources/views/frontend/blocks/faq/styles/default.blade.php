@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $icon = $block->icon ?? '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        $index = 1;
        $id = $block_childs->first()->id;
    @endphp

    <section id="faq" class="faqs">
        <div class="container d-flex flex-wrap">
            <div class="col-12 col-lg-5 img pl-lg-0">
                <div class="item_video">
                    <div class="frame">
                        <iframe width="100%" height="411"
                                src="https://www.youtube.com/embed/ERKM3OTLfb4"
                                title="YouTube video player" frameborder="0"
                                class="rounded-circle"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen="">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 pr-lg-0">
                <div class="v-title">
                    <div class="box-title">
                        <span>/</span>
                        <span>faqs</span>
                    </div>
                    <h2 class="title">
                        {{ $title }}
                    </h2>
                </div>
                <div class="content">
                    <div class="tab-container">
                        <!-- Tab 1 -->
                        @if ($block_childs)
                            @foreach ($block_childs as $item)
                                @php
                                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_child = $item->image != '' ? $item->image : null;
                                    $url_link = $item->url_link != '' ? $item->url_link : '';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon = $item->icon != '' ? $item->icon : '';
                                    $style = $item->json_params->style ?? '';
                                    $active = $item->id == $id ? 'active' : '';
  //                              @endphp
                                <div class="tab-accordian">
                                    <div class="titleWrapper inactive">
                                        <h3>{!! $index++ . '. ' . $brief_child !!}</h3>

                                        <div class="collapse-icon">
                                            <div class="acc-close"></div>
                                            <div class="acc-open"></div>
                                        </div>
                                    </div>
                                    <div id="descwrapper" class="desWrapper">
                                        <p> {{ $content_child }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
