<section id="contactpage" class="section-padding">
        <div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="section-title">
						<h5>response with in minute</h5>
						<h3>Contact <span>Mazoneinvest</span></h3>
					</div>
				</div>
			</div>
			<!-- end section title -->
			<div class="row text-center">
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="far fa-envelope-open"></i>
						</div>
						<div class="single-address-dec">
							<h4>Write a mail</h4>
							<p>Email: exec@mazoneinvest.co</p>
							<p>Email: admin@mazoneinvest.com</p>
						</div>
						<div class="single-address-link">
							<a href="#">quick Send</a>
						</div>
					</div>
				</div>
				<!-- end col -->
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="icofont icofont-phone-circle"></i>
						</div>
						<div class="single-address-dec">
							<h4>Give us a call</h4>
							<p>Phone: +44 7418363838</p>
						</div>
						<div class="single-address-link">
							<a href="#">quick call</a>
						</div>
					</div>
				</div>
				<!-- end col -->
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="far fa-address-card"></i>
						</div>
						<div class="single-address-dec">
							<h4>Visit our location</h4>
							<p>3 Seymour St, Chorley PR6 ORR, United Kingdom</p>
						</div>
						<div class="single-address-link">
							<a href="#">find Direction</a>
						</div>
					</div>
				</div>
				<!-- end col -->
				<div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-5">
					<div class="single-address">
						<div class="single-address-icon">
							<i class="fab fa-rocketchat"></i>
						</div>
						<div class="single-address-dec">
							<h4>Lets's have a chat</h4>
                            <p>Whatsapp: +44 7418363838</p>
							<p>Telegram: https://t.me/mazoneinvestadmin </p>
						</div>
						<div class="single-address-link">
							<a href="#">click here</a>
						</div>
					</div>
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->

			<div class="row">
				<div class="col-12 text-center">
					<div class="section-title-2">
						<h3>Send Us Message</h3>
					</div>
				</div>
				<div class="col-lg-7 mx-auto">
					<div class="contact-form-wrapper">
						<div class="contact-form">
							<form id="contact-form" class="form" name="enq" method="POST" action="{{route('contact.store')}}">
								@include('partials._message')
								@csrf
								<div class="row">
									<div class="form-group col-12 mb-3">
										<label>First Name:</label>
										<input name="name" class="form-control" id="cname" required="required" type="text">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Your Email:</label>
										<input name="email" class="form-control" id="cemail" required="required" type="email">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Phone Number:</label>
										<input name="phone" class="form-control" id="cnumber" required="required" type="text">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Subject:</label>
										<input name="subject" class="form-control" id="csubject" required="required" type="text">
									</div>
									<div class="form-group col-12 mb-3">
										<label>Message:</label>
										<textarea rows="6" name="message" class="form-control" id="cmessage" placeholder="Your Message Here..." required="required"></textarea>
									</div>
									<div class="form-group col-lg-12 mb-0 text-center">
										<div class="actions">
											<input value="Submit Message" name="submit" id="submitButton" class="btn btn-contact-bg" title="Click here to submit your message!" type="submit">
											<img src="assets/img/ajax-loader.gif" id="loader" style="display:none" alt="loading" width="16" height="16">
										</div>
									</div>
								</div>
							</form>								
						</div>
					</div>
				</div>
			</div>
			<!-- end row -->
        </div>
        <!--- END CONTAINER -->
    </section>
