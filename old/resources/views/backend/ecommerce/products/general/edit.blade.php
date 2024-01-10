<table cellpading="5" cellspacing="15" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>cook[minutes]</th>
        <th>servings[persons]</th>
        <th>Category</th>
        <th>Likes</th>
        <th>Dislikes</th>
        <th>Tags</th>
        <th>Review</th>
        <th>Actions</th>
        {{-- <th>Users has Reviewed</th> --}}
      </tr>
    </thead>
    <tbody>
        @forelse ($recipes as $recipe)        
      <tr>
        <td>{{ $recipe->id }}
        <img src="{{ asset('/storage/'.$recipe->image ) }} " width="30" height="30">
        </td>
        <td>{{ $recipe->recipe->title }}</td>         
 

        <td>{{ $recipe->cook ?? '-' }}</td>

        <td>{{ $recipe->servings ?? '-' }}</td>


        <td>{{ ($recipe->recipe_category->category->title ?? '-') }}</td>

        <td>
          {{ $recipe->likes->count() }}  
        </td>

        <td>
          {{ $recipe->dislikes->count() }}  
        </td>


      <td>
      @forelse ($recipe->tags as $tag)
      <a href="#" class="btn btn-primary">{{$tag->tag->title }}</a>
      @empty
      - 
      @endforelse
  
        </td>
        <td>
          @if($recipe->reviews->count())
          <a href="{{  route('recipe.reviews',[$recipe->id]) }}">{{ $recipe->reviews->count() }}</a>
          @else
          -
          @endif
        </td>

       
        <td>
          {{-- @foreach ($recipe->users_likes as $user)
          <a href="#">{{ $user->name  }}</a>
          @endforeach --}}
          
        </td>

<td>
          <a href="{{ route('recipes.edit',[$recipe->id]) }}">Edit </a>
</td>
    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
