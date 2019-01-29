// Create a Stripe client.
var stripe = Stripe('pk_test_2knEVovZPV8n5UCFrboAfIfQ');
var $form = $('#payment-form');
var cardErrors = $('#card-errors');
function StripeResponseHandler(status,response) {
    if (response.error){
        cardErrors.removeClass('hidden');
        cardErrors.text(response.error.message);
        $form.find('button').prop('enabled',true);
    }else {
        var token = response.id;
        // Insert the token into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));

        // Submit the form:
        $form.get(0).submit();
    }
}

$form.submit(function (e) {
    cardErrors.addClass('hidden');
    $form.find('button').prop('disabled',true);
    Stripe.card.createToken({
        number: $('#card_number').val(),
        cvc: $('#cvc').val(),
        exp_month: $('#expiration_month').val(),
        exp_year: $('#expiration_year').val(),
        name: $('#card-name').val(),
    },StripeResponseHandler);
    return false;

});

// // Create an instance of Elements.
// var elements = stripe.elements();
//
// // Custom styling can be passed to options when creating an Element.
// // (Note that this demo uses a wider set of styles than the guide below.)
// var style = {
//     base: {
//         color: '#32325d',
//         lineHeight: '18px',
//         fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
//         fontSmoothing: 'antialiased',
//         fontSize: '16px',
//         '::placeholder': {
//             color: '#aab7c4'
//         }
//     },
//     invalid: {
//         color: '#fa755a',
//         iconColor: '#fa755a'
//     }
// };
//
// // Create an instance of the card Element.
// var card = elements.create('card', {style: style});
//
// // Add an instance of the card Element into the `card-element` <div>.
// card.mount('#card-element');
//
// // Handle real-time validation errors from the card Element.
// card.addEventListener('change', function(event) {
//     var displayError = document.getElementById('card-errors');
//     if (event.error) {
//         displayError.textContent = event.error.message;
//     } else {
//         displayError.textContent = '';
//     }
// });
//
// // Handle form submission.
// var form = document.getElementById('payment-form');
// form.addEventListener('submit', function(event) {
//     event.preventDefault();
//
//     stripe.createToken(card).then(function(result) {
//         if (result.error) {
//             // Inform the user if there was an error.
//             var errorElement = document.getElementById('card-errors');
//             errorElement.textContent = result.error.message;
//         } else {
//             // Send the token to your server.
//             stripeTokenHandler(result.token);
//         }
//     });
// });