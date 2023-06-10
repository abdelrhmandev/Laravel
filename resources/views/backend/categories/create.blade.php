<select>
@foreach ($categories as $category)
<option value="">{{ $category['id'] }}</option>
@endforeach
</select>