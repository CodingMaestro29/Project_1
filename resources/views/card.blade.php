@extends('layouts.app11')

@section('content') 
<link rel="stylesheet" type="text/css" href="https://www.paypalobjects.com/webstatic/en_US/developer/docs/css/cardfields.css"/>
<!-- <script src="https://www.paypal.com/sdk/js?components=card-fields&client-id={{ env('PAYPAL_MODE') === 'sandbox' ? env('PAYPAL_SANDBOX_CLIENT_ID') : env('PAYPAL_LIVE_CLIENT_ID') }}"></script> -->
<script src="https://www.paypal.com/sdk/js?components=card-fields&client-id=AaDTqfjgDPOp-vEmaUnVUx8g-hczz_MCj2X2JKqA6QS5R2R7CIbX-PrHMIcBYZCse4P6-FtZb1WMg3MT"></script>
@php
$itemName = "Mature Driver";
$itemPrice = 17.95;
$currency = "USD";
@endphp

<div class="container">
    <div class="panel">
        <div class="overlay hidden">
            <!-- <div class="overlay-content"><img src="{{ asset('asset/images/loader.gif') }}" alt="Processing..." /></div> -->
        </div>

        <div class="panel-heading">
            <h3 class="panel-title">Charge {{ '$' . $itemPrice }} with PayPal</h3>

            <!-- Product Info -->
            <p><b>Item Name:</b> {{ $itemName }}</p>
            <p><b>Price:</b> {{ '$' . $itemPrice . ' ' . $currency }}</p>
        </div>
        <div class="panel-body">
            <!-- Display status message -->
            <div id="paymentResponse" class="hidden"></div>
            <!-- Set up a container element for the button -->
            
            <div id="checkout-form">
               <div id="card-name-field-container"></div>
                <div id="card-number-field-container"></div>
                <div id="card-expiry-field-container"></div>
                <div id="card-cvv-field-container"></div>
                <button id="card-field-submit-button" type="button">Pay Now</button>
            </div>
            
        </div>
    </div>

</div>


<script>

  
// Create the Card Fields Component and define callbacks
const cardField = paypal.CardFields({
    createOrder: function (data) {
        setProcessing(true);
        
        var postData = {request_type: 'create_order', payment_source: data.paymentSource};

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log(csrfToken);
        
        return fetch("{{route('card.process')}}", {
            method: "POST",
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: encodeFormData(postData),
            url : "{{route('card.process')}}",
        })
        .then((res) => {
            return res.json(); // Return the promise
        })
        .then((result) => {
            console.log(result); // Log the parsed JSON result
            setProcessing(false);
            if(result.status == 1){
                return result.data.id;
            } else {
                resultMessage(result.msg);
                return false;
            }
        });
    },
    onApprove: function (data) {
        console.log('test');
        setProcessing(true);

        const { orderID } = data;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Define csrfToken here
        
        var postData = {request_type: 'capture_order', order_id: orderID};
        return fetch("{{route('card.process')}}", {
            method: "POST",
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            url : "{{route('card.process')}}",
            body: encodeFormData(postData)
        })
        .then((res) => {
            return res.json();
        })
        .then((result) => {
            // Redirect to success page
            if(result.status == 1){

                fetch("{{ route('set.session.success') }}", {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ success: true })
            })
            .then(() => {
                window.location.href = "{{route('payment')}}";
            })
            .catch((error) => {
                console.error("Failed to set session variable:", error);
            });

              //  window.location.href = "{{route('payment')}}";
            }else{
                resultMessage(result.msg);
            }
            setProcessing(false);
        });
    },
    onError: function (error) {
        // Do something with the error from the SDK
    },
});

// Render each field after checking for eligibility
if (cardField.isEligible()) {
    const nameField = cardField.NameField();
    nameField.render("#card-name-field-container");

    const numberField = cardField.NumberField();
    numberField.render("#card-number-field-container");

    const cvvField = cardField.CVVField();
    cvvField.render("#card-cvv-field-container");

    const expiryField = cardField.ExpiryField();
    expiryField.render("#card-expiry-field-container");

    // Add click listener to submit button and call the submit function on the CardField component
    document
    .getElementById("card-field-submit-button")
    .addEventListener("click", () => {
        cardField.submit().then(() => {
            // submit successful
        })
        .catch((error) => {
            resultMessage(`Sorry, your transaction could not be processed... >>> ${error}`);
        });
    });
} else {
    // Hides card fields if the merchant isn't eligible
    document.querySelector("#checkout-form").style = "display: none";
}

const encodeFormData = (data) => {
    var form_data = new FormData();

    for ( var key in data ) {
        form_data.append(key, data[key]);
    }
    return form_data;   
}

// Show a loader on payment form processing
const setProcessing = (isProcessing) => {
    if (isProcessing) {
        document.querySelector(".overlay").classList.remove("hidden");
    } else {
        document.querySelector(".overlay").classList.add("hidden");
    }
}

// Display status message
const resultMessage = (msg_txt) => {
    const messageContainer = document.querySelector("#paymentResponse");

    messageContainer.classList.remove("hidden");
    messageContainer.textContent = msg_txt;
    
    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageContainer.textContent = "";
    }, 5000);
}
</script>


@endsection