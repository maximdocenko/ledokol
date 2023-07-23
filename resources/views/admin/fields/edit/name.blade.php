<div class="form-group">
    <label for="">{{ __("messages.name") }}</label>
    @foreach(json_decode($data->name) as $key => $value)
        <input value="{{$value}}" type="text" name="name[{{$key}}]" class="form-control">
    @endforeach

    <input placeholder="{{ __("messages.name") }} ({{$key}})" value="{{$data->slug}}" type="text" name="slug" class="form-control form-control-small">
</div>
