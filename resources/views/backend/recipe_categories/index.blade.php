<table cellpading="2" cellpadding="10">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Recipes</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)        
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->item->title }}
   
        </td> 
        <td>  {{ $category->recipes_count ?? '-' }}  </td>

        <td>           
          @isset($category->image)
          <img src="{{ asset('storage/'.$category->image ) }}" alt="{{ $category->item->title }}" width="30" height="30">
          @else
            Not Available
          @endisset
        </td>

      </tr>
      @empty
      {{  trans('category.no_categorys_added') }}
      @endforelse

    </tbody>
  </table>
