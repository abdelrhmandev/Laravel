<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('tag.plural')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="fv-row mb-10">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-3" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                @foreach ($tags as $tag)
                <div class="col">
                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $tag->id }}" @if(isset($row) && in_array($tag->id,$row->tag->pluck('id')->toArray())) checked @endif />
                        </span>
                        <span class="ms-5">
                            <span class="fs-4 fw-bold text-gray-800 d-block">{{ $tag->translate->title }}</span>
                        </span>
                    </label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>