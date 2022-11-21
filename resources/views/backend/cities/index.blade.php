<table cellpading="10">
    <thead>
      <tr>
        <td>#</td>
        <td>Title</td>
        <td>Areas Counter</td>
        <td>Country</td>
      </tr>
    </thead>
    <tbody>
    @forelse ($cities as $city)
    <tr>
        <td>{{  $city->id }}</td>
        <td>{{  $city->city->title }} </td>
        <td>{{  $city->area->count() }} </td>
        <td>{{  $city->country->{'title_'.app()->getLocale() } }}</td>
    </tr>
    @empty
        {{  trans('city.no_cities_added') }}
    @endforelse
    </tbody>
</table>