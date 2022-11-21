<table cellpading="5" cellspacing="5" border="0">

    <thead>
      <tr>
        <th>#</th>
        <th>email</th>
 
  
 
        {{-- <th>Users has Reviewed</th> --}}
      </tr>
    </thead>
    <tbody>
        @forelse ($subscriptions  as $subscription)        
      <tr>
        <td>{{ $subscription->id }}</td>
        <td>{{ $subscription->email }}</td>         
 
 
    </tr>
      @empty
      {{  trans('area.no_aras_added') }}
      @endforelse

    </tbody>
  </table>
