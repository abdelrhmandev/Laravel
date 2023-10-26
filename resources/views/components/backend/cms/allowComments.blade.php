<div class="card card-flush">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ __('comment.allow')}}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="form-check form-switch form-check-custom form-check-solid">

  
            @if($action == 'create')
                <input class="form-check-input" type="checkbox" value="1" name="allow_comments" id="allow_comments" checked="checked" />
            @elseif($action == 'edit')
                <input class="form-check-input" type="checkbox" value="1" name="allow_comments" id="allow_comments" @if(isset($allowcomments) && $allowcomments == '1') checked="checked" @endif />
            @endif
            <label class="form-check-label" for="allow_comments">
                @if(isset($allowcomments) && $allowcomments == '1') 
                    <span>{{ __('site.yes')}}</span>
                @elseif(isset($allowcomments) && $allowcomments == '0') 
                   <span> {{ __('site.no')}}</span>
                @else
                     <span>{{ __('site.yes')}}</span>
                @endif 
                            
            </label>
        </div>
    </div>
</div>