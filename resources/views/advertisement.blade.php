@extends('layoults.layoult')

@section('css')

@endsection

@section('content')

    @if(isset($advertisement) &&  $advertisement)
        <div class="wrapper-body">
            <div class="text-center">
                @if(isset($advertisement->journal->image))
                    <div class="wrapper-item-single-journal">
                        <div class="item-journal">
                            <a href="{{ action('JournalsController@show', $advertisement->journal->id) }}">
                                <img src="{{ asset('storage/' . $advertisement->journal->image) }}"
                                     alt="{{ $advertisement->journal->title }}"
                                     class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif

                @if(isset($advertisement->journal->url))
                    <h3 class="heading-journal">{{ $advertisement->journal->url }}</h3>
                @endif

                <div class="content">
                    @if(isset($advertisement->journal->description))
                        {!! $advertisement->journal->description !!}
                    @endif

                    @if(isset($advertisement->title))
                        {!! $advertisement->title !!}
                    @endif
                </div>

                @if($advertisement->positions)
                    @foreach($advertisement->positions as $position)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item-journal">
                                    <img src="{{ asset('storage/' . $position->image) }}"
                                         alt="{{ $position->name }}"
                                         class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ $position->name }}</h4>
                                <p>{{ $position->description }}</p>
                                <p>{{ $position->price }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    @endif

    @if(isset($journal) && $journal)
        <div class="wrapper-journal">
            <div class="noAdvertisements center">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">Sorry advertisements not found!</h4>
                    <p class="text-center">Aww yeah, you successfully read this important alert message. This
                        example text is going to run a bit longer so that you can see how spacing within an
                        alert works with this kind of content.</p>
                </div>
            </div>

            <div class="text-center">
                @if($journal->image)
                    <div class="wrapper-item-single-journal">
                        <div class="item-journal">
                            <a class="item-link"
                               href="{{ action('JournalsController@advertisement', $journal->id) }}">
                                <img src="{{ asset('storage/' . $journal->image) }}"
                                     class="img-fluid"
                                     alt="{{ $journal->title }}">
                            </a>
                        </div>

                        @if($journal->name)
                            <h3 class="heading-journal">About {{ $journal->name }}</h3>
                        @endif

                        <div class="content">
                            {!! $journal->description !!}
                        </div>

                    </div>
                @endif

            </div>
        </div>
    @endif

@endsection
