<div class="form-group">
    <label for="">{{ __("messages.content") }}</label>
    @foreach(json_decode($data->content) as $key => $value)
        <textarea id="simplemde_content_{{$key}}" placeholder="{{ __("messages.content") }} ({{$key}})" name="content[{{$key}}]" class="form-control">{!! $value !!}</textarea>
    @endforeach
</div>
