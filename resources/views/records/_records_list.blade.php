@forelse($records as $record)
    <section class="post">
        <header class="post-header">
            <h2 class="post-title">
                <a href="{{ $record->url }}" target="_blank" onclick="trackOutboundLink('{{ $record->title }}')">{{ $record->title }}</a>
            </h2>
            <p class="post-meta post-author">
                By Gustavo Tanaka, Medium
                @foreach($record->tags as $tag)
                    <a class="post-tag post-tag-design" href="{{ action('RecordsController@tags', $tag->name) }}">{{ $tag->name }}</a>
                @endforeach
            </p>
        </header>
        <div class="post-description">
            <p>{{ $record->body }}</p>
        </div>
    </section>
@empty
    <p>Нет записей</p>
@endforelse