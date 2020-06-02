
@section('content')
<div class="container mt-4 mb-4">
    <div class="row justify-content-center mr-0 ml-0 pt-5 pb-5 border rounded">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-10 col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-10 col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-light btn-outline-secondary px-4">
                                    {{ __('Send') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4 mt-2"><i>
                                *{{ __('Send Password Reset Link') }}
                            </i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
