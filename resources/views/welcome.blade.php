@extends('layoults.layoult')

@section('css')
    <style>

    </style>
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        // paypal.Button.render({
        // <div id="paypal-button-container"></div>
        //     env: 'sandbox', // sandbox | production

        //     // PayPal Client IDs - replace with your own
        //     // Create a PayPal app: https://developer.paypal.com/developer/applications/create
        //     client: {
        //         sandbox:    'AZMB-J6m13UNxagLZXBFkiCEYj91thLcQ_e-CxvdwphvuEW9qoqpPiKMBVZp0QsryKF1eoeR6ET7Rhk8',
        //         production: '<insert production client id>'
        //     },

        //     // Show the buyer a 'Pay Now' button in the checkout flow
        //     commit: true,

        //     // payment() is called when the button is clicked
        //     payment: function(data, actions) {

        //         // Make a call to the REST api to create the payment
        //         return actions.payment.create({
        //             payment: {
        //                 transactions: [
        //                     {
        //                         amount: { total: '0.01', currency: 'EUR' }
        //                     }
        //                 ]
        //             }
        //         });
        //     },
        //     // onAuthorize() is called when the buyer approves the payment
        //     onAuthorize: function(data, actions) {

        //         // Make a call to the REST api to execute the payment
        //         return actions.payment.execute().then(function() {
        //             window.alert('Payment Complete!');
        //         });
        //     }

        // }, '#paypal-button-container');

//        $(document).ready(function () {
//            function isVisible(row, container) {
//
//                var elementTop = $(row).offset().top,
//                    elementHeight = $(row).height(),
//                    containerTop = container.scrollTop(),
//                    containerHeight = container.height(),
//                    navbarTop = $("#navbar").offset().top,
//                    navbarHeight = $("#navbar").height();
//
//                return ((((elementTop - navbarTop * 0.45 - containerTop) + elementHeight - navbarHeight * 0.45) > 0) && ((elementTop - navbarTop * 0.45 - containerTop) < containerHeight));
//            }
//
//            $(window).scroll(function () {
//                if (!( isVisible($("#logo-block"), $(window)) )) {
//                    $("#navbar-logo").css("display", "inline-block");
//                    $("#navbar-logo").addClass('w3-animate-zoom');
//                } else {
//                    $("#navbar-logo").css("display", "none");
//                }
//                ;
//            });
//        });
    </script>
@endsection