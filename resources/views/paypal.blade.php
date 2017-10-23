<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div id="paypal-button-container" style="display: none;"></div>
</body>
</html>

<script>

    var toPay = {!! $toPay !!};
    var redirectTo = {!! $redirectTo !!};

    $("document").ready( function(){
        $("#paypal-button-container").trigger('click');
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
                            amount: { total: toPay, currency: 'EUR' }
                        }
                    ]
                }
            });
        },

        // onAuthorize() is called when the buyer approves the payment
        onAuthorize: function(data, actions) {

            // Make a call to the REST api to execute the payment
            return actions.payment.execute().then(function() {
                // window.alert('Payment Complete!');
                window.location = redirectTo;
            });

        }

    }, '#paypal-button-container');
</script>