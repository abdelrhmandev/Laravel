<table cellpading="0" cellspacing="2" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
    
      </tr>
    </thead>
    <tbody>
        @forelse ($pages as $page)        
      <tr>
        <td>{{ $page->id }}</td>
        <td>{{ $page->page->title }}
        
          @isset($page->image)
          <img src="{{ Storage::url($page->image) }}" width="50" height="50">
        @else
          Not Available
        @endisset</td>         


   
    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
