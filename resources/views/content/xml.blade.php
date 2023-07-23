<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <posts>
    @foreach ($posts as $item)
        <post>
            <url>{{ url('/') }}/post/{{ $item->id }}</url>
            <title>{{ json_decode($item->name)->ru }}</title>
            <content>{{ json_decode($item->description)->ru }}</content>
            <created_at>{{ $item->created_at->tz('UTC')->toAtomString() }}</created_at>
        </post>
    @endforeach
    </posts>
    <services>
        @foreach ($sections as $item)
            <service>
                <url>{{ url('/') }}/services/{{ $item->slug }}</url>
                <title>{{ json_decode($item->name)->ru }}</title>
                <content>{{ json_decode($item->description)->ru }}</content>
                <created_at>{{ $item->created_at->tz('UTC')->toAtomString() }}</created_at>
            </service>
        @endforeach
    </services>
    <pages>
        @foreach ($pages as $item)
            <page>
                <url>{{ url('/') }}/{{ $item->slug }}</url>
                <title>{{ json_decode($item->name)->ru }}</title>

                <created_at>{{ $item->created_at->tz('UTC')->toAtomString() }}</created_at>
            </page>
        @endforeach
    </pages>
</urlset>
