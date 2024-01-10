<h1>Title - Slug - Description</h1>
<br>
  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    @foreach($row as $value)
        @foreach($value->translation as $item)
          @if($localeCode == $item->lang) 
            <p>{{ $localeCode .'---Description---'. $item->description }}</p>
          {{ Str::limit(strip_tags($item->description), 150, '...') }}
          @endif

        @endforeach
    @endforeach
  @endforeach     
