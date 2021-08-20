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
						<p><b>{{ __('CUST - Verify Your mailbox') }}</b></p>

						<div class="card-body">
							@if (session('resent'))
								<div class="text-monospace text-success pb-3" role="alert">
									{{ __('CUST - A fresh verification link has been sent to your email address.') }}
								</div>
							@endif

							{{ __('CUST - Before proceeding, please check your email in a few minutes for a verification link.') }}
							{{ __('CUST - If you did not receive the email') }},
							<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
								@csrf
								<button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('CUST - click here to request another') }}</button>.
							</form>
							<br />
							<br />
							{{ __('CUST - In case of problem, you can write to') }} <a href="mailto:contact@dozoapp.net">contact@dozoapp.net</a> 
						</div>
					</div>
				</div>
			</div>
		</div><!-- container -->
		
    </div><!-- app -->
	
	@include('inc-bottom-js')	
	
</body>
</html>
