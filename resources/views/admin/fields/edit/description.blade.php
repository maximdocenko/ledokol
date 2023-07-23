<div class="form-group">
    <label for="">{{ __("messages.description") }}</label>
    @foreach(json_decode($data->description) as $key => $value)
        <textarea id="simplemde_description_{{$key}}" placeholder="{{ __("messages.description") }} ({{$key}})" name="description[{{$key}}]" class="form-control">{!! $value !!}</textarea>
    @endforeach
</div>
