{{-- <div class="form-group">
    <h1>Nutritions (Done)</h1>
   <br>
    <table>
    @foreach($nutritions as $nutrition)
        <tr>
            <td><input {{ $nutrition->value ? 'checked' : null }} data-id="{{ $nutrition->id }}" type="checkbox" class="nutrition-enable"></td>
            <td>{{ $nutrition->item->title }}</td>
            <td><input 
                value="{{ $nutrition->value ?? null }}" {{ $nutrition->value ? null : 'disabled' }} data-id="{{ $nutrition->id }}" name="nutritions[{{ $nutrition->id }}]" type="text" class="nutrition-value form-control" placeholder="value"></td>
        </tr>
    @endforeach
  </table>
  </div>
   --}}