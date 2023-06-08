<li>{{ $child_category->name }}</li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('backend.sub_category', ['sub_categories' => $childCategory])
        @endforeach
    </ul>
@endif