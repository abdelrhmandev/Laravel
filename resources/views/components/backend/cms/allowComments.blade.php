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
            <span class="svg-icon svg-icon-2tx svg-icon-success me-4"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"/>
                <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"/>
                <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"/>
                </svg>
                </span>
            <a href="{{ route(config('custom.route_prefix').'.comments.index',$postid)}}"><span class="text-gray-900 fw-bolder fs-6">{{ $commentscount }} {{ __('comment.plural')}}</span></a>
        </div>
        @endif
    </div>
</div>