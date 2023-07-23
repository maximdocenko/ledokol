@extends("content.app", [
    'seo_title' => json_decode($data->seo_title)->{lang()},
    'seo_description' => strip_tags(json_decode($data->seo_description)->{lang()})
])

@section("content")

    <main class="about-main">

        <section class="intro" style="background-image: url('{{ url("img/bg-main.jpg") }}');">
            <div class="container">
                <div class="intro__inner">
                    <h1 class="intro-title">
                        О компании
                    </h1>
                    <div class="intro__ledokol">
                        <picture><source srcset="{{ url("img/LEDOKOL.webp") }}" type="image/webp"><img src="{{ url("img/LEDOKOL.png") }}" alt=""></picture>
                    </div>
                </div>
            </div>
            <div class="section-inner">
                <div class="intro__info intro__info-about">

                    <div class="intro__about">
                        <div class="intro__info-item">
                            <div class="intro__info-title">324</div>
                            <div class="intro__info-text">
                                выполненных проектов
                            </div>
                        </div>
                        <div class="intro__info-item">
                            <div class="intro__info-title">24/7
                            </div>
                            <div class="intro__info-text">
                                поддержка проектов
                            </div>
                        </div>
                        <div class="intro__info-item">
                            <div class="intro__info-title">14+</div>
                            <div class="intro__info-text">
                                лет <br>
                                на рынке
                            </div>
                        </div>
                        <div class="intro__info-item">
                            <div class="intro__info-title">30+</div>
                            <div class="intro__info-text">
                                Специалистов в команде
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <section class="about">
            <div class="container">
                <div class="about__inner">
                    <div class="about__title">
                        О нашей команде
                    </div>
                    <div class="about__text">
                        <p>
                            Самый большой приоритет для нас — профессионализм, непрерывное повышение квалификации и умение
                            работать в команде. Мы честны и открыты, полны энтузиазма и готовы использовать всю накопленную
                            экспертизу агентства для развития бизнеса наших клиентов. 
                        </p>
                    </div>
                    <div class="about__team-wrap">
                        <div class="about__team-title">
                            Топ - менеджеры
                        </div>
                        <div class="about__swiper-wrapper">
                            <div class="swiper-button-prev swiper-button">
                                <svg width="17" height="29" viewBox="0 0 17 29" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 28L2 14.5L16 1" stroke="black" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>

                            <div class="about__teams swiper">
                                <div class="swiper-wrapper">

                                    @foreach(\App\Models\Employee::where("top", 1)->get() as $item)

                                    <div class="swiper-slide">
                                        <div class="about__team-item">
                                            <div class="about__team-img">
                                                <picture><source srcset="{{ url("images", $item->image) }}" type="image/webp"><img src="{{ url("images", $item->image) }}" alt=""></picture>
                                            </div>

                                            <div class="about__team-inner">
                                                <div>
                                                    <div class="about__team-name">
                                                        {{ json_decode($item->name)->{lang()} }}
                                                    </div>
                                                    <div class="about__team-post">
                                                        {{ json_decode($item->job)->{lang()} }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>

                            <div class="swiper-button-next swiper-button">
                                <svg width="17" height="29" viewBox="0 0 17 29" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L15 14.5L1 28" stroke="black" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="our-team">
            <div class="container">
                <div class="our-team__title">
                    Наша команда
                </div>
                <div class="our-team-swiper swiper">
                    <div class="our-team__wrapper swiper-wrapper">

                        @foreach(\App\Models\Employee::where("top", 0)->get() as $item)

                        <div class="swiper-slide">
                            <div class="our-team__person">
                                <div class="our-team__img">
                                    <picture><source srcset="{{ url("images", $item->image) }}" type="image/webp"><img src="{{ url("images", $item->image) }}" alt=""></picture>
                                </div>
                                <div class="our-team__info">
                                    <h5 class="our-team__name">
                                        {{ json_decode($item->name)->{lang()} }}
                                    </h5>
                                    <h6 class="our-team__post">
                                        {{ json_decode($item->job)->{lang()} }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>

            </div>
        </section>

        <section class="about__partners">
            <div class="container">
                @include("content.parts.partners")
            </div>
        </section>

        <div id="modal-media-video" uk-modal>
            <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical" style="padding: 0;">
                <button class="uk-modal-close-outside" type="button" uk-close></button>
                <iframe width="1000" height="550" src="https://www.youtube.com/embed/mQAhkIOQ0zg" frameborder="0"
                        allow="autoplay;" uk-video uk-responsive class="uk-responsive-width"></iframe>
            </div>
        </div>

    </main>

@endsection
