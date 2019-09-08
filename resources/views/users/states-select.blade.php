<div class="form-group ">

    <label>{{ __('custom.state') }}: </label>
    <select name="state_id" id="state" class="form-control">
        @foreach ($states as $s)
        <option value="{{ $s->id }}">{{ $s->name }}</option>
        @endforeach
    </select>
</div>