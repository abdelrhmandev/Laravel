<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
<li class="nav-item">
    <a hreflang="{{$localeCode}}" class="nav-link text-active-primary pb-4 {{ LaravelLocalization::getCurrentLocaleName() == $properties['name'] ? 'active':''}}"
    data-bs-toggle="tab" href="#{{ substr($properties['regional'],0,2) }}">         
    <i class="fa"></i>{{ $properties['native'] }}</a>
</li> 
@endforeach 
</ul>  