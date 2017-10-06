@extends('layoults.layoult')

@section('content')
    <div class="jumbotron">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll,
            it
            will remain fixed to the top of your browser's viewport.</p>
        <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>
    </div>

    <div class="row">
        <div class="album text-muted">

            @foreach($journals as $journal)
                <div class="card">
                    <a href="{{ action('JournalsController@show', $journal->id) }}">
                        <img data-src="{{ asset('storage/' . $journal->image) }}" alt="Card image cap">
                        <p class="card-text">{{ $journal->name }}</p>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

    <div class="row">
        {{ $journals->links() }}
    </div>
@endsection