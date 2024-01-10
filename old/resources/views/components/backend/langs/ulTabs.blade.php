<ul class="nav nav-pills nav-pills-custom row position-relative mx-0">
    <li class="nav-item col-6 mx-0 p-0">
        <a hreflang="{{ LaravelLocalization::getCurrentLocale() }}" href="#{{ LaravelLocalization::getCurrentLocale() }}"
            class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="tab"
            href="#{{ app()->getLocale() }}">
            <i class="fa" id="icon_{{ LaravelLocalization::getCurrentLocale() }}"></i>
            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">{{ LaravelLocalization::getCurrentLocaleNative() }}
                <div class="symbol symbol-30px symbol-circle me-3">
                    <img src="{{ asset('assets/backend/media/flags/' . app()->getLocale() . '.svg') }}"
                        alt="{{ LaravelLocalization::getCurrentLocaleNative() }}">
                </div>
            </span>
            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
        </a>
    </li>
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if (app()->getLocale() != substr($properties['regional'], 0, 2))
            <li class="nav-item col-6 mx-0 px-0">
                <a hreflang="{{ $localeCode }}" class="nav-link d-flex justify-content-center w-100 border-0 h-100"
                    data-bs-toggle="tab" href="#{{ substr($properties['regional'], 0, 2) }}"> 
                    <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                        <i class="fa" id="icon_{{ substr($properties['regional'],0,2) }}"></i>
                        {{ $properties['name'] }}
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <img src="{{ asset('assets/backend/media/flags/' . $localeCode . '.svg') }}"
                                alt="{{ LaravelLocalization::getCurrentLocaleNative() }}">
                        </div>
                    </span> <span
                        class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                </a>
            </li>
            <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
        @endif
    @endforeach
</ul>
