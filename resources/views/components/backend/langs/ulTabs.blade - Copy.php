<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
<li class="nav-item">
        <a hreflang="{{ LaravelLocalization::getCurrentLocale() }}" class="nav-link text-active-primary pb-4 active"
        data-bs-toggle="pill" href="#{{ LaravelLocalization::getCurrentLocale() }}">         
        <i class="fa" id="icon_{{ LaravelLocalization::getCurrentLocale() }}"></i>{{ LaravelLocalization::getCurrentLocaleNative() }}</a>
</li> 
    
@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    @if(app()->getLocale() <> substr($properties['regional'],0,2))
    <li class="nav-item">
        <a hreflang="{{ $localeCode }}" class="nav-link text-active-primary pb-4 {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}"
        data-bs-toggle="pill" href="#{{ substr($properties['regional'],0,2) }}">         
        <i class="fa" id="icon_{{ substr($properties['regional'],0,2) }}"></i>{{ $properties['native'] }}</a>
    </li> 
    @endif
@endforeach 

</ul>  