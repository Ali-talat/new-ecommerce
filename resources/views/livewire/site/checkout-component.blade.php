

    <main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>checkout{{Cart::subtotal();}}</span></li>
				</ul>
			</div>
			<form wire:submit.prevent="checkout">
				@csrf
				<div class=" main-content-area">
					<div class="wrap-address-billing">
						<h3 class="box-title" >Billing Address</h3>
						<div>
							<p class="row-in-form">
								<label for="firstname">first name<span>*</span></label>
								<input  type="text" name="firstname" value="" placeholder="Your name" wire:model="firstname">
								@error('firstname')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form">
								<label for="lastname">last name<span>*</span></label>
								<input  type="text" name="lastname" value="" placeholder="Your last name" wire:model="lastname">
								@error('lastname')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form">
								<label for="email">Email Addreess:</label>
								<input  type="email" name="email" value="" placeholder="Type your email" wire:model="email">
								@error('email')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form">
								<label for="phone">Phone number<span>*</span></label>
								<input  type="number" name="phone" value="" placeholder="10 digits format" wire:model="phone">
								@error('phone')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form">
								<label for="address">Address:</label>
								<input  type="text" name="address" value="" placeholder="Street at apartment number" wire:model="address">
								@error('address')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form">
								<label for="country">Country<span>*</span></label>
								<input  type="text" name="country" value="" placeholder="United States" wire:model="country">
								@error('country')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form">
								<label for="zipcode">Postcode / ZIP:</label>
								<input  type="text" name="zipcode" value="" placeholder="Your postal code" wire:model="zipcode">
								@error('zipcode')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form">
								<label for="city">Town / City<span>*</span></label>
								<input  type="text" name="city" value="" placeholder="City name" wire:model="city">
								@error('city')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</p>
							<p class="row-in-form fill-wife">
								
								<label class="checkbox-field">
									<input name="ship_to_deffrint" value="1" type="checkbox" wire:model="ship_to_deffrint">
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
									<label for="firstname">first name<span>*</span></label>
									<input wire:model="s_firstname" type="text" name="s_firstname" value="" placeholder="Your name">
									@error('s_firstname')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="lastname">last name<span>*</span></label>
									<input wire:model="s_lastname" type="text" name="s_lastname" value="" placeholder="Your last name">
									@error('s_lastname')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="email">Email Addreess:</label>
									<input wire:model="s_email" type="email" name="s_email" value="" placeholder="Type your email">
									@error('s_email')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Phone number<span>*</span></label>
									<input wire:model="s_phone" type="number" name="s_phone" value="" placeholder="10 digits format">
									@error('s_phone')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="address">Address:</label>
									<input wire:model="s_address" type="text" name="s_address" value="" placeholder="Street at apartment number">
									@error('s_address')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="country">Country<span>*</span></label>
									<input wire:model="s_country" type="text" name="s_country" value="" placeholder="United States">
									@error('s_country')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="zip_code">Postcode / ZIP:</label>
									<input wire:model="s_zipcode" type="number" name="s_zipcode" value="" placeholder="Your postal code">
									@error('city')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="city">Town / City<span>*</span></label>
									<input wire:model="s_city" type="text" name="s_city" value="" placeholder="City name">
									@error('city')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form fill-wife">
									
									
								</p>
							</div>
						</div>
					@endif
					<div class="summary summary-checkout">
						<div class="summary-item payment-method">
							<h4 class="title-box">Payment Method</h4>
							@if ($paymentmode == 'card')
								
							<div class="wrap-address-billing">
								<p class="row-in-form">
									<label for="cart_no">Cart Number<span>*</span></label>
									<input wire:model="cart_no" type="text" name="cart_no" value="" placeholder="Cart Number">
									@error('cart_no')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="exp_month">expiry month<span>*</span></label>
									<input wire:model="exp_month" type="text" name="exp_month" value="" placeholder="MM">
									@error('exp_month')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="city">expiry year<span>*</span></label>
									<input wire:model="exp_year" type="text" name="exp_year" value="" placeholder="YYYY">
									@error('exp_year')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
								<p class="row-in-form">
									<label for="cvc">CVC<span>*</span></label>
									<input wire:model="cvc" type="text" name="cvc" value="" placeholder="Cart Number">
									@error('cvc')
								<span class="text-danger">{{$message}}</span>
								@enderror
								</p>
							</div>
							@endif
							<div class="choose-payment-methods">
								<label class="payment-method">
									<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
									<span>Cash on Delivery</span>
									<span class="payment-desc">order now pay on Delivery</span>
									
								</label>
								@error('paymentmode')
									<span class="text-danger">{{$message}}</span>
								@enderror
								<label class="payment-method">
									<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
									<span>Dedit credit cart</span>
									<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
									<span>Paypal</span>
									<span class="payment-desc">You can pay with your credit</span>
									<span class="payment-desc">card if you don't have a paypal account</span>
								</label>
							</div>
							<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Cart::subtotal()}}</span></p>
							<button type="submit" class="btn btn-medium">Place order now</button>
						</div>
						<div class="summary-item shipping-method">
							<h4 class="title-box f-title">Shipping method</h4>
							<p class="summary-info"><span class="title">Flat Rate</span></p>
							<p class="summary-info"><span class="title">Fixed $0</span></p>
							
						</div>
					</div>

					

				</div><!--end main content area-->
			</form>
		</div><!--end container-->

	</main>
