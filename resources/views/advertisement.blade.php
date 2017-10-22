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
                        <div class="row">
                            <div class="list-group col-lg-6" id="positions-wrapper">

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

                                    <div class="positions-block">

<!--                                         <div class="checkbox position-chose">
                                            
                                        </div> -->

                                        <div class="position-img-wrapper">
                                            <img class="media-object" src="{{ asset('storage/' . $position->image) }}" alt="Image">
                                            <input class="position-chose" name="position{{ $position->id }}" type="checkbox" value="{{ $position->price }}">
                                            <div class="position-price-wrapper">
                                                <span class="position-price label label-danger">{{ $position->price }}$</span>
                                            </div>                                            
                                        </div>

                                        <!-- <div class="media-body">
                                            <h4 class="media-heading">{{ $position->name }}</h4>
                                            <p>{{ $position->description }}</p>
                                        </div> -->
                                        
                                    </div>  
                                @endforeach
                            </div>

                            <div class="buy-form col-lg-5">

                                    <div class="form-group">
                                        <h2>Total price is: <span id="total_price">{{ $sum }} </span><i class="fa fa-eur" aria-hidden="true"></i></h2>
                                        <!-- <label for="staticEmail2" class="sr-only">Code</label> -->
                                        <div class="coupon-wrapper">
                                            <input type="text" class="form-control-plaintext coupon" placeholder="Coupon Here" id="couponBody" value="">
                                            <button type="" id="submitCoupon" class="btn btn-primary"><i class="fa fa-ticket" aria-hidden="true"></i></button>
                                        </div>
                                        
                                    </div>    
                                    <div id="couponError"></div>         
                                    <div id="couponSuccess"></div>                         
                                    <input type="text" class="form-control" placeholder="First name">
                                    <input type="text" class="form-control" placeholder="Last name">
                                    <input type="text" class="form-control" placeholder="Email">
                                    <input type="text" class="form-control" placeholder="Email">
                                    <input type="text" class="form-control" placeholder="Address">
                                    <div id="paypal-button-container"></div>

                            </div>
                        </div>
                        <br>
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
        var sum = {!! $sum !!}
        var currentPrice = 0;   

        function clearCouponErrors(){
            setTimeout(function(){ $('#couponError').empty(); }, 7000);
        }

        function rewritePositions( positions, percent, _sum ){
            $("#positions-wrapper").empty();            

            $.each( positions, function( i, position ) {
                
                $("#positions-wrapper").append(
                    `
                    <div class="positions-block">

                        <div class="position-img-wrapper">
                            <img class="media-object" src="{{ asset('storage') }}/${position.image}" alt="Image">
                            <input class="position-chose" name="position${position.id}" type="checkbox" value="${position.price}">
                            <div class="position-price-wrapper">
                                <span class="position-price label label-danger">${position.price}$</span>
                            </div>                                            
                        </div>
                        
                    </div> 
                    `
                );

            });
            
            sum = _sum
            $("#total_price").text( _sum );
            $('#couponSuccess').append('<p class="alert alert-success">You Refunded '+percent+'%</p>');

        }

        function selectedPrice(){
            currentPrice = 0;
            for (var key in $(".position-chose")) {
                
                if ($(".position-chose").hasOwnProperty(key)) {
                    if( $(".position-chose")[key].checked ){
                        currentPrice += parseInt( $(".position-chose")[key].value );
                        $("#total_price").text(currentPrice);
                    }
                }
            }

            if( currentPrice === 0 ){
                currentPrice = sum;
                $("#total_price").text(currentPrice);
            }
            
        }

        $('document').ready(function(){

            selectedPrice();

            $("#positions-wrapper").on('click', '.position-img-wrapper', function(){

                if( $(this).find('input:checkbox').prop("checked") ){
                    $(this).find('input:checkbox').prop("checked", false);
                }else{
                    $(this).find('input:checkbox').prop("checked", true);
                }

                selectedPrice();

            });

            $("#submitCoupon").on('click', function(){
                let coupon = $("#couponBody").val();

                $.ajax({
                    url: '/coupon',
                    type: 'GET',
                    data: {coupon: coupon, id: advertisement.id},
                    success: function( response ){

                        if( typeof response === 'string' ){
                            $('#couponError').append('<p class="alert alert-danger">'+response+'</p>');
                            clearCouponErrors();
                        }
                        if( typeof response === 'object' ){                        
                            rewritePositions( response[0].positions, response[0].percent, response[1] );
                        }
                    }                    
                });

            });
        });

        paypal.Button.render({            
            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AZMB-J6m13UNxagLZXBFkiCEYj91thLcQ_e-CxvdwphvuEW9qoqpPiKMBVZp0QsryKF1eoeR6ET7Rhk8',
                production: '<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '0.01', currency: 'EUR' }
                            }
                        ]
                    }
                });
            },
            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                });
            }

        }, '#paypal-button-container');

    </script>
@endsection
