{{-- <h1>Title - Slug - Description</h1>
<br>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    @foreach($row as $value)
        @foreach($value->translation as $item)
          @if($localeCode == $item->lang) 
            <p>{{ $localeCode .'---Title ---'. $item->title }}</p>
            <p>{{ $localeCode .'--Slug---'. $item->slug }}</p>
           @endif

        @endforeach
    @endforeach
  @endforeach      --}}
