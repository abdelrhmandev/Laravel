<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
    <span class="menu-link menu-center">
        <span class="menu-icon me-0">
            <i class="ki-outline ki-document fs-2x"></i>
        </span>
        <span class="menu-title">{{ __('post.plural') }}</span>
    </span>
    <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
        <div class="menu-item">
            <div class="menu-content">
                <span class="menu-section fs-5 fw-bolder ps-1 py-1">{{ __('post.plural') }}</span>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"> {{ __('post.plural') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link" href="{{ route(config('custom.route_prefix').'.posts.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('site.all') }} {{ __('post.plural') }}</span>
                    </a>
                </div> 
                <div class="menu-item">
                    <a class="menu-link" href="{{ route(config('custom.route_prefix').'.posts.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('post.add') }}</span>
                    </a>
                </div> 
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('category.plural') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link" href="{{ route(config('custom.route_prefix').'.categories.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('site.all') }} {{ __('category.plural') }}</span>
                    </a>
                </div> 
                <div class="menu-item">
                    <a class="menu-link" href="{{ route(config('custom.route_prefix').'.categories.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('category.add') }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('tag.plural') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link" href="{{ route(config('custom.route_prefix').'.tags.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('site.all') }} {{ __('tag.plural') }}</span>
                    </a>
                </div> 
                <div class="menu-item">
                    <a class="menu-link" href="{{ route(config('custom.route_prefix').'.tags.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('tag.add') }}</span>
                    </a>
                </div>
            </div>
        </div>


        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('comment.plural') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion">
                <div class="menu-item">
                    <a class="menu-link" href="{{ route(config('custom.route_prefix').'.comments.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('site.all') }} {{ __('comment.plural') }}</span>
                    </a>
                </div> 
 
            </div>
        </div>


    </div>
</div>