@extends('layoults.layoult')

@section('css')

@endsection

@section('content')
    <div class="wrapper-journal">
        <div class="text-center">
            @if($journal->image)
                <div class="wrapper-item-single-journal">
                    <div class="item-journal">
                        <a class="item-link" href="{{ action('JournalsController@advertisement', $journal->id) }}">
                            <img src="{{ asset('storage/' . $journal->image) }}"
                                 class="img-fluid"
                                 alt="{{ $journal->name }}">
                        </a>
                    </div>

                    <h3 class="heading-journal"><a href="{{ action('JournalsController@advertisement', $journal->id) }}">CLICK IMAGE TO ORDER</a></h3>

                    <div class="content">
                        {!! $journal->description !!}
                    </div>

                </div>
            @endif

        </div>
    </div>

@endsection
