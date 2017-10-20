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
                        <p>
                            {!! $advertisement->journal->description !!}
                        </p>
                    @endif

                    @if(isset($advertisement->title))
                        <p>
                            {!! $advertisement->title !!}
                        </p>
                    @endif
                </div>

                @if($advertisement->positions)

                    <hr>

                    <div class="container">
                        <div class="list-group">

                            @foreach($advertisement->positions as $position)
                                {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                {{--<div class="item-journal">--}}
                                {{--<img src="{{ asset("voyager/sales.jpg") }}"--}}
                                {{--alt="{{ $position->name }}"--}}
                                {{--class="img-fluid">--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                {{--<div class="item-journal">--}}
                                {{--<img src="{{ asset("storage/$position->image") }}"--}}
                                {{--alt="{{ $position->name }}"--}}
                                {{--class="img-fluid">--}}
                                {{--<p>{{ $position->price }}</p>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}


                                <a href="#" class="list-group-item">
                                    <div class="media">
                                        <div class="checkbox pull-left">
                                            <label>
                                                <input name="position" type="checkbox" value="{{ $position->id }}">
                                            </label>
                                        </div>
                                        <div class="pull-left">
                                            <img class="media-object" src="http://placehold.it/100x70" alt="Image">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $position->name }}</h4>
                                            <p>{{ $position->description }}</p>
                                        </div>
                                        <span class="label label-danger pull-right">{{ $position->price }}$</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <br>
                        <hr>

                        <form class="form-inline">
                            <div class="form-group">
                                <label for="staticEmail2" class="sr-only">Code</label>
                                <input type="text" class="form-control-plaintext" id="staticEmail2" value="">
                            </div>
                            <button type="submit" class="btn btn-primary">Confirm coupon</button>
                        </form>

                        <br>
                        <hr>

                        <p>total price is: <span id="total_price">50 $</span></p>
                    </div>
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
