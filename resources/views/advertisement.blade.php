@extends('layoults.layoult')

@section('css')

@endsection

@section('content')
    <div class="wrapper-body">
        <div class="text-center">
            @if($advertisement->journal->image)
                <div class="wrapper-item-single-journal">
                    <div class="item-journal">
                        <a href="{{ action('JournalsController@show', $advertisement->journal->id) }}">
                            <img src="{{ asset('storage/' . $advertisement->journal->image) }}"
                                 alt="{{ $advertisement->journal->title }}"
                                 style="width: 100%;">
                        </a>
                    </div>
                </div>
            @endif

            @if($advertisement->journal->url)
                <h3 class="heading-journal">{{ $advertisement->journal->url }}</h3>
            @endif

            <div class="content">
                {!! $advertisement->journal->description !!}
            </div>

            <div class="content">
                {!! $advertisement->title !!}
            </div>

            @foreach($advertisement->positions as $position)
                <div class="row">
                    <div class="col-md-6">
                        <div class="item-journal">
                            <img src="{{ asset('storage/' . $position->image) }}"
                                 alt="{{ $position->name }}"
                                 style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>{{ $position->name }}</h4>
                        <p>{{ $position->description }}</p>
                        <p>{{ $position->price }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
