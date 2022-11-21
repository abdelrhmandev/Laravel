<table cellpading="0" cellspacing="2" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
    
      </tr>
    </thead>
    <tbody>
        @forelse ($brands as $brand)        
      <tr>
        <td>{{ $brand->id }}</td>
        <td>{{ $brand->brand->title }}
        
          @isset($brand->image)
          <img src="{{ Storage::url($brand->image) }}" width="50" height="50">
        @else
          Not Available
        @endisset</td>         


   
    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
