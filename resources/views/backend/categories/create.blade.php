<ul>
  @if(count($categories) > 0)
      @foreach ($categories as $category)
          <li>{{ $category->id }}</li>
          <ul>
              @if(count($category->childCategories))
                  @foreach ($category->childCategories as $subCategories)
                      @include('backend.sub_category', ['sub_categories' => $subCategories])
                  @endforeach
              @endif
          </ul>
      @endforeach
  @endif
</ul>