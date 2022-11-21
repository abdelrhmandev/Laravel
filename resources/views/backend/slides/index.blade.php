<table cellpading="2" cellspacing="2" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($slides as $slide)        
      <tr>
        <td>{{ $slide->id }}
        
          @if($slide->image)  
          <img width="80" height="80" src="{{ asset('storage/'.$slide->image) }}">
          @endif            
        </td>


        <td>{{ $slide->slide->title }}</td>                
        <td>{{ $slide->slide->description }}</td>        
      </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
