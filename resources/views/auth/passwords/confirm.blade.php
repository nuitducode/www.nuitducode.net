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
					<div class="card">
						<div class="card-header">{{ __('Confirm Password') }}</div>

						<div class="card-body">
							{{ __('Please confirm your password before continuing.') }}

							<form method="POST" action="{{ route('password.confirm') }}">
								@csrf

								<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

									<div class="col-md-6">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" />

										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>

								<div class="form-group row mb-0">
									<div class="col-md-8 offset-md-4">
										<button type="submit" class="btn btn-primary">
											{{ __('Confirm Password') }}
										</button>

										@if (Route::has('password.request'))
											<a class="btn btn-link" href="{{ route('password.request') }}">
												{{ __('Forgot Your Password?') }}
											</a>
										@endif
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