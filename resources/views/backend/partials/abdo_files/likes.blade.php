{{-- https://laraveldaily.com/post/eloquent-withcount-get-related-records-amount --}}

{{-- https://github.com/laravel/framework/discussions/34057 --}}
<table border="2">
  <tr>
    <th>Likes {{ $counter}}</th>
  </tr>
  @foreach ($likes as $like)
  <tr>
    <td>{{ $like->owner->name }} </td>
  </tr>
  @endforeach 
</table> 
