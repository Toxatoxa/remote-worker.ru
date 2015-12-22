<div class="i-menu">
    <a href="#menu" id="menuLink" class="menu-link">
        <span></span>
    </a>
    <a class="i-menu-heading" href="/">
        Malta<span>Map</span>
    </a>
</div>

<div id="menu">
    <div class="pure-menu">
        <a class="pure-menu-heading" href="/">Malta<span>Map</span></a>

        <div class="language">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a @if(LaravelLocalization::getCurrentLocale() == $localeCode) class="active" @endif rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{$localeCode}}</a>
            @endforeach
        </div>

        <ul class="pure-menu-list fa-ul">
            @foreach($categories as $mainCategoryItem)
                <li class="pure-menu-item">
                    <a data-category-id="{{$mainCategoryItem->id}}"
                       href="{{ action('HomeController@index', ['mainCategory'=>$mainCategoryItem->alias]) }}"
                       class="main-category pure-menu-link">
                        <i class="fa-li fa {{ $mainCategoryItem->icon }}"></i>
                        <span>{{ trans('categories.'.$mainCategoryItem->title) }}</span>
                    </a>

                    <ul id="category-list-{{$mainCategoryItem->id}}"
                        class="pure-menu-list fa-ul @if(!$mainCategory || $mainCategory->id != $mainCategoryItem->id) hide @endif">
                        @foreach($mainCategoryItem->suns as $categoryItem)
                            <li id="category-list-{{$categoryItem->id}}" class="pure-menu-item">
                                <a href="{{ action('HomeController@index', ['mainCategory'=>$mainCategoryItem->alias, 'category'=>$categoryItem->alias]) }}"
                                   data-category-id="{{$categoryItem->id}}" data-parent-id="{{$mainCategoryItem->id}}"
                                   class="item-category pure-menu-link">
                                    @if($category && $categoryItem->id == $category->id )
                                        <i class="fa fa-check-square-o"></i>
                                    @else
                                        <i class="fa fa-square-o"></i>
                                    @endif
                                    <span>{{$categoryItem->title}}</span>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>
            @endforeach
            <li class="pure-menu-item">
                <a href="{{ action('HomeController@contact') }}" class="pure-menu-link">
                    <i class="fa-li fa fa-pencil-square-o"></i>
                    <span>{{ trans('messages.feedback') }}</span>
                </a>
            </li>
        </ul>
        <div class="hide">
            <div id="token" >{{ csrf_token() }}</div>
            <div id="ajax_url">{{ action('HomeController@getRecords') }}</div>
            <div id="category_url">@if($mainCategory) {{ action('HomeController@index', ['mainCategory'=>$mainCategory->alias]) }} @endif</div>
        </div>


    </div>

    <div id="sidebar">
        @if($tags)
            <p class="sidebar-heading">Популярные теги</p>
            <ul class="sidebar-tag">
                @foreach($tags as $tag)
                    <li class="sidebar-tag-item">
                        <a href="{{ action('RecordsController@tags', $tag->name) }}">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
            @endif
                    <!--
        <ul class="sidebar-social-wrapper">
            <li class="sidebar-social-icon">
                <a href="https://twitter.com/" target="_blank" title="Twitter" class="twitter"><i class="fa fa-twtr"></i></a>
            </li>
            <li class="sidebar-social-icon">
                <a href="https://www.facebook.com/" target="_blank" title="Facebook" class="facebook"><i class="fa fa-fb"></i></a>
            </li>
            <li class="sidebar-social-icon">
                <a href="http://remote-worker.ru/index.xml" type="application/rss+xml" target="_blank" class="rss"><i class="fa fa-rss"></i></a>
            </li>
        </ul>
        -->

            <!--
            <ul class="sidebar-menu-wrapper">
                <li class="sidebar-menu"><a href="/advertise">Реклама</a></li>
                <li class="sidebar-menu"><a href="/terms">Условия</a></li>
            </ul>
            -->

            <p class="copyright">
                © 2015 <a href="http://maltamap.info" target="_blank" class="hugo">MaltaMap Inc.</a>
            </p>
    </div>
</div>