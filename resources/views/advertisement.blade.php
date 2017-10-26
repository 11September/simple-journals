@extends('layoults.layoult')

@section('css')

@endsection

@section('content')

    @if(isset($advertisement) && $advertisement->positions->count() != 0)
        <div class="wrapper-body">
            <div class="text-center">
                @if(isset($advertisement->journal->image))
                    <div class="wrapper-item-single-journal">
                        <div class="item-journal">
                            <img src="{{ asset('storage/' . $advertisement->journal->image) }}"
                                 alt="{{ $advertisement->journal->title }}"
                                 class="img-fluid">
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

                    <hr class="red">

                    <div class="container">
                        <div class="" id="positions-wrapper"
                             style="display: flex; align-items: center; flex-direction: column;">

                            <div class="row">
                                @foreach($advertisement->positions as $position)
                                    <div class="col-md-4">
                                        <div class="position-img-container">
                                            <div class="position-img-wrapper">
                                                <img class="media-object" src="{{ asset('storage/' . $position->image) }}"
                                                     alt="Image">

                                                <div class="accept-image-wrapper">
                                                    <img class="accept-image" src="{{ asset('/images/accept.png') }}">
                                                </div>
                                            </div>

                                            <input id="position-{{ $position->id }}-chose" class="position-chose"
                                                   name="position{{ $position->id }}"
                                                   type="checkbox" posid="{{ $position->id }}"
                                                   value="{{ $position->price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-text">
                                            <span id="poistion-price-{{ $position->id }}">{{ $position->price }} </span>
                                            <i class="fa fa-eur" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-text">
                                            <p>
                                                {{ $position->name }}
                                            </p>
                                        </div>
                                    </div>


                                    @if(!$loop->last)
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                    @endif

                                    <div class="clearfix"></div>

                                    {{--<div class="positions-block" id="block-position-{{ $position->id }}">--}}

                                    {{--<div class="position-img-wrapper">--}}
                                    {{--<img class="media-object" src="{{ asset('storage/' . $position->image) }}"--}}
                                    {{--alt="Image">--}}

                                    {{--<div class="accept-image-wrapper">--}}
                                    {{--<img class="accept-image" src="{{ asset('/images/accept.png') }}" >--}}
                                    {{--</div>--}}

                                    {{--<input class="position-chose" name="position{{ $position->id }}"--}}
                                    {{--type="checkbox" posid="{{ $position->id }}"--}}
                                    {{--value="{{ $position->price }}">--}}
                                    {{--</div>--}}
                                    {{--<div class="position-text">--}}
                                    {{--<p>{{ $position->price }} <i class="fa fa-eur" aria-hidden="true"></i></p>--}}
                                    {{--</div>--}}

                                    {{--<div class="position-text">--}}
                                    {{--<p>--}}
                                    {{--{{ $position->name }}--}}
                                    {{--</p>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                @endforeach
                            </div>

                        </div>

                        <hr class="red">

                        <div class="clearfix"></div>

                        <div class="buy-form col-lg-12">
                            <div class="coupon-wrapper">
                                <div class="coupon-input">
                                    <input type="text" class="form-control coupon"
                                           placeholder="Coupon Here" id="couponBody" value="">
                                    <button type="" id="submitCoupon" class="btn btn-primary"><i
                                                class="fa fa-ticket" aria-hidden="true"></i></button>
                                </div>
                                <h2>Total price is: <span id="total_price">0 </span> <i class="fa fa-eur"
                                                                                        aria-hidden="true"></i></h2>
                            </div>

                            <div id="couponSuccess"></div>
                        </div>
                        <div class="buy-form col-lg-12">

                            <input type="text" class="form-control" id="customerName" placeholder="First name">
                            <input type="tel" class="form-control" id="customerPhone" placeholder="Phone">
                            <input type="email" class="form-control" id="customerEmail" placeholder="Email">

                            <div id="couponError">
                                @if( $errors->any() )
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <button type="submit" id="proceedPayment" class="btn btn-primary">Proceed To Payment
                            </button>
                            <div id="paypal-button-container" style="display: none;"></div>

                        </div>

                        <hr>

                        <div class="clearfix"></div>

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

@section('scripts')
    <script>
        var advertisement = {!! $advertisement !!};
        var sum = 0;
        var currentPrice = 0;
        var couponStatus = false;
        var toPay;

        function clearCouponErrors() {
            setTimeout(function () {
                $('#couponError').empty();
            }, 7000);
        }

        function rewritePositions(positions, percent) {

            $.each(positions, function (i, position) {

                $("#poistion-price-" + position.id).text(position.price);

                $("#position-" + position.id + "-chose").val(position.price);

            });

            $("#total_price").text('0');
            $('#couponSuccess').append('<p class="alert alert-success">You Refunded ' + percent + '%</p>');

        }

        function selectedPrice() {
            currentPrice = 0;
            for (var key in $(".position-chose")) {

                if ($(".position-chose").hasOwnProperty(key)) {
                    if ($(".position-chose")[key].checked) {
                        currentPrice += parseFloat($(".position-chose")[key].value);
                        $("#total_price").text(Math.round(currentPrice));
                    }
                }
            }
            
            if (currentPrice === 0) {
                currentPrice = sum;
                $("#total_price").text(Math.round(currentPrice));
            }

        }

        $('document').ready(function () {

            $('.position-img-wrapper').find(".accept-image-wrapper").css('display', 'none');
            $('.position-img-wrapper').find('input:checkbox').prop("checked", false);

            selectedPrice();

            $(".position-img-container").on('click', function () {
                if (!$(this).find('input:checkbox').attr("disabled")) {
                    if ($(this).find('input:checkbox').prop("checked")) {
                        $(this).find(".accept-image-wrapper").css('display', 'none');
                        $(this).find('input:checkbox').prop("checked", false);
                    } else {
                        $(this).find(".accept-image-wrapper").css('display', 'block');
                        $(this).find('input:checkbox').prop("checked", true);
                    }
                }

                selectedPrice();

            });

            $("#submitCoupon").on('click', function () {
                let coupon = $("#couponBody").val();

                $.ajax({
                    url: '/coupon',
                    type: 'GET',
                    data: {coupon: coupon, id: advertisement.id},
                    success: function (response) {

                        if (typeof response === 'string') {
                            $('#couponError').append('<p class="alert alert-danger">' + response + '</p>');
                            clearCouponErrors();
                        }
                        if (typeof response === 'object') {
                            couponStatus = true;
                            rewritePositions(response[0].positions, response[0].percent);
                            selectedPrice();
                        }
                    }
                });

            });

            $("#proceedPayment").on('click', function () {

                let customerData = {
                    name: $("#customerName").val(),
                    phone: $("#customerPhone").val(),
                    email: $("#customerEmail").val(),
                };

                let positions = [];
                for (var key in $(".position-chose")) {

                    if ($(".position-chose").hasOwnProperty(key)) {
                        if ($(".position-chose")[key].checked) {
                            positions[key] = $(".position-chose")[key].attributes['posid'].value;
                        }
                    }
                }

                if (positions.length > 0) {

                    $.ajax({
                        url: '/position-check',
                        type: 'GET',
                        data: {
                            positions: positions,
                            customer: customerData,
                            coupon_status: couponStatus,
                            journal_id: advertisement.journal_id,
                        },
                        success: function (response) {
                            
                            if (typeof response === 'string') {
                                $("#couponError").empty();
                                $("#couponError").append('<p class="alert alert-danger">' + response + '</p>');
                            }

                            if (typeof response === 'object') {
                                console.log(response);
                                if( ("errors" in response) ){
                                    $("#couponError").empty();

                                    $.each(response.errors, function (i, error) {
                                        $("#couponError").append('<p class="alert alert-danger">' + error[0] + '</p>');
                                    });
                                    return
                                }

                                toPay = Math.round(response.toPay);

                                $(".buy-form :input").attr("disabled", true);

                                $(".position-img-wrapper :input").attr("disabled", true);

                                $("#proceedPayment").css('display', 'none');
                                $("#paypal-button-container").css('display', 'block');
                            }

                        }

                    });

                } else {
                    $("#couponError").append('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '<span aria-hidden="true">&times;</span>\n' +
                        '</button>No Positions Selected</div>');
                }
            });

        });//document ready

        paypal.Button.render({
            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox: 'AZMB-J6m13UNxagLZXBFkiCEYj91thLcQ_e-CxvdwphvuEW9qoqpPiKMBVZp0QsryKF1eoeR6ET7Rhk8',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function (data, actions) {
                // Make a call to the REST api to create the payment

                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {total: toPay, currency: 'EUR'}
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function (data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function () {
                    window.alert('Payment Complete!');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    let customerData = {
                        name: $("#customerName").val(),
                        phone: $("#customerPhone").val(),
                        email: $("#customerEmail").val(),
                    };

                    let positions = [];
                    for (var key in $(".position-chose")) {

                        if ($(".position-chose").hasOwnProperty(key)) {
                            if ($(".position-chose")[key].checked) {
                                positions[key] = $(".position-chose")[key].attributes['posid'].value;
                            }
                        }
                    }

                    if (positions.length > 0) {

                        $.ajax({
                            url: '/payment-completed',
                            type: 'POST',
                            data: {
                                toPay: toPay,
                                positions: positions,
                                customer: customerData,
                                journal_id: advertisement.journal_id,
                            },
                            success: function (response) {

                                $.each(response, function (index, value) {
                                    $("#block-position-" + value).remove();
                                });

                            }
                        });

                    } else {
                        $("#couponError").append('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                            '<span aria-hidden="true">&times;</span>\n' +
                            '</button>No Positions Selected</div>');
                    }

                });

            }

        }, '#paypal-button-container');

    </script>
@endsection
