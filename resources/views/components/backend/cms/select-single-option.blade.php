<div class="card card-flush py-4">
    <div class="card-body pt-5">
        <div class="mb-5 fv-row fl">
            <label class="form-label" for="parent_category">Parent Category</label>
            <select name="parent_id" class="form-select mb-2" data-control="select2" data-allow-clear="true">
                <option value="0">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->translate->title }}
                        @if ($category->children->isNotEmpty())
                            <x-backend.cms.select-single-option-childs :childs="$category->children" :
                                level="{{ $level + 1 }}" />
                        @endif
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
