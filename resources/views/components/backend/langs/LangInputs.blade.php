<div class="tab-content">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if (isset($columnvalues['id_' . substr($properties['regional'], 0, 2)]))
            <input type="hidden" name="id_{{ substr($properties['regional'], 0, 2) }}"
                value="{{ $columnvalues['id_' . substr($properties['regional'], 0, 2)] ?? '' }}" />
        @endif
        <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'show active' : '' }}"
            id="{{ substr($properties['regional'], 0, 2) }}" role="tabpanel">
            <div class="d-flex flex-column gap-5">
                <div class="fv-row fl">
                    <label class="required form-label"
                        for="title-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.title') }}</label>
                    <input placeholder="{{ __('site.title').' '.$properties['name'] }}" type="text" id="title_{{ substr($properties['regional'], 0, 2) }}"
                        name="title_{{ substr($properties['regional'], 0, 2) }}" class="form-control mb-2" required
                        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'title' . '&nbsp;' . substr($properties['regional'], 0, 2)]) }}"
                        value="{{ $columnvalues['title_' . substr($properties['regional'], 0, 2)] ?? '' }}" />
                </div>
                @if ($showSlug == 1)
                    <div class="fv-row fl">
                        <label class="form-label"
                            for="slug-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.slug') }}</label>
                        <input placeholder="{{ __('site.slug').' '.$properties['name'] }}" type="text" id="slug_{{ substr($properties['regional'], 0, 2) }}"
                            name="slug_{{ substr($properties['regional'], 0, 2) }}" class="form-control mb-2"
                            value="{{ $columnvalues['slug_' . substr($properties['regional'], 0, 2)] ?? '' }}" />
                    </div>
                @endif
                @if ($showDescription && $richTextArea == 1)
                    <div class="fv-row">
                        <!--begin::Label-->
                        <label class="form-label"
                            for="description-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.description') }}</label>
                        <textarea placeholder="{{ __('site.description').' '.$properties['name'] }}" rows="4" cols="30" id="description{{ substr($properties['regional'], 0, 2) }}"
                            name="description_{{ substr($properties['regional'], 0, 2) }}"
                            class="editor{{ substr($properties['regional'], 0, 2) }} @error('description_' . substr($properties['regional'], 0, 2)) is-invalid @enderror" />{{ $columnvalues['description_' . substr($properties['regional'], 0, 2)] ?? '' }}</textarea>
                    </div>
                @elseif($showDescription && $richTextArea == 0)
                    <div class="d-flex flex-column">
                        <label class="form-label"
                            for="description-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.description') }}</label>
                        <textarea placeholder="{{ __('site.description').' '.$properties['name'] }}" class="form-control form-control-solid" rows="4"
                            id="description{{ substr($properties['regional'], 0, 2) }}"
                            name="description_{{ substr($properties['regional'], 0, 2) }}" placeholder="">{{ $columnvalues['description_' . substr($properties['regional'], 0, 2)] ?? '' }}</textarea>
                    </div>
                @endif

                @if (isset($showseo))
                    <x-backend.seo.LangInputs :properties="$properties" />
                @endif
            </div>
        </div>
    @endforeach
</div>
