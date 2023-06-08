<li>{{ $sub_categories->id }}</li>
@if ($sub_categories->categories)
    <ul>
        @if(count($sub_categories->categories) > 0)
            @foreach ($sub_categories->categories as $subCategories)
                @include('components.backend.cms.sub_category', ['sub_categories' => $subCategories])
            @endforeach
        @endif
    </ul>
@endif