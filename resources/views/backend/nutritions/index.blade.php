<table cellpading="5" cellspacing="5" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
 
  
 
        {{-- <th>Users has Reviewed</th> --}}
      </tr>
    </thead>
    <tbody>
        @forelse ($nutritions  as $nutrition)        
      <tr>
        <td>{{ $nutrition->id }}</td>
        <td>{{ $nutrition->nutrition->title }}</td>         
 
        <td><a href="{{ route('nutritions.edit',$nutrition->id) }}"> Edit</a></td>

        <td><a href="{{ route('nutritions.destroy',$nutrition->id) }}"> delete</a></td>

    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
