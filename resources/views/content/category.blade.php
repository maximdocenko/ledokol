@extends("content.app")
@section("content")

    <main class="blog-main">
    <div class="container">
        <div class="blog-head">
            <div class="title">
                Блог
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

                        @foreach($posts as $item)

                        <div class="cases__blog">
                            <h3 class="cases__blog-title">
                                {{ json_decode($item->name)->{lang()} }}
                            </h3>
                            <div class="cases__blog-text">
                                @php
                                    $content = json_decode($item->description)->{lang()};
                                    if(strlen($content) >= 500) {
                                        $pos=strpos($content, ' ', 500);
                                        echo substr($content,0,$pos );
                                    }else{
                                        echo $content;
                                    }
                                @endphp
                            </div>
                            <div class="cases__blog-img">
                                <picture><source srcset="{{ url("images", $item->image) }}" type="image/webp"><img src="{{ url("images", $item->image) }}" alt=""></picture>
                            </div>
                            <div class="cases__blog-bottom">
                                <a href="{{ url("post", $item->id) }}">
                                    <span>Читать дальше</span>
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.7032 11.7834L16.0541 18.7719C15.9749 18.8548 15.8892 18.9135 15.7968 18.9477C15.7045 18.9826 15.6055 19 15.5 19C15.3945 19 15.2955 18.9826 15.2032 18.9477C15.1108 18.9135 15.0251 18.8548 14.9459 18.7719L8.27704 11.7834C8.09235 11.5899 8 11.3479 8 11.0576C8 10.7673 8.09894 10.5184 8.29683 10.3111C8.49472 10.1037 8.72559 10 8.98945 10C9.2533 10 9.48417 10.1037 9.68206 10.3111L15.5 16.4078L21.3179 10.3111C21.5026 10.1175 21.7301 10.0207 22.0003 10.0207C22.271 10.0207 22.5053 10.1244 22.7032 10.3318C22.9011 10.5392 23 10.7811 23 11.0576C23 11.3341 22.9011 11.576 22.7032 11.7834Z"
                                            fill="black" />
                                    </svg>
                                </a>
                                <div class="cases__blog-date">
                                    {{ date("d.m.Y", strtotime($item->created_at)) }}
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    <!--
                                        <div class="pagination">
                                            <a href="#" class="pagination-prev pagination-link">
                                                <svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.21659 14.7032L0.22811 8.05409C0.145161 7.97493 0.0865435 7.88918 0.0522578 7.79683C0.0174191 7.70449 0 7.60554 0 7.5C0 7.39446 0.0174191 7.29551 0.0522578 7.20317C0.0865435 7.11082 0.145161 7.02507 0.22811 6.94591L7.21659 0.277045C7.41014 0.0923482 7.65207 0 7.9424 0C8.23272 0 8.48157 0.0989446 8.68894 0.296834C8.89631 0.494723 9 0.725594 9 0.989446C9 1.2533 8.89631 1.48417 8.68894 1.68206L2.59217 7.5L8.68894 13.3179C8.88249 13.5026 8.97926 13.7301 8.97926 14.0003C8.97926 14.271 8.87558 14.5053 8.6682 14.7032C8.46083 14.9011 8.21889 15 7.9424 15C7.6659 15 7.42396 14.9011 7.21659 14.7032Z"
                                                        fill="#0C5DC5" />
                                                </svg>
                                            </a>

                                            <a href="#" class="pagination-link current-page">
                                                1
                                            </a>
                                            <a href="#" class="pagination-link">
                                                2
                                            </a>
                                            <a href="#" class="pagination-link">
                                                3
                                            </a>
                                            <span href="#" class="pagination-link">
                                                ...
                                            </span>
                                            <a href="#" class="pagination-next pagination-link">
                                                <svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.78341 0.296834L8.77189 6.94591C8.85484 7.02507 8.91346 7.11082 8.94774 7.20317C8.98258 7.29551 9 7.39446 9 7.5C9 7.60554 8.98258 7.70449 8.94774 7.79683C8.91346 7.88918 8.85484 7.97493 8.77189 8.05409L1.78341 14.723C1.58986 14.9077 1.34793 15 1.0576 15C0.767282 15 0.518435 14.9011 0.311061 14.7032C0.103687 14.5053 8.90241e-07 14.2744 8.67174e-07 14.0106C8.44108e-07 13.7467 0.103687 13.5158 0.311061 13.3179L6.40783 7.5L0.31106 1.68206C0.117512 1.49736 0.0207364 1.26992 0.0207364 0.999737C0.0207364 0.729025 0.124424 0.494723 0.331796 0.296834C0.53917 0.0989454 0.781106 7.18518e-07 1.0576 6.94346e-07C1.3341 6.70174e-07 1.57604 0.0989453 1.78341 0.296834Z"
                                                        fill="#0C5DC5" />
                                                </svg>
                                            </a>

                                        </div>
                                        -->
                </div>

            </div>
        </div>
    </section>

</main>

@endsection
