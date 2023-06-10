<option>{{ $sub_categories->id }}</option>
@if ($sub_categories->childCategories)
     
        @if(count($sub_categories->childCategories) > 0)
            @foreach ($sub_categories->childCategories as $subCategories)
                
                @include('backend.sub_category', ['sub_categories' => $subCategories])
            @endforeach
        @endif
    
@endif