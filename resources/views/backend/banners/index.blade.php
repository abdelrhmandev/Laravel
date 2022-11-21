<table cellpading="0" cellspacing="2" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
    
      </tr>
    </thead>
    <tbody>
        @forelse ($banners as $banner)        
      <tr>
        <td>{{ $banner->id }}</td>
        <td>{{ $banner->banner->title }}
        
          @isset($banner->image)
          <img src="{{ Storage::url($banner->image) }}" width="50" height="50">
        @else
          Not Available
        @endisset</td>         


   
    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
