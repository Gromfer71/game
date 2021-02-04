<div class="uk-card uk-card-default uk-padding-small">
    <ul class="uk-pagination">
        <li><a href="{{ $paginator->previousPageUrl() }}"><span class="uk-margin-small-right" uk-pagination-previous></span> Предыдущая</a></li>
        <li class="uk-margin-auto-left"><a href="{{ $paginator->nextPageUrl() }}">Следующая <span class="uk-margin-small-left" uk-pagination-next></span></a></li>
    </ul>
</div>
