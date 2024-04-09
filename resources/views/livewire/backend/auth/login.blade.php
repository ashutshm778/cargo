<div>
    <div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">

					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="{{ asset('backend/images/login-images/login-cover.svg')}}" class="img-fluid auth-img-cover-login" width="500" alt=""/>
							</div>
						</div>

					</div>

					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-3 text-center">
										<img src="{{ asset('backend/images/logo-icon.png')}}" width="60" alt="">
									</div>
									<div class="text-center mb-4">
										<h5 class="">Cargo Admin Panel </h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
										<form class="row g-3" wire:submit.prevent="login" action="#" >

											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email<span>*</span></label>
												<input type="email" wire:model="email" class="form-control" id="inputEmailAddress" placeholder="Enter Your Email" >
                                                @error('email')
                                                <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password<span>*</span></label>
												<div class="input-group" id="show_hide_password">
													<input type="password" wire:model="password" class="form-control border-end-0" id="inputChoosePassword"  placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                    @error('password')
                                                    <span style="display: block; width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" name="remember" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
</div>
