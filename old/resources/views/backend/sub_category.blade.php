<li>{{ $sub_categories->id }}</li>
@if ($sub_categories->children)
    <ul>
        @if(count($sub_categories->children) > 0)
            @foreach ($sub_categories->children as $subCategories)
                @include('backend.sub_category', ['sub_categories' => $subCategories])
            @endforeach
        @endif
    </ul>
@endif