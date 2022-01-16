@if($paginator->hasPages())
<nav class="mt-5" aria-label="Paginação">
    <ul class="pagination justify-content-center">
        <li class="page-item {{$paginator->onFirstPage() ? 'disabled' : ''}}" aria-disabled="{{$paginator->onFirstPage() ? 'true' : 'false'}}">
            <a href="{{$paginator->previousPageUrl()}}" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        @foreach($elements as $element)
        @if(is_string($element))
        <li class="page-item disabled">
            <a class="page-link" aria-disabled="true">{{$element}}</a>
        </li>
        @endif

        @if(is_array($element))
        @foreach($element as $page => $url)
        <li class="page-item">
            <a href="{{$url}}" class="page-link {{$page === $paginator->currentPage() ? 'page-active' : ''}}" aria-current="{{$page === $paginator->currentPage() ? 'page' : ''}}">{{$page}}</a>
        </li>
        @endforeach
        @endif
        @endforeach

        <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : ''}}" aria-disabled="{{!$paginator->hasMorePages() ? 'true' : 'false'}}">
            <a class=" page-link" href="{{$paginator->nextPageUrl()}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
@endif
