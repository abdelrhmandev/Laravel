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
                     <span>{{ __('site.yes')}}</span>                                          
            </label>
        </div>
        @if(isset($commentscount))

        <div class="my-1 mt-5">
        <a href="{{ route(config('custom.route_prefix').'.comments.index',$postid)}}" class="btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold me-1 active">
            <i class="bi bi-chat-square fs-2 me-1"></i>{{ $commentscount }} {{ __('comment.plural')}}</a>
        </div>
        @endif
    </div>
</div>