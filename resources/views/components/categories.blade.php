 
{{-- {!! $categories !!}
</select> --}}



 
    
@foreach ($categories as $category)

 

<x-category :category="$category" />

 

@endforeach
 