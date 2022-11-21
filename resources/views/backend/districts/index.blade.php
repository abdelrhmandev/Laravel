<table cellpading="2" cellspacing="2" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Area</th>
        <th>City</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($districts as $district)        
      <tr>
        <td>{{ $district->id }}</td>
        <td>{{ $district->district->title }}</td>        
        <td>{{ $district->area->area->title }}</td>
        <td>{{ $district->area->city->city->title }}</td>
        <td>{{ $district->area->city->country->{'title_'.app()->getLocale() } }}</td>
        
    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
