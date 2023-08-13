<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('site.status')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="form-check form-switch form-check-custom form-check-solid">
            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" @if(isset($status) && $status == '1') checked="checked" @endif" />
            <label class="form-check-label" for="status">
               {{ __('site.published')}}
            </label>
        </div>
    </div>
</div>