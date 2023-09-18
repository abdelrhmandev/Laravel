<form id="Add{{ $trans }}" data-route-url="{{ $storeRoute }}"
                    data-form-submit-error-message="{{ __('site.form_submit_error') }}"
                    data-form-agree-label="{{ __('site.agree') }}" enctype="multipart/form-data">
                    <div class="card card-flush py-0">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>{{ __($trans.'.add')}}</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-column gap-5">
                                <div class="separator"></div>
                                
                                <x-backend.langs.ulTabs/>
                                <x-backend.langs.LangInputs :showDescription="1" :richTextArea="0" :showSlug="1" />
                                
                                <x-backend.cms.select-single-option-parent :categories="$categories" :level="0" />
                                
                                <x-backend.cms.image />

                                <x-backend.cms.status />
                                
                                <div class="separator mb-6"></div>
                                <x-backend.btns.button />
                            </div>
                        </div>
                    </div>
                </form>