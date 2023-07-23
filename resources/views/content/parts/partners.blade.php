<h3 class="partners__title">
    Нам доверяют
</h3>
<div class="partners__inner">
    @foreach(\App\Models\Company::all() as $item)
        <div class="partners__item">
            <picture><source srcset="{{ url("images", $item->image) }}" type="image/webp"><img src="{{ url("images", $item->image) }}" alt=""></picture>
        </div>
    @endforeach
</div>
