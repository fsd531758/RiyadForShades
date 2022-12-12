@if($label || $value)
    <div class="form-group">
        <label>{{$label}}<span class="text-danger"> * </span></label>
        <div class="get-and-preview">
            <div class="icon-preview"
                 style="float: left;
                                                            width: 55px;
                                                            height: 55px;
                                                            margin: 0 15px 0 0;
                                                            border-radius: 5px;
                                                            background: #fff;
                                                            text-align: center;
                                                            font-size: 30px;
                                                            line-height: 65px;
                                                            color: #1e1e1e;"
                 data-toggle="tooltip" title="Preview of selected Icon">
                <i id="IconPreview" style="font-size:40px" class="{{$value}}"></i>
            </div>

            <button type="button" class="btn btn-warning my-3" id="GetIconPicker"
                    data-iconpicker-input="input#IconInput" data-iconpicker-preview="i#IconPreview">{{__('words.select_icon')}}</button>
            <input type="text" class="form-control iconpicker" id="IconInput" name="icon" hidden>
        </div>
    </div>
@endif
