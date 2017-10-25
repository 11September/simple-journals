@extends('layoults.layoult')

@section('css')
    @if(count($journals) <= 3)
        <style>
            @media (min-width: 768px) {
                .footer{
                    position: absolute;
                    bottom: 0;
                }
            }
        </style>
    @endif
@endsection

@section('content')

    <div class="wrapper-body">
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

@section('scripts')

@endsection