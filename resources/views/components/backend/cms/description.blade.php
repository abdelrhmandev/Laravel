
 


 
    



<textarea type="text" id="description_{{ $langshortcode }}" name="description_{{ $langshortcode }}" class="editor @error('description_'.$langshortcode) is-invalid @enderror" value="{{ old('description_'.$langshortcode)}}" /></textarea>

@error('description_'.$langshortcode)
<div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
@enderror

 
 
 
  
 