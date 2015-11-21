<div class="i-menu">
    <a href="#menu" id="menuLink" class="menu-link">
        <span></span>
    </a>
    <a class="i-menu-heading" href="/">
        Remote<span>Worker</span>
    </a>
</div>

<div id="menu">
    <div class="pure-menu">
        <a class="pure-menu-heading" href="/">Remote<span>Worker</span></a>

        <ul class="pure-menu-list fa-ul">
            @foreach($categories as $category)
                <li class="pure-menu-item">
                    <a href="{{ action('RecordsController@categories', $category->alias) }}" class="pure-menu-link">
                        <i class="fa-li fa {{ $category->icon }}"></i>
                        <span>{{ $category->title }}</span>
                    </a>
                </li>
            @endforeach
                <li class="pure-menu-item">
                    <a href="{{ action('HomeController@contact') }}" class="pure-menu-link">
                        <i class="fa-li fa fa-pencil-square-o"></i>
                        <span>Обратная связь</span>
                    </a>
                </li>
        </ul>

    </div>

    <div id="sidebar">
        <p class="sidebar-heading">Популярные теги</p>
        <ul class="sidebar-tag">
            @foreach($tags as $tag)
                <li class="sidebar-tag-item">
                    <a href="{{ action('RecordsController@tags', $tag->name) }}">{{ $tag->name }}</a>
                </li>
            @endforeach
        </ul>

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
            © 2015 <a href="http://remote-worker.ru" target="_blank" class="hugo">RemoteWorker Inc.</a>
        </p>
    </div>
</div>