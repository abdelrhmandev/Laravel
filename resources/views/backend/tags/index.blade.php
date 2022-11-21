<table cellpading="2" cellspacing="2" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Recipes</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($tags as $tag)        
      <tr>
        <td>{{ $tag->id }}</td>
        <td>{{ $tag->tag->title }}</td>  
        <td>{{ $tag->recipes->count() }}</td>                
     
      </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
