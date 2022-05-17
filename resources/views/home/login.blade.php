@extends('layouts.home')

@section('content')
<section class="page-banner text-center relative">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<h1 class="page-title">Login</h1>
							<ul class="breadcum">
								<li><a href="index.html">Home</a></li>
								<li>Login</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<section class="login bluish-purple relative overflow-h ptb-100">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="user-table">
								<div class="section-heading text-center">
									<h2 class="title">Customer Login</h2>
								</div>
								<form class="login-form"  method='POST' >
                                 @csrf
									<div class="form-group">
										<label class="form-label">Email address</label>
										<input name="email" type="text" class="form-control" placeholder="Email Address" required="">
									</div>
									<div class="form-group">
										<label class="form-label">Password</label>
										<input name='password' type="password" class="form-control" placeholder="Enter your Password" required="">
									</div>
									<div class="login-btn-g">
										<div class="row">
											<div class="col-7 d-flex flex-center">
												<div class="check-box">
													<span>
										                <input type="checkbox" class="checkbox" id="account" name="Create an Account?">
										                <label for="account">Remember Me</label>
										            </span>
									            </div>
									        </div>
									        <div class="col-5 d-flex flex-center justify-right">
									            <button name="submit" type="submit" class="button">Log In</button>
									        </div>
									    </div>
							        </div>
							        <div class="text-center">
							        	<a title="Forgot Password" class="link forgot-password mtb-20" href="#">Forgot your password?</a>
							        </div>
							        <div class="new-account text-center mt-20"> 
							        	<span>Don't have an account?</span> 	
						                <a class="link" title="Create New Account" href="{{route('registro')}}">Creat una cuenta</a> 
						            </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>






            
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
