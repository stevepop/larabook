@if ($statuses->count())
    @foreach ($statuses as $status)
        @include('statuses.partials.status')
    @endforeach
@else
    <p>The user hasn't yet posted a status</p>
@endif