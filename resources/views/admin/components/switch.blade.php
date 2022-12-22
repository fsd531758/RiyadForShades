@if($name && $label || $val)
    <div class="col-md-6 col-sm-12 input">
        <label for="active" class="checkbox-inline">{{$label}}</label>

        <span class="switch switch-icon">
        <label>
            <input type="checkbox" id="{{$name}}"
                   name="{{$name}}" value="1"  {{$val ? "checked" : ""}}/>
            <span></span>
        </label>
    </span>
    </div>
@endif
