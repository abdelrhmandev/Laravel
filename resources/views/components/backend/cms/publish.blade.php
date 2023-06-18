<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('site.status')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="form-check form-switch form-check-custom form-check-solid">
            <input class="form-check-input" type="checkbox" value="1" name="published" id="published" @if(isset($published) && $published == '1') checked="checked" @endif" />
            <label class="form-check-label" for="published">
               {{ __('site.published')}}
            </label>
        </div>
    </div>
</div>