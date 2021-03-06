<div class="sticky-menu">
			<div class="mainmenu-area">
				<div class="auto-container">
					<div class="row">
						<div class="col-lg-9 d-none d-lg-block d-md-none">
							<nav class="navbar navbar-expand-lg justify-content-left">
								<ul class="navbar-nav">
								   <li class="dropdown"><a href="/" class="active nav-link">Home</a></li>
									<li class="dropdown"><a class="nav-link">Pages</a>
										<ul class="dropdown-menu">
											<li><a href="/about">About Us</a></li>
											<li><a href="/team">Our Team</a></li>
											<li><a href="/contact">Contact Us</a></li>
											<li><a href="/blog">Blog</a></li>
											<!-- <li><a href="single-team.html">Team Single</a></li> -->
											<!-- <li><a href="gallery.html">Gallery</a></li> -->
											<!-- <li><a href="pricing.html">Our Pricing</a></li> -->
											<li><a href="/faq">FAQ</a></li>
											<!-- <li><a href="error.html">404</a></li> -->
										</ul>
									</li>
									<li class="dropdown"><a href="" class="nav-link">My Profile</a>
										<ul class="dropdown-menu">
											<li><a href="{{route('settings.index')}}">Settings</a></li>
											<li><a href="">Fund Wallet</a></li>
											<li><a href="{{route('withdraw')}}">Withdraw</a></li>
											@if(Auth::check())
												@if(Auth::user()->access == 'admin')
												<li><a href="/panel">Panel</a></li>
												@endif
											@endif
											<!-- <li><a href="single-service.html">Invest</a></li> -->
											<!-- <li><a href="single-service.html">Cryptocurrency</a></li> -->
										</ul>
									</li>
									<li><a href="contact.html" class="nav-link">Contact</a></li>
								</ul>
							</nav>
						</div>
						<div class="col-lg-3 d-none d-lg-block d-md-none text-right pr-0">
							<form class="navbar-form">
								<div class="form-group">
									<input class="form-control" name="search" value="Search here..." type="text">
									<button type="submit" class="btn"><i class="fa fa-search-plus"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>