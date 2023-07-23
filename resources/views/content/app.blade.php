<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0, viewport-fit=cover" />
    <link rel="stylesheet" href="{{ url("css/style.min.css") }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url("img/favicon/270.png") }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url("img/favicon/152.png") }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url("img/favicon/152.png") }}" />
    <link rel="mask-icon" href="{{ url("img/favicon/safari-pinned-tab.svg") }}" color="#fff" />
    <link rel="shortcut icon" href="{{ url("img/favicon/favicon.ico") }}" />
    <meta name="apple-mobile-web-app-title" content="Ledokol - Рекламный холдинг Узбекистана с 14 летним опытом" />
    <meta name="application-name" content="Ledokol - Рекламный холдинг Узбекистана с 14 летним опытом" />
    <meta name="msapplication-TileColor" content="#1e1e1e" />
    <meta name="msapplication-config" content="img/favicon/browserconfig.xml" />
    <meta name="theme-color" content="#000" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />

    <title>{{ isset($seo_title) ? $seo_title : setting("seo_title", lang()) }}</title>
    <meta name="description"
          content="{{ isset($seo_description) ? $seo_description : setting("seo_title", lang()) }}" />
    <meta name="keywords"
          content="рекламное агентство, медийное агентство, рекламная компания, (здесь везде + - Узбекистан и Ташкент) реклама телеканал, реклама на телеканале, рекламные агентства (топ), реклама на телевидении (+ - размещение), реклама тв, (стоимость, цена), телевизионная">


    <meta property="og:title" content="{{ isset($seo_title) ? $seo_title : setting("seo_title", lang()) }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ isset($seo_description) ? $seo_description : setting("seo_description", lang()) }}">
    <meta property="og:image" content="img/bg-main.jpg">

    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="format-detection" content="telephone=no">
    <meta property="fb:app_id" content="257953674358265">
    <meta property="og:url"
          content="Ledokol - Рекламный холдинг Узбекистана с 14 летним опытом в сфере медийной и интернет рекламы">
    <meta name="twitter:card" content="summary_large_image">

</head>

<body>
<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__menu">
                <button class="menu__open-btn menu__btn">
                    <svg width="28" height="20" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="2" x2="28" y2="2" stroke="#0C5DC5" stroke-width="4" />
                        <line y1="10" x2="28" y2="10" stroke="#0C5DC5" stroke-width="4" />
                        <line y1="18" x2="28" y2="18" stroke="#0C5DC5" stroke-width="4" />
                    </svg>
                </button>
            </div>
            <div class="header__logo logo">
                <a href="/">
                    <img src="{{ url("img/icons/logo.svg") }}" alt="">
                </a>
            </div>
            <div class="header__links">
                <nav class="header__nav" uk-dropnav>
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a class="header__nav-link {{ current_url("about") }}" href="{{ url("about") }}">О нас</a>
                        </li>
                        <li class="header__nav-item">
                            <span class="header__nav-link {{ current_url("services") }}">Услуги</span>
                            <div class="uk-drop uk-dropdown header__dropdown"
                                 uk-dropdown="animation: slide-top; animate-out: true; mode: click">
                                <ul>
                                    @foreach(\App\Models\Section::all() as $item)
                                        <li>
                                            <a href="{{ url("services", $item->slug) }}" class="{{ current_url("services/$item->slug") }}">
                                                {{ json_decode($item->name)->{lang()} }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link {{ current_url("/clients") }}" href="{{ url("clients") }}">Клиенты</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link {{ current_url("/blog") }}" href="{{ url("blog") }}">Блог</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__buttons">
                    <div class="header__connect">
                        <a href="#">
                            Связаться
                        </a>
                    </div>

                    <div class="header__phone">
                        <a class="tel:">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="32" rx="16" fill="#0C5DC5" />
                                <path
                                    d="M22.0245 18.7167L19.9079 18.475C19.659 18.4458 19.4067 18.4733 19.17 18.5556C18.9333 18.6379 18.7183 18.7727 18.5412 18.95L17.0079 20.4833C14.6422 19.2802 12.7194 17.3573 11.5162 14.9917L13.0579 13.45C13.4162 13.0917 13.5912 12.5917 13.5329 12.0833L13.2912 9.98333C13.244 9.57681 13.0489 9.20186 12.7431 8.92987C12.4373 8.65788 12.0421 8.50785 11.6329 8.50833H10.1912C9.24955 8.50833 8.46621 9.29167 8.52455 10.2333C8.96621 17.35 14.6579 23.0333 21.7662 23.475C22.7079 23.5333 23.4912 22.75 23.4912 21.8083V20.3667C23.4995 19.525 22.8662 18.8167 22.0245 18.7167Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>

                    <div class="header__socials">
                        <button class="header__socials-button" type="button">
                            social media
                        </button>
                        <div uk-dropdown="mode: click" class="header__socials-links uk-drop uk-dropdown">
                            <a href="#" class="header__socials-link">
                                vkontate
                            </a>
                            <a href="#" class="header__socials-link">
                                facebook
                            </a>
                            <a href="#" class="header__socials-link">
                                instagram
                            </a>
                        </div>
                    </div>

                    <div class="uk-inline header__lang lang">
                        <button class="lang-button" type="button">
                            <span>{{ session()->get('lang') ?? 'RU' }}</span>
                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 5L6.5 8.5L3 5" stroke="black" stroke-width="1.25" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div uk-dropdown="mode: click" class="uk-drop uk-dropdown">
                            @if(session()->get('lang') != 'ru' && session()->get('lang') != null)
                                <a href="{{ url("lang/ru") }}" class="lang-link">RU</a>
                            @endif
                            @if(session()->get('lang') != 'uz')
                                <a href="{{ url("lang/uz") }}" class="lang-link">UZ</a>
                            @endif
                            @if(session()->get('lang') != 'en')
                                <a href="{{ url("lang/en") }}" class="lang-link">EN</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="menu">
    <div class="menu__wrapper">

        <div class="menu__inner">
            <div class="menu__head">

                <div class="header__logo logo">
                    <a href="/">
                        <img src="{{ url("img/icons/logo.svg") }}" alt="">
                    </a>
                </div>

                <div class="menu__close-btn menu__btn">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.98916 8L15.5556 2.43359C15.8197 2.16988 15.9683 1.81202 15.9687 1.43874C15.969 1.06546 15.821 0.707343 15.5573 0.443162C15.2936 0.178982 14.9357 0.0303815 14.5625 0.0300518C14.1892 0.0297221 13.8311 0.17769 13.5669 0.441404L8.00049 6.00781L2.43408 0.441404C2.1699 0.177224 1.81159 0.0288086 1.43799 0.0288086C1.06438 0.0288086 0.706073 0.177224 0.441893 0.441404C0.177712 0.705585 0.0292969 1.06389 0.0292969 1.4375C0.0292969 1.81111 0.177712 2.16941 0.441893 2.43359L6.0083 8L0.441893 13.5664C0.177712 13.8306 0.0292969 14.1889 0.0292969 14.5625C0.0292969 14.9361 0.177712 15.2944 0.441893 15.5586C0.706073 15.8228 1.06438 15.9712 1.43799 15.9712C1.81159 15.9712 2.1699 15.8228 2.43408 15.5586L8.00049 9.99219L13.5669 15.5586C13.8311 15.8228 14.1894 15.9712 14.563 15.9712C14.9366 15.9712 15.2949 15.8228 15.5591 15.5586C15.8233 15.2944 15.9717 14.9361 15.9717 14.5625C15.9717 14.1889 15.8233 13.8306 15.5591 13.5664L9.98916 8Z"
                            fill="black" />
                    </svg>
                </div>
            </div>

            <div class="menu__nav">
                <ul class="menu__nav-list">
                    <li>
                        <a href="{{ url("about") }}">
                            О компании
                        </a>
                    </li>
                    <li>
                        <span>
                            Услуги
                        </span>
                        <ul class="menu__submenu custom-list-dark">
                            @foreach(\App\Models\Section::all() as $item)
                            <li>
                                <a href="{{ url("services", $item->slug) }}">
                                    {{ json_decode($item->name)->{lang()} }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url("clients") }}">
                            Клиенты
                        </a>
                    </li>
                    <li>
                        <a href="{{ url("blog") }}">
                            Блог
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="menu__bottom">
            <div class="menu__socials">
                <a href="#">
                    <img src="{{ url("img/icons/vk.svg") }}" alt="">
                </a>
                <a href="#">
                    <img src="{{ url("img/icons/facebook.svg") }}" alt="">
                </a>
                <a href="#">
                    <img src="{{ url("img/icons/instagram.svg") }}" alt="">
                </a>
            </div>

            <div class="menu__number">
                <a href="tel+998903150003">
                    +998 90 315-00-03
                </a>
            </div>
            <div class="menu__email">
                <a href="mailto:info@ledokolgroup.com">
                    info@ledokolgroup.com
                </a>
            </div>
        </div>

        <div class="footer__copyright">
            <a href="#">
                Политика конфиденциальности
            </a>
            <div class="footer__lang lang-settings header__menu-lang">
                <button class="lang-button" type="button">
                    <span>RU</span>
                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.5 5.5L6 9L2.5 5.5" stroke="black" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div uk-dropdown="mode: click" class="lang-drop uk-drop uk-dropdown">
                    <a href="#en" class="lang-link">EN</a>
                    <a href="#uz" class="lang-link">UZ</a>
                </div>
            </div>
        </div>

    </div>
</div>

@yield("content")

<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <h2 class="footer__title">
                Свяжитесь с нами
            </h2>
            <div class="footer__wrapper">
                <div class="footer__contact">
                    <div>
                        <a href="tel:+998903150003" class="footer__contact-phone footer__contact-link">
                            <span class="footer__contact-svg">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.6572" r="20" fill="#00D2AB" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M19.2387 21.17C18.4587 20.39 17.8707 19.5166 17.4801 18.6306C17.3974 18.4433 17.4461 18.224 17.5907 18.0793L18.1367 17.534C18.5841 17.0866 18.5841 16.454 18.1934 16.0633L17.4107 15.2806C16.8901 14.76 16.0461 14.76 15.5254 15.2806L15.0907 15.7153C14.5967 16.2093 14.3907 16.922 14.5241 17.6286C14.8534 19.3706 15.8654 21.278 17.4981 22.9106C19.1307 24.5433 21.0381 25.5553 22.7801 25.8846C23.4867 26.018 24.1994 25.812 24.6934 25.318L25.1274 24.884C25.6481 24.3633 25.6481 23.5193 25.1274 22.9986L24.3454 22.2166C23.9547 21.826 23.3214 21.826 22.9314 22.2166L22.3294 22.8193C22.1847 22.964 21.9654 23.0126 21.7781 22.93C20.8921 22.5386 20.0187 21.95 19.2387 21.17Z"
                                          fill="#0C5DC5" stroke="#0C5DC5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="footer__contact-text">
                                <p>Номер телефона</p>
                                <span>{{ setting("phone") }}</span>
                            </span>
                        </a>
                    </div>
                    <div>
                        <a href="mailto:info@ledokolgroup.com" class="footer__contact-mail footer__contact-link">
                            <span class="footer__contact-svg">
                                <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="20" cy="20.6572" r="20" fill="#00D2AB" />
                                    <rect x="13" y="15.9072" width="13.5" height="10" rx="1.5" fill="#0C5DC5" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M13.5 16.9402V16.9402C13.5 17.3402 13.7167 17.6736 14.0778 17.9402L18.4111 20.6736C19.4222 21.2736 20.65 21.2736 21.6611 20.6736L25.9944 18.0069C26.2833 17.6736 26.5 17.3402 26.5 16.9402V16.9402C26.5 16.2736 25.9222 15.7402 25.2 15.7402H14.8C14.0778 15.7402 13.5 16.2736 13.5 16.9402Z"
                                          stroke="#00D2AB" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M13.5 16.907V24.407C13.5 25.232 14.15 25.907 14.9444 25.907H25.0556C25.85 25.907 26.5 25.232 26.5 24.407V16.907"
                                        stroke="#00D2AB" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M13.9219 24.6818L18.3231 20.6191" stroke="#00D2AB" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M21.7031 20.647L26.074 24.6816" stroke="#00D2AB" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="footer__contact-text">
                                <p> E-mail </p>
                                <span>{{ setting("email") }}</span>
                            </span>
                        </a>
                    </div>
                    <div class="footer__contact-address footer__contact-link">
                        <span class="footer__contact-svg">
                            <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20.6572" r="20" fill="#00D2AB" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M19.9987 26.4072C19.9987 26.4072 15.332 22.5739 15.332 19.0739C15.332 16.4966 17.4214 14.4072 19.9987 14.4072C22.576 14.4072 24.6654 16.4966 24.6654 19.0739C24.6654 22.5739 19.9987 26.4072 19.9987 26.4072Z"
                                      fill="#0C5DC5" stroke="#0C5DC5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M20 21.0737C18.8953 21.0737 18 20.1784 18 19.0737C18 17.9691 18.8953 17.0737 20 17.0737C21.1047 17.0737 22 17.9691 22 19.0737C22 20.1784 21.1047 21.0737 20 21.0737Z"
                                      fill="#00D2AB" />
                            </svg>
                        </span>
                        <span class="footer__contact-text">
                            <p>
                                Адрес
                            </p>
                            {!! setting("address") !!}
                        </span>
                    </div>
                </div>

                <div class="footer__form">
                    <form method="POST" action="{{ url("telegram") }}" class="footer__form-form" id="footer-form">
                        @csrf
                        <div class="footer__form-item">
                            <input type="text" name="your_name" placeholder="Ваше Имя" id="username" autocomplete="off" required>
                        </div>
                        <div class="footer__form-item">
                            <input type="email" name="your_email" placeholder="Адрес e-mail" id="email" autocomplete="off" required>
                        </div>
                        <div class="footer__form-item">
                            <input type="tel" name="phone_number" placeholder="Номер телефона" id="phone" autocomplete="off" required>
                        </div>
                        <div class="footer__form-item">
                            <input type="text" name="your_task" placeholder="Задача" id="message" autocomplete="off">
                        </div>
                        <div class="footer__form-submit">
                            <button type="submit">
                                Отправить
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="footer__map">
        <div style="position:relative;overflow:hidden;">
            <div style="position:relative;overflow:hidden;"><a
                    href="https://yandex.uz/maps/10335/tashkent/?utm_medium=mapframe&utm_source=maps"
                    style="color:#eee;font-size:12px;position:absolute;top:0px;">Ташкент</a><a
                    href="https://yandex.uz/maps/10335/tashkent/?feedback=map%2Fedit&feedback-context=map.controls&ll=69.290651%2C41.316583&utm_medium=mapframe&utm_source=maps&z=17.16"
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты</a><iframe
                    src="https://yandex.uz/map-widget/v1/?feedback=map%2Fedit&feedback-context=map.controls&ll=69.290651%2C41.316583&z=17.16"
                    width="100%" height="480" frameborder="1" allowfullscreen="true"
                    style="position:relative;"></iframe></div>
        </div>
    </div>
</footer>
<div class="footer__bottom">
    <div class="container">
        <div class="footer__bottom-inner">
            <div class="footer__nav">

                <div class="footer__logo logo">
                    <a href="#">
                        <img src="{{ url("img/icons/logo.svg") }}" alt="">
                    </a>
                </div>

                <ul class="footer__menu">
                    <li>
                        <a href="{{ url("about") }}" class="footer__link {{ current_url("/about") }}">О нас</a>
                    </li>
                    <li>
                        <span class="footer__link {{ current_url("services") }}">Услуги</span>
                        <div class="uk-drop uk-dropdown header__dropdown"
                             uk-dropdown="animation: slide-bottom; animate-out: true; mode: click;">
                            <ul>
                                <li><a href="{{ url("services/1") }}" class="current-page">Стратегия и исследование</a></li>
                                @foreach(\App\Models\Section::all() as $item)
                                    <li>
                                        <a href="{{ url("services", $item->slug) }}" class="{{ current_url("services/$item->slug") }}">
                                            {{ json_decode($item->name)->{lang()} }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ url("clients") }}" class="footer__link {{ current_url("/clients") }}">Клиенты</a>
                    </li>
                    <li>
                        <a href="{{ url("blog") }}" class="footer__link {{ current_url("/blog") }}">Блог</a>
                    </li>
                </ul>

                <div class="footer__socials">
                    <a href="#">
                        <img src="{{ url("img/icons/vk.svg") }}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{ url("img/icons/facebook.svg") }}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{ url("img/icons/instagram.svg") }}" alt="">
                    </a>
                </div>
            </div>
            <div class="footer__copyright">
                <a href="#">
                    Политика конфиденциальности
                </a>
                <div class="footer__lang lang-settings">
                    <button class="lang-button" type="button">
                        <span>RU</span>
                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 5.5L6 9L2.5 5.5" stroke="black" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <div uk-dropdown="mode: click" class="lang-drop uk-drop uk-dropdown">
                        <a href="#en" class="lang-link">EN</a>
                        <a href="#uz" class="lang-link">UZ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="contact-modal" uk-modal>
    <di class="modal-wrapper">
        <div class="uk-modal-close modal-overlay"></div>
        <div class="modal-body">

            <button class="uk-modal-close modal-close-btn">
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15.5013 0.916992C23.5557 0.916992 30.0846 7.44595 30.0846 15.5003C30.0846 23.5547 23.5557 30.0837 15.5013 30.0837C7.44693 30.0837 0.917969 23.5547 0.917969 15.5003C0.917969 7.44595 7.44693 0.916992 15.5013 0.916992ZM12.4082 10.3437C12.1463 10.0793 11.7934 9.92507 11.4215 9.91245C11.0497 9.89984 10.6871 10.0298 10.408 10.2758C10.1288 10.5218 9.95424 10.8651 9.91996 11.2356C9.88569 11.6061 9.99431 11.9756 10.2236 12.2687L10.3461 12.4072L13.4378 15.4989L10.3461 18.5935C10.0818 18.8553 9.9275 19.2082 9.91489 19.5801C9.90227 19.9519 10.0323 20.3145 10.2782 20.5937C10.5242 20.8728 10.8676 21.0474 11.238 21.0817C11.6085 21.1159 11.9781 21.0073 12.2711 20.778L12.4082 20.657L15.5013 17.5624L18.5944 20.657C18.8563 20.9213 19.2092 21.0756 19.5811 21.0882C19.9529 21.1008 20.3155 20.9708 20.5946 20.7249C20.8738 20.4789 21.0484 20.1355 21.0826 19.765C21.1169 19.3946 21.0083 19.025 20.779 18.732L20.658 18.5935L17.5634 15.5003L20.658 12.4072C20.9223 12.1454 21.0766 11.7924 21.0892 11.4206C21.1018 11.0487 20.9718 10.6861 20.7258 10.407C20.4799 10.1278 20.1365 9.95326 19.766 9.91899C19.3955 9.88471 19.026 9.99333 18.733 10.2226L18.5944 10.3437L15.5013 13.4382L12.4082 10.3437Z"
                        fill="#161616" />
                </svg>
            </button>
            <h3 class="modal__title">
                Хотите заказать услугу?
            </h3>
            <h5 class="modal__sub">
                Оставьте данные о вас
            </h5>
            <div class="modal-form">
                <form method="POST" action="{{ url("telegram") }}">
                    @csrf
                    <div class="modal-form-input">
                        <input name="your_name" type="text" placeholder="Как к вам обращаться?">
                    </div>
                    <div class="modal-form-input">
                        <input name="phone_number" type="text" placeholder="Телефон для связи">
                    </div>
                    <div class="modal-form-submit">
                        <button type="submit">
                            Отправить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </di>
</div>

<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.1/dist/js/uikit.min.js"></script>
<script src="{{ url("js/app.min.js") }}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $(".header__connect a").click(function (){
            $("html, body").animate(
                {
                    scrollTop: $("footer.footer").offset().top
                }, 800
            )
        });
    });
</script>
</body>

</html>
