<div class="tab-content">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="tab-pane fade {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'show active' : '' }}"
            id="{{ substr($properties['regional'], 0, 2) }}" role="tabpanel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="card card-flush py-4">



                    <div class="card-header ribbon ribbon-top ribbon-ver" style="min-height:10px !important;">
                        <div class="ribbon-target symbol symbol-25px symbol-circle"
                            style="top: -7px; @if (app()->getLocale() == 'ar') left: @else right: @endif 20px;">
                            <img class="carousel-custom" width="25" height="25"
                                src="{{ asset('assets/backend/media/flags/' . substr($properties['regional'], 0, 2) . '.svg') }}" />
                        </div>
                    </div>


                  

                    <div class="card-body pt-0">
                        <div class="mb-5 fv-row fl">
                            <label class="required form-label"
                                for="title-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.title') }}</label>
                            <input type="text" id="title_{{ substr($properties['regional'], 0, 2) }}"
                                name="title_{{ substr($properties['regional'], 0, 2) }}" class="form-control mb-2"
                                required
                                data-fv-not-empty___message="{{ __('validation.required', ['attribute' => 'title' . '&nbsp;' . substr($properties['regional'], 0, 2)]) }}"
                                
                                />
                        </div>

                        @if($slug == 1)
                        <div class="mb-5 fv-row fl">
                            <label class="form-label"
                                for="slug-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.slug') }}</label>
                            <input type="text" id="slug_{{ substr($properties['regional'], 0, 2) }}"
                                name="slug_{{ substr($properties['regional'], 0, 2) }}" class="form-control mb-2"
                                />
                        </div>
                        @endif

                        @if($description && $richTextArea == 1)
                            <div class="fv-row">
                            <!--begin::Label-->
                            <label class="form-label"
                                for="description-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.description') }}</label>
                                <textarea rows="4" cols="30"
                                id="description_{{ substr($properties['regional'], 0, 2) }}"
                                name="description_{{ substr($properties['regional'], 0, 2) }}"
                                class="editor @error('description_' . substr($properties['regional'], 0, 2)) is-invalid @enderror"/>sports is good {{ substr($properties['regional'], 0, 2) }} </textarea>
                        </div>
                        @elseif($description && $richTextArea == 0)
                        <div class="d-flex flex-column">
                            <label class="form-label"
                            for="description-{{ substr($properties['regional'], 0, 2) }}">{{ __('site.description') }}</label>
                            <textarea class="form-control form-control-solid" rows="4" name="application" placeholder=""></textarea>
                        </div>

                        @endif
                        
                        @if(isset($showseo))
                        <x-backend.seo.LangInputs :properties="$properties" />                        
                        @endif



 


                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>
