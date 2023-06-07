<li>{{ $child_category->id }}</li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('components.backend.cms.manageChild', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif