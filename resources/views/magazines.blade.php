@extends('layoults.layoult')

@section('css')

@endsection

@section('content')
    <div class="wrapper-body-magazines">
        <div class="row">
            @foreach($journals as $journal)

                <div class="col-md-4">
                    <div class="wrapper-item">
                        <div class="item effect-picture">
                            <div class="preview bw">
                                <a href="{{ action('JournalsController@show', $journal->id) }}">
                                    <img class="preview img-fluid" src="{{ asset('storage/' . $journal->image) }}"
                                         alt="{{ $journal->name }}">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>

        <div class="row center-pagination">
            <nav aria-label="Page navigation example">
                <div class="justify-content-center">
                    {{ $journals->links() }}
                </div>
            </nav>
        </div>
    </div>
@endsection