@extends("content.app", [
    'seo_title' => json_decode($data->seo_title)->{lang()},
    'seo_description' => strip_tags(json_decode($data->seo_description)->{lang()})
])
@section("content")

    <main class="blog-main blog-single">
    <div class="container">
        <div class="blog-inner">
            <div class="blog-prev prev-page">
                <a href="#">
                    <svg width="30" height="50" viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24.0553 49.0106L0.760368 26.847C0.48387 26.5831 0.288478 26.2973 0.174193 25.9894C0.0580638 25.6816 0 25.3518 0 25C0 24.6482 0.0580638 24.3184 0.174193 24.0106C0.288478 23.7027 0.48387 23.4169 0.760368 23.153L24.0553 0.923483C24.7005 0.307827 25.5069 0 26.4747 0C27.4424 0 28.2719 0.329815 28.9631 0.989446C29.6544 1.64908 30 2.41865 30 3.29815C30 4.17766 29.6544 4.94723 28.9631 5.60686L8.64055 25L28.9631 44.3931C29.6083 45.0088 29.9309 45.7669 29.9309 46.6675C29.9309 47.5699 29.5853 48.3509 28.894 49.0106C28.2028 49.6702 27.3963 50 26.4747 50C25.553 50 24.7465 49.6702 24.0553 49.0106Z"
                            fill="black" />
                    </svg>
                </a>
            </div>
            <div class="blog-head">
                <div class="blog-date">
                    {{ date("d.m.Y", strtotime($data->created_at)) }}
                </div>
                <div class="title">
                    {!! json_decode($data->name)->{lang()} !!}
                </div>
            </div>
        </div>
    </div>

    <section class="cases">
        <div class="container">
            <div class="cases__inner">
                <div class="cases__sidebar">

                    @foreach(\App\Models\Category::all() as $item)

                        <div class="cases__sidebar-item">
                            <a href="{{ url("blog", $item->slug) }}" class="{{ current_url($item->slug) }}">
                                <div class="cases__sidebar-svg">
                                    {!! $item->svg !!}
                                </div>
                                <div class="cases__sidebar-text">
                                    {{ json_decode($item->name)->{lang()} }}
                                </div>
                            </a>
                        </div>

                    @endforeach

                </div>

                <div class="cases__right">
                    <div class="cases__blogs">
                        <div class="cases__blog blog__single">
                            <div class="cases__blog-img">
                                <picture><source srcset="{{ url("images", $data->image) }}" type="image/webp"><img src="{{ url("images", $data->image) }}" alt=""></picture>
                            </div>
                            <div class="cases__blog-text">
                                {!! json_decode($data->description)->{lang()} !!}
                            </div>
                            <!--<div class="cases__blog-text">
                                <p>
                                    Повседневная практика показывает, что рамки и место обучения кадров в значительной
                                    степени обуславливает создание соответствующий условий активизации. Не следует,
                                    однако забывать, что укрепление и развитие структуры в значительной степени
                                    обуславливает создание модели развития. Повседневная практика показывает, что рамки
                                    и место обучения кадров в значительной степени обуславливает создание
                                    соответствующий условий активизации. Не следует, однако забывать, что укрепление и
                                    развитие структуры в значительной степени обуславливает создание модели развития.
                                    Повседневная практика показывает, что рамки и место обучения кадров в значительной
                                    степени обуславливает создание соответствующий условий активизации.
                                </p>
                            </div>
                            <div class="cases__blog-img">
                                <picture><source srcset="img/cases-blog.webp" type="image/webp"><img src="img/cases-blog.png" alt=""></picture>
                            </div>-->
                            <div class="cases__blog-date">
                                {{ date("d.m.Y", strtotime($data->created_at)) }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

@endsection
