@extends("content.app", [
    'seo_title' => json_decode($data->seo_title)->{lang()},
    'seo_description' => strip_tags(json_decode($data->seo_description)->{lang()})
])

@section("content")

<main class="clients-main">
    <div class="clients">
        <div class="container">
            @include("content.parts.partners")
        </div>
    </div>

    <section class="reviews">
        <div class="container">
            <div class="reviews__inner">
                @foreach($reviews as $review)
                <div class="reviews__item">
                    <h4 class="reviews__item-title">
                        {{ json_decode($review->name)->{lang()} }}
                    </h4>
                    <div class="reviews__item-body">
                        <div class="reviews__item-info">
                            <div class="reviews__item-person">
                                <div class="reviews__item-person-img">
                                    <picture><source srcset="{{ url("images", $review->avatar) }}" type="image/webp"><img src="{{ url("images", $review->avatar) }}" alt=""></picture>
                                </div>
                                <div class="reviews__item-person-name">
                                    {{ $review->author }}
                                </div>
                            </div>
                            <div class="reviews__item-img">
                                <picture><source srcset="{{ url("images", $review->image) }}" type="image/webp"><img src="{{ url("images", $review->image) }}" alt=""></picture>
                            </div>
                        </div>
                        <div class="reviews__item-text">
                            <p>
                                {!! json_decode($review->description)->{lang()} !!}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</main>

@endsection
