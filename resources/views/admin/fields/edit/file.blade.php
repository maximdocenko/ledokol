<div class="form-group">
    <label for="">{{ __("messages.file") }}</label>
    <input name="image" type="file" class="form-control">
    @if($data->image)
        <img class="icon" src="{{ url('images', $data->image) }}" alt="">
    @endif
</div>
