<div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">

                <form wire:submit.prevent='register'
                accept-charset="UTF-8" action="" class="require-validation" data-cc-on-file="false"
                        data-stripe-publishable-key="{{ config('services.stripe.key') }}">

                    <div class="mb10 ">
                        <div class="form-check">
                            <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block" href="{{ route('login') }}">
                                <b>Already have an account? Login</b>
                            </a>
                        </div>
                    </div>

                    <div class="row mb10">

                        <div class="col-md-6">
                            <label for="name" class="col-form-label">{{ __('First Name*') }}</label>
                            <input id="name" type="text" class="form-control" wire:model.defer="firstName"
                                autocomplete="name">

                            @error('firstName')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="col-form-label">{{ __('Last Name*') }}</label>
                            <input id="name" type="text" class="form-control" wire:model.defer="lastName">

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
                            <input id="email" type="email" class="form-control" wire:model.defer="email">

                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="col-form-label">{{ __('Address*') }}</label>
                            <input id="address" type="text" class="form-control" wire:model.defer="address">

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
                            <input id="postCode" type="text" class="form-control" wire:model.defer="postCode">

                            @error('postCode')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="city" class="col-form-label">{{ __('City*') }}</label>
                            <input id="city" type="text" class="form-control" wire:model.defer="city">

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
                            <input id="country" type="text" class="form-control" wire:model.defer="country">

                            @error('country')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="mobile" class="col-form-label">{{ __('Mobile*') }}</label>
                            <input id="mobile" type="text" class="form-control" wire:model.defer="mobile">

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
                            <input id="password" type="password" class="form-control" wire:model.defer="password">

                            @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password*') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                wire:model.defer="passwordConfirmation">

                            @error('passwordConfirmation')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                    </div>





                    <div class="row mt10">

                        <br><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
