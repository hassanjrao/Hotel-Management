<div>

    <div class="container">

        <h2>
            {{ $pages[$currentPage]['heading'] }}
        </h2>

        @if ($currentPage === 1)


            <div class="mb10 ">
                <div class="form-check">
                    <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block" href="{{ route('login') }}">
                        <b>Already have an account? Login</b>
                    </a>
                </div>
            </div>

            <div class="row">


                @foreach ($subscriptionPlans as $plan)
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $plan->name }}</div>
                            <div class="panel-body">{{ $plan->description }}</div>
                            <div class="panel-footer">
                                <a wire:click='selectedSubscriptionPlan({{ $plan->id }})'
                                    class="btn btn-primary">Choose this</a>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        @elseif ($currentPage === 2)
            <form wire:submit.prevent='register'>

                <div class="row ">
                    <div class="col-lg-12">

                        <div class="panel panel-default">


                            <div class="panel-heading">{{ 'Personal Details' }}</div>

                            <div class="panel-body">

                                <div class="row mb10">

                                    <div class="col-md-6">
                                        <label for="name" class="col-form-label">{{ __('First Name*') }}</label>
                                        <input id="firstName" type="text" class="form-control"
                                            wire:model.defer="firstName" autocomplete="name">

                                        @error('firstName')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name" class="col-form-label">{{ __('Last Name*') }}</label>
                                        <input id="lastName" type="text" class="form-control"
                                            wire:model.defer="lastName">

                                        @error('lastName')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb10">

                                    <div class="col-md-6">
                                        <label for="email" class="col-form-label">{{ __('Email*') }}</label>
                                        <input id="email" type="email" class="form-control"
                                            wire:model.defer="email">

                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address" class="col-form-label">{{ __('Address*') }}</label>
                                        <input id="address" type="text" class="form-control"
                                            wire:model.defer="address">

                                        @error('address')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb10">

                                    <div class="col-md-6">
                                        <label for="postCode" class="col-form-label">{{ __('Post Code*') }}</label>
                                        <input id="postCode" type="text" class="form-control"
                                            wire:model.defer="postCode">

                                        @error('postCode')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="city" class="col-form-label">{{ __('City*') }}</label>
                                        <input id="city" type="text" class="form-control"
                                            wire:model.defer="city">

                                        @error('city')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb10">



                                    <div class="col-md-6">
                                        <label for="country" class="col-form-label">{{ __('Country*') }}</label>
                                        <input id="country" type="text" class="form-control"
                                            wire:model.defer="country">

                                        @error('country')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="mobile" class="col-form-label">{{ __('Mobile*') }}</label>
                                        <input id="mobile" type="text" class="form-control"
                                            wire:model.defer="mobile">

                                        @error('mobile')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb10 mt10">



                                    <div class="col-md-6">
                                        <label for="password" class="col-form-label">{{ __('Password*') }}</label>
                                        <input id="password" type="password" class="form-control"
                                            wire:model.defer="password">

                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password-confirm"
                                            class="col-form-label">{{ __('Confirm Password*') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            wire:model.defer="passwordConfirmation">

                                        @error('passwordConfirmation')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                </div>


                                <div class="row mb10">



                                    <div class="col-md-6">
                                        <label for="userType" class="col-form-label">{{ __('Register as*') }}</label>

                                            <select wire:model="userType" class="form-control">
                                                <option value="client">Customer</option>
                                                <option value="hotel">Hotel</option>
                                            </select>

                                        @error('userType')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                </div>

                            </div>

                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="text-center">
                        <button type="button" wire:click='prevStep()' class="btn btn-primary">
                            {{ __('Back') }}
                        </button>
                        <button type="submit" class="btn btn-primary" id="reg-button">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>

            </form>
        @elseif ($currentPage === 3)
            <div class="row ">
                <div class="col-lg-6 col-md-offset-3">

                    <div class="panel panel-default">


                        <div class="panel-heading">{{ 'Card Details' }}</div>

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" id="card-holder-name"
                                            class="form-control" value="" placeholder="Name on the card">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Card details</label>
                                        <div id="card-element"></div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="text-center">
                    <button type="button" wire:click='prevStep()' class="btn btn-primary">
                        {{ __('Back') }}
                    </button>
                    <button type="submit" data-secret="{{ $clientSecret }}" class="btn btn-primary" id="reg-button">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>

            <br><br><br><br><br>

        @endif

    </div>

</div>

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.addEventListener('stripe', event => {
            const stripe = Stripe('{{ env('STRIPE_KEY') }}')

            console.log("stripee")

            const elements = stripe.elements()
            const cardElement = elements.create('card')

            cardElement.mount('#card-element')

            const form = document.getElementById('payment-form')
            const cardBtn = document.getElementById('reg-button')
            const cardHolderName = document.getElementById('card-holder-name')

            $("#reg-button").on("click", async function() {

                console.log("forrrrrrrrrrrrrr");

                cardBtn.disabled = true
                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    cardBtn.dataset.secret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    })

                if (error) {
                    console.log(error)
                    cardBtn.disable = false
                } else {
                    console.log(setupIntent)

                    @this.set('paymentMethod', setupIntent.payment_method)

                    @this.subscription()

                }
            })

        })
    </script>
@endpush
