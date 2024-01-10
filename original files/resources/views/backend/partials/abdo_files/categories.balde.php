<h1>Categories</h1>
<table border="2">
  <tr>
<td>
  <select>
<option>-----</option>
    @foreach($categories as $category)
  <option value="{{ $category->id }}" {{ $category->id == $row->category_id ? "selected" : "" }}> {{ $category->item->title }}</option>
  @endforeach
  </select>   
</td>
</tr>
</table>
