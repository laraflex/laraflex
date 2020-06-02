
@section('content')
<div class="container mt-4 mb-4">
    <div class="row justify-content-center mr-0 ml-0 pt-5 pb-5 border rounded">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, 
                    <a href="{{ route('verification.resend') }}">
                    {{ __('click here to request another') }}
                    </a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
