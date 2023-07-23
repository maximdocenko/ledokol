@extends("content.app")

@section("content")

    <main>

        <section class="intro" style="background-image: url('img/bg-main.jpg');">
            <div class="container">
                <div class="intro__inner">
                    <h1 class="intro-title">
                        Рекламный холдинг
                    </h1>
                    <div class="intro__ledokol">
                        <picture><source srcset="img/LEDOKOL.webp" type="image/webp"><img src="img/LEDOKOL.png" alt=""></picture>
                    </div>
                </div>
            </div>
            <div class="section-inner">
                <div class="intro__info intro__info-home">
                    <div class="intro__statis">
                        <h4 class="intro__statis-num">
                            14+
                        </h4>
                        <p class="intro__statis-text">
                            лет <br>
                            на рынке
                        </p>
                    </div>
                    <div class="intro__statis">
                        <h4 class="intro__statis-num">
                            324
                        </h4>
                        <p class="intro__statis-text">
                            выполненных
                            проектов
                        </p>
                    </div>
                    <div class="intro__statis">
                        <h4 class="intro__statis-num">
                            24/7
                        </h4>
                        <p class="intro__statis-text">
                            поддержка <br>
                            проектов
                        </p>
                    </div>
                    <div class="intro__statis">
                        <h4 class="intro__statis-num">
                            ~10%
                        </h4>
                        <p class="intro__statis-text">
                            доли рекламного рынка РУз в 2021* году
                        </p>
                    </div>
                    <button class="intro__info-link" type="button" uk-toggle="target: #contact-modal">
                    <span class="intro__info-link__text">
                        Оставить
                        заявку
                    </span>
                        <span class="intro__info-link__svg">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="23.7715" y="4.82617" width="2.22892" height="21.1747" fill="white" />
                            <rect x="0.251953" y="1.82812" width="2.22892" height="33.58"
                                  transform="rotate(-45 0.251953 1.82812)" fill="white" />
                            <rect x="4.82227" y="26" width="2.22892" height="21.1747" transform="rotate(-90 4.82227 26)"
                                  fill="white" />
                        </svg>
                    </span>
                    </button>
                </div>
            </div>

        </section>


        <section class="aboutsec">
            <div class="container">
                <div class="aboutsec__inner">
                    <div class="aboutsec__left">
                        <h2 class="aboutsec__title">
                            {{ textblock(8)['name'] }}
                        </h2>
                        <div class="aboutsec__info uk-flex">
                            <div class="aboutsec__info-col">
                                <h6 class="aboutsec__info-title">
                                    стратегический партнер
                                </h6>
                                <div class="aboutsec__info-img">
                                    <img src="img/google.svg" alt="">
                                </div>
                            </div>
                            <div class="aboutsec__info-col">
                                <h6 class="aboutsec__info-title">
                                    годовой рост портфеля
                                </h6>
                                <div class="aboutsec__info-text">
                                    +23%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aboutsec__text">
                        {!! textblock(8)['description'] !!}
                    </div>
                </div>
            </div>
        </section>


        <section class="partners">
            <div class="container">
                @include("content.parts.partners")
            </div>
        </section>


        <section class="services">
            <div class="container">
                <div class="services__inner">
                    <h2 class="services__title">
                        Услуги
                    </h2>
                    <div class="services__cards">
                        @php $i=1 @endphp
                        @foreach(\App\Models\Section::all() as $item)
                            <a href="{{ url("services", $item->slug) }}" class="services__card services__card-{{$i++}}">
                                <div class="services__card-content">

                                    <h3 class="services__card-title">
                                        {{ json_decode($item->name)->{lang()} }}
                                    </h3>
                                    <ul class="custom-list services__card-ul">
                                        @foreach(explode("\n", json_decode($item->description)->{lang()}) as $li)
                                        <li>{!! $li !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="services__card-img">
                                    <picture><source srcset="{{url("images", $item->image)}}" type="image/webp">
                                        <img src="{{url("images", $item->image)}}" alt="">
                                    </picture>
                                </div>
                            </a>
                        @endforeach

                        <!--

                        <a href="{{ url("services/1") }}" class="services__card services__card-1">
                            <div class="services__card-content">

                                <h3 class="services__card-title">
                                    Стратегия
                                    и исследование
                                </h3>
                                <ul class="custom-list services__card-ul">
                                    <li>Исследование потребителей</li>
                                    <li>Разработка медиа-стратегии</li>
                                    <li>Обзор медиарынка</li>
                                    <li>Анализ конкурентов и бизнес-аналитика</li>
                                </ul>
                            </div>
                            <div class="services__card-img">
                                <picture><source srcset="img/service-1.webp" type="image/webp"><img src="img/service-1.png" alt=""></picture>
                            </div>
                        </a>

                        <a href="{{ url("services/1") }}" class="services__card services__card-2">
                            <div class="services__card-content">
                                <h3 class="services__card-title">
                                    Закупки
                                </h3>
                                <ul class="custom-list services__card-ul">
                                    <li>Переговоры с поставщиками</li>
                                    <li>Закупка медиаинвентаря</li>
                                    <li>Подготовка, консолидация и сопровождение сделок</li>
                                    <li>Тактическая оптимизация цены</li>
                                    <li>Размещение рекламы и отчетность</li>
                                </ul>
                            </div>

                            <div class="services__card-img">
                                <picture><source srcset="img/service-2.webp" type="image/webp"><img src="img/service-2.png" alt=""></picture>
                            </div>
                        </a>

                        <a href="{{ url("services/1") }}" class="services__card services__card-3">
                            <div class="services__card-content">

                                <h3 class="services__card-title">
                                    Региональный департамент
                                </h3>
                                <ul class="custom-list services__card-ul">
                                    <li>Мощный региональный баинг и экспертиза</li>
                                    <li> Быстрые локальные сделки</li>
                                </ul>
                            </div>

                            <div class="services__card-img">
                                <picture><source srcset="img/service-3.webp" type="image/webp"><img src="img/service-3.png" alt=""></picture>
                            </div>
                        </a>

                        <a href="{{ url("services/1") }}" class="services__card services__card-4">
                            <div class="services__card-content">

                                <h3 class="services__card-title">
                                    Digital
                                </h3>
                                <ul class="custom-list services__card-ul">
                                    <li>Таргетированная баннерная/видео реклама</li>
                                    <li>Реклама в социальные сети</li>
                                    <li>Перформанс маркетин</li>
                                    <li>PR-статьи и реклама в Telegram каналах</li>
                                    <li>Размещение рекламы на популярных сайтах Узнета</li>
                                </ul>
                            </div>

                            <div class="services__card-img">
                                <picture><source srcset="img/service-4.webp" type="image/webp"><img src="img/service-4.png" alt=""></picture>
                            </div>
                        </a>

                        <a href="{{ url("services/1") }}" class="services__card services__card-5">
                            <div class="services__card-content">

                                <h3 class="services__card-title">
                                    ООН (наружная реклама)
                                </h3>
                                <ul class="custom-list services__card-ul">
                                    <li>Размещение рекламы на уличных носителях</li>
                                    <li>Прогнозирование охвата рекламной кампании</li>
                                    <li>Работа со всеми видами транспорта</li>
                                    <li>Запуск активности по всему Узбекистану и в странах СНГ</li>
                                    <li>Indoor активность</li>
                                </ul>
                            </div>

                            <div class="services__card-img">
                                <picture><source srcset="img/service-5.webp" type="image/webp"><img src="img/service-5.png" alt=""></picture>
                            </div>
                        </a>

                        <a href="{{ url("services/1") }}" class="services__card services__card-6">
                            <div class="services__card-content">
                                <h3 class="services__card-title">
                                    Размещение рекламы
                                    на ТВ
                                </h3>
                                <ul class="custom-list services__card-ul">
                                    <li>Лучшие условия и скидки для рекламы на тв экранах</li>
                                    <li>Мониторинг данных с помощью Kantar TNS</li>
                                    <li>Анализ данных и предоставление полной отчетности</li>
                                    <li>Размещение на всех телеканалах Узбекистана</li>
                                </ul>
                            </div>

                            <div class="services__card-img">
                                <picture><source srcset="img/service-6.webp" type="image/webp"><img src="img/service-6.png" alt=""></picture>
                            </div>
                        </a>

                        -->

                    </div>

                </div>
            </div>
        </section>


        <section class="organize">
            <div class="container">
                <div class="organize__inner">
                    <h2 class="organize__title">
                        Организовали
                    </h2>
                    <div class="organize__wrapper">
                        <div class="organize__item">
                            <div class="organize__item-img">
                                <picture><source srcset="{{ url("images", textblock(2)['image']) }}" type="image/webp"><img src="{{ url("images", textblock(2)['image']) }}" alt="usenet"></picture>
                            </div>
                            <div class="organize__item-text">
                                {!! textblock(2)['description'] !!}
                            </div>
                        </div>

                        <div class="organize__item">
                            <div class="organize__item-img">
                                <picture><source srcset="{{ url("images", textblock(3)['image']) }}" type="image/webp"><img src="{{ url("images", textblock(3)['image']) }}" alt="mob ico N'19"></picture>
                            </div>
                            <div class="organize__item-text">
                                {!! textblock(3)['description'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="connect">
            <div class="container">
                <div class="connect__flex">
                    <div class="connect__svg">
                        <img src="./img/connect.svg" alt="connect-svg">
                    </div>
                    <h2 class="connect__title">
                        {{ textblock(4)['name'] }}
                    </h2>
                </div>
                <ul class="connect__text">
                    <!--<li>Сильнейшая экспертиза агентства позволяет консультировать клиентов и обучать специалистов. Проводим
                        закрытые профильные мероприятия и семинары для клиентов. </li>
                    <li>Делимся экспертным анализом рынка по категориям наших клиентов. </li>
                    <li>Помогаем развиваться и накапливать опыт. Наши клиенты получают закрытый доступ к новым инструментам
                        и продуктам.</li>-->
                    <p>{!! textblock(4)['description'] !!}</p>
                </ul>
            </div>
        </section>

        <section class="expertise">
            <div class="container">
                <h2 class="expertise__title">
                    {!! textblock(5)['name'] !!}
                </h2>
                <div class="expertise__content">
                    <div class="expertise__content-text">
                        <p>
                            {!! textblock(5)['description'] !!}
                        </p>
                    </div>
                    <div class="expertise__content-text">
                        <p>
                            {!! textblock(6)['description'] !!}
                        </p>
                    </div>
                    <div class="expertise__content-text">
                        <p>
                            {!! textblock(7)['description'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
