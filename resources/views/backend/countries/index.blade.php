<h1>
  <a target="_new" href="{{ asset('storage/flags/eg.svg') }}">Click</a>


 
  

  </h1>

<br/>

{{  public_path() }}

 
<table cellpading="2" class="d-none">
    <thead>
      <tr>
        <td>#</td>
        <td>Title</td>
        <td>Cities Counter</td>
      </tr>
    </thead>
    <tbody>
    @forelse ($countries as $country)
    <tr>
        <td>{{  $country->id }}
        @if($country->flag)  
        <img width="80" height="80" src="{{ asset('storage/'.$country->flag) }}">
        @endif  
      </td>
        
        <td>{{  $country->{'title_'.app()->getLocale() } }}</td>
        
        <td>{{  $country->city->count() }}</td>       

        <br/><table cellpading="5" cellspacing="15" border="0">
    </tr>
    @empty
        {{  trans('city.no_cities_added') }}
    @endforelse
    </tbody>
</table>