<div class="form-group">
    <label for="">{{ __("messages.seo_title") }}</label>
    @if(is_object(json_decode($data->seo_title)))
        @foreach(json_decode($data->seo_title) as $key => $value)
            <input value="{{$value}}" type="text" name="seo_title[{{$key}}]" class="form-control">
        @endforeach
    @else
        <input placeholder="Seo title (ru)" type="text" name="seo_title[ru]" class="form-control">
        <input placeholder="Seo title (uz)" type="text" name="seo_title[uz]" class="form-control">
        <input placeholder="Seo title (en)" type="text" name="seo_title[en]" class="form-control">
    @endif
</div>

<div class="form-group">
    <label for="">{{ __("messages.seo_description") }}</label>
    @if(is_object(json_decode($data->seo_description)))
        @foreach(json_decode($data->seo_description) as $key => $value)
            <textarea placeholder="{{ __("messages.seo_description") }} ({{$key}})" name="seo_description[{{$key}}]" class="form-control">{!! $value !!}</textarea>
        @endforeach
    @else
        <textarea placeholder="Seo description (ru)" name="seo_description[ru]" class="form-control"></textarea>
        <textarea placeholder="Seo description (uz)" name="seo_description[uz]" class="form-control"></textarea>
        <textarea placeholder="Seo description (en)" name="seo_description[en]" class="form-control"></textarea>
    @endif
</div>
