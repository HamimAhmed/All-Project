@extends('layout.frontened')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{count($cart)}}</span>
            </h4>

            <ul class="list-group mb-3">
                @foreach($cart as $product_id => $product)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $product['name'] }}</h6>
                        <small class="text-muted">{{ $product['quantity'] }}</small>
                    </div>
                    <span class="text-muted">{{ number_format($product['total_price']) }}</span>
                </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>{{ number_format($total,2) }}</strong>
                    </li>

            </ul>


        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>


            <form class="needs-validation" novalidate action="{{ route('checkout') }}" method="post">
                @csrf
                <div class="row">


                    <div class="col-md-10 mb-3">
                        <label for="firstName">Customer Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" name="customer_name" value="{{ auth()->user()->name }}" required>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="address">Customer Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required name="customer_address" value="{{ auth()->user()->address }}">

                </div>

                <div class="mb-3">
                    <label for="address2">Customer Contact No <span class="text-muted"></span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" name="customer_contact_no" value="{{ auth()->user()->contact_no }}">
                </div>


                <hr class="mb-4">

                <hr class="mb-4">

                {{--Further Development Process--}}

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country">
                            <option value="">Choose...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state">
                            <option value="">Choose...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>


                <hr class="mb-4">

                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback">
                            Name on card is required
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="">
                        <div class="invalid-feedback">
                            Credit card number is required
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="">
                        <div class="invalid-feedback">
                            Expiration date required
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="">
                        <div class="invalid-feedback">
                            Security code required
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>

    @endsection
