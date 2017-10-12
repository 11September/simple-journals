@extends('layoults.layoult')

@section('content')

    <div class="row">
        <div id="logo-block" class="col-lg-12" style="text-align: center; margin: 20px;">
            <img src="{{ asset('images/Logo-Cosmo-Press@2x.png') }}">
        </div>
    </div>

    <div class="wrapper-body">
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

        <div class="row center-pagination">
            <nav aria-label="Page navigation example">
                <div class="justify-content-center">
                    {{ $journals->links() }}
                </div>
            </nav>
        </div>
    </div>
@endsection