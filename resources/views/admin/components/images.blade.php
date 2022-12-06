@if($name && $label)
    <div class="col-6">
        <label for="formFileSm" class="col-form-label">{{$label}}</label>
        <input type="file" name="{{$name}}" multiple
               class="form-control form-control-sm @error($name) is-invalid @enderror" accept="image/*" id="formFileSm">
        @error($name)
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
@endif
