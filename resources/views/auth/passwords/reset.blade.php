@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	@include('inc-meta')

    <title>{{ config('app.name', 'Laravel') }}</title> 

</head>
<body>
    <div id="app">
	
		@include('inc-nav')
				
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card mt-5 text-muted" style="background:none;border:none;">
						<p><b>{{ __('CUST - Reset password') }}</b></p>
		 
						<div class="card-body">
							<form method="POST" action="{{ route('password.update') }}">
								@csrf

								<input type="hidden" name="token" value="{{ $token }}">

								<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('CUST - E-mail address') }}</label>

									<div class="col-md-6">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autofocus />

										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('CUST - Password') }}</label>

									<div class="col-md-6">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" />

										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row">
									<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('CUST - Confirm password') }}</label>

									<div class="col-md-6">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" />
									</div>
								</div>

								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-primary">
											{{ __('CUST - reset password') }}
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!-- container -->
		
    </div><!-- app -->
	
	@include('inc-bottom-js')	
	
</body>
</html>
