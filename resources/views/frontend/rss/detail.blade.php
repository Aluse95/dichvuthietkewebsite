{{-- <?xml version="1.0" encoding="UTF-8" ?> --}}
<rss version="2.0">

<channel>

    <title>Dịch vụ thiết kế website</title>
    <link>{{ url('/') }}</link>
    <description>Dichvuthietkewebsite RSS</description>
    @isset($posts)
    @foreach ($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <pubDate>{{ $post->updated_at }}</pubDate>
            <link>{{ url('/') }}/{{ $post->alias }}</link>
            <guid>{{ url('/') }}/{{ $post->alias }}</guid>
        </item>
    @endforeach
    @endisset

    @isset($recents)
    @foreach ($recents as $post)
        <item>
            <title>{{ $post->title }}</title>
            <pubDate>{{ $post->updated_at }}</pubDate>
            <link>{{ url('/') }}/{{ $post->alias }}</link>
            <guid>{{ url('/') }}/{{ $post->alias }}</guid>
        </item>
    @endforeach
    @endisset

    @isset($mostViews)
    @foreach ($mostViews as $post)
        <item>
            <title>{{ $post->title }}</title>
            <pubDate>{{ $post->updated_at }}</pubDate>
            <link>{{ url('/') }}/{{ $post->alias }}</link>
            <guid>{{ url('/') }}/{{ $post->alias }}</guid>
        </item>
    @endforeach
    @endisset

    @isset($featured)
    @foreach ($featured as $post)
        <item>
            <title>{{ $post->title }}</title>
            <pubDate>{{ $post->updated_at }}</pubDate>
            <link>{{ url('/') }}/{{ $post->alias }}</link>
            <guid>{{ url('/') }}/{{ $post->alias }}</guid>
        </item>
    @endforeach 
    @endisset

</channel>

</rss>
