
<div id="galleryCounter" style="background: green;"></div>
<br>
<br>
<br>
@if(count($media))
<table id="gallery" border="1">
  <tr>
    <th>ID</th>
    <th>IMAGE</th>
  </tr>
  @foreach ($media as $gallery)
  <tr id="tr_{{ $gallery->id }}">
    <td>
      
      {{ $gallery->id }}       
    </td>
    <td>
      <button id="delete_cat_id" value="{{ $gallery->id }}" class="delete_category_btn">DELETE</button>
      {{-- <img src="{{ asset($gallery->file) }}" width="100">   --}}
    </td> 
  </tr>
  @endforeach   
</table>
@else
<div id="EmptygalleryMsg"></div>
@endif 



<div id="EmptygalleryMsg1"></div>