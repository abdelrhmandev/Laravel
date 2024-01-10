 

  <table border="2">
  <tr>
    <th>DisLikes {{ $counter}}</th>
  </tr>
  @foreach ($dislikes as $dislike)
  <tr>
    <td>{{ $dislike->owner->name  }} </td>
  </tr>
  @endforeach 
</table> 
