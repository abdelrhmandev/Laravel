<div class="card card-flush">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('site.status')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="form-check form-switch form-check-custom form-check-solid">
            @if($action == 'create')
                <input class="form-check-input" type="checkbox" value="1" name="status" id="status" checked="checked" />
            @elseif($action == 'edit')
                <input class="form-check-input" type="checkbox" value="1" name="status" id="status" @if(isset($status) && $status == '1') checked="checked" @endif />
            @endif
            <label class="form-check-label" for="status">
                     <span>{{ __('site.published')}}</span>                            
            </label>
        </div>
    </div>
</div>