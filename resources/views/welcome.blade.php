@extends('layoults.layoult')

@section('content')
    <div class="row">
        <div class="album text-muted">



        </div>
    </div>


    <div class="row">

        @foreach($journals as $journal)

            <div class="col-md-4">
                <div class="wrapper-item">
                    <div class="item">
                        <a href="{{ action('JournalsController@show', $journal->id) }}">
                            <img src="{{ asset('storage/' . $journal->image) }}" alt="{{ $journal->name }}">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>

    <div class="row">
        {{ $journals->links() }}
    </div>
@endsection