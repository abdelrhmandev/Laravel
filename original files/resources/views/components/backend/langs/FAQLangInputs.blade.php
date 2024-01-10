<div class="tab-content">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if (isset($columnvalues['id_' . substr($properties['regional'], 0, 2)]))
            <input type="hidden" name="id_{{ substr($properties['regional'], 0, 2) }}"
                value="{{ $columnvalues['id_' . substr($properties['regional'], 0, 2)] ?? '' }}" />
                <input type="hidden" id="title_{{ app()->getLocale() }}" value="{{ $columnvalues['question_' . substr($properties['regional'], 0, 2)] ?? '' }}"/>
        @endif
        <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'show active' : '' }}"
            id="{{ substr($properties['regional'], 0, 2) }}" role="tabpanel">
            <div class="d-flex flex-column gap-5">
                <div class="fv-row fl">
                    <label class="required form-label"
                        for="question-{{ substr($properties['regional'], 0, 2) }}">{{ __('faq.question') }}</label>
                    <input placeholder="{{ __('faq.question').' '.$properties['name'] }}" type="text" id="question_{{ substr($properties['regional'], 0, 2) }}"
                        name="question_{{ substr($properties['regional'], 0, 2) }}" class="form-control mb-2" required
                        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'question' . '&nbsp;' . substr($properties['regional'], 0, 2)]) }}"
                        value="{{ $columnvalues['question_' . substr($properties['regional'], 0, 2)] ?? '' }}" />
                </div>

                <div class="fv-row fl">
                    <label class="required form-label"
                        for="answer-{{ substr($properties['regional'], 0, 2) }}">{{ __('faq.answer') }}</label>
                    <input placeholder="{{ __('faq.answer').' '.$properties['name'] }}" type="text" id="answer_{{ substr($properties['regional'], 0, 2) }}"
                        name="answer_{{ substr($properties['regional'], 0, 2) }}" class="form-control mb-2" required
                        data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'answer' . '&nbsp;' . substr($properties['regional'], 0, 2)]) }}"
                        value="{{ $columnvalues['answer_' . substr($properties['regional'], 0, 2)] ?? '' }}" />
                </div>


                
            </div>
        </div>
    @endforeach
</div>
