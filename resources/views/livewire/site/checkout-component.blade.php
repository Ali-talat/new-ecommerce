

    <main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>checkout{{Cart::subtotal();}}</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-address-billing">
					<h3 class="box-title" >Billing Address</h3>
					<div>
						<p class="row-in-form">
							<label for="fname">first name<span>*</span></label>
							<input type="text" name="fname" value="" placeholder="Your name">
						</p>
						<p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input type="text" name="lname" value="" placeholder="Your last name">
						</p>
						<p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input type="email" name="email" value="" placeholder="Type your email">
						</p>
						<p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input type="number" name="phone" value="" placeholder="10 digits format">
						</p>
						<p class="row-in-form">
							<label for="add">Address:</label>
							<input type="text" name="add" value="" placeholder="Street at apartment number">
						</p>
						<p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input type="text" name="country" value="" placeholder="United States">
						</p>
						<p class="row-in-form">
							<label for="zip-code">Postcode / ZIP:</label>
							<input type="number" name="zip-code" value="" placeholder="Your postal code">
						</p>
						<p class="row-in-form">
							<label for="city">Town / City<span>*</span></label>
							<input type="text" name="city" value="" placeholder="City name">
						</p>
						<p class="row-in-form fill-wife">
							
							<label class="checkbox-field">
								<input name="different-add" value="1" type="checkbox" wire:model="ship_to_deffrint">
								<span>Ship to a different address?</span>
							</label>
						</p>
					</div>
				</div>
				@if ($ship_to_deffrint)
					
					<div class="wrap-address-billing">
						<h3 class="box-title">Shipping Address</h3>
						<div>
							<p class="row-in-form">
								<label for="fname">first name<span>*</span></label>
								<input type="text" name="fname" value="" placeholder="Your name">
							</p>
							<p class="row-in-form">
								<label for="lname">last name<span>*</span></label>
								<input type="text" name="lname" value="" placeholder="Your last name">
							</p>
							<p class="row-in-form">
								<label for="email">Email Addreess:</label>
								<input type="email" name="email" value="" placeholder="Type your email">
							</p>
							<p class="row-in-form">
								<label for="phone">Phone number<span>*</span></label>
								<input type="number" name="phone" value="" placeholder="10 digits format">
							</p>
							<p class="row-in-form">
								<label for="add">Address:</label>
								<input type="text" name="add" value="" placeholder="Street at apartment number">
							</p>
							<p class="row-in-form">
								<label for="country">Country<span>*</span></label>
								<input type="text" name="country" value="" placeholder="United States">
							</p>
							<p class="row-in-form">
								<label for="zip-code">Postcode / ZIP:</label>
								<input type="number" name="zip-code" value="" placeholder="Your postal code">
							</p>
							<p class="row-in-form">
								<label for="city">Town / City<span>*</span></label>
								<input type="text" name="city" value="" placeholder="City name">
							</p>
							<p class="row-in-form fill-wife">
								
								
							</p>
						</div>
					</div>
				@endif
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="cod" type="radio">
								<span>Cash on Delivery</span>
								<span class="payment-desc">order now pay on Delivery</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="card" type="radio">
								<span>Dedit credit cart</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
						</div>
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Cart::subtotal()}}</span></p>
						<a href="thankyou.html" class="btn btn-medium">Place order now</a>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $0</span></p>
						
					</div>
				</div>

				

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
