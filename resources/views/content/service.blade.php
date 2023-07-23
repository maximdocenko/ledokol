@extends("content.app", [
    'seo_title' => json_decode($item->seo_title)->{lang()},
    'seo_description' => strip_tags(json_decode($item->seo_description)->{lang()})
])
@section("content")

    <main class="single">
        <div class="container">
            <div class="single__head">
                <div class="prev-page">
                    <a href="#">
                        <svg width="30" height="50" viewBox="0 0 30 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.0553 49.0106L0.760368 26.847C0.48387 26.5831 0.288478 26.2973 0.174193 25.9894C0.0580638 25.6816 0 25.3518 0 25C0 24.6482 0.0580638 24.3184 0.174193 24.0106C0.288478 23.7027 0.48387 23.4169 0.760368 23.153L24.0553 0.923483C24.7005 0.307827 25.5069 0 26.4747 0C27.4424 0 28.2719 0.329815 28.9631 0.989446C29.6544 1.64908 30 2.41865 30 3.29815C30 4.17766 29.6544 4.94723 28.9631 5.60686L8.64055 25L28.9631 44.3931C29.6083 45.0088 29.9309 45.7669 29.9309 46.6675C29.9309 47.5699 29.5853 48.3509 28.894 49.0106C28.2028 49.6702 27.3963 50 26.4747 50C25.553 50 24.7465 49.6702 24.0553 49.0106Z"
                                fill="black" />
                        </svg>
                    </a>
                </div>
                <div class="single__title">
                    {{ json_decode($item->name)->{lang()} }}
                </div>
            </div>
        </div>
        <div class="container">

            <div class="single__text">
                {!! nl2br(json_decode($item->content)->{lang()}) !!}
            </div>
            <div class="single__img">
                <picture><source srcset="{{url("images", $item->image)}}" type="image/webp"><img src="{{url("images", $item->image)}}" alt=""></picture>
            </div>

            <div class="single-form">

                <div class="single-form-wrapper">
                    <div class="single-form-inner">
                        <h3 class="single-form__title">
                            Хотите заказать услугу?
                        </h3>
                        <h5 class="single-form__sub">
                            Оставьте данные о вас
                        </h5>
                        <form action="">
                            <div class="single-form-item">
                                <input type="text" placeholder="Как к вам обращаться?">
                            </div>
                            <div class="single-form-item">
                                <input type="tel" placeholder="Телефон для связи">
                            </div>
                            <div class="single-form-submit">
                                <button>Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection
