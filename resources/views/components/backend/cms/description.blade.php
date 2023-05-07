
 
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Classic Default Classic Demo
        </h3>
    </div>
    


        {{-- <textarea name="rejection_reason" style="display:none" id="rejection_reason"></textarea> --}}

        <textarea type="text" name="description_{{ $langshortcode }}" class=" @error('description_'.$langshortcode) is-invalid @enderror" value="{{ old('description_'.$langshortcode)  }}" /></textarea>

 
 
 
    </div>
 