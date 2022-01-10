@extends('layouts.viewer_layout')
@section('viewer_content')

<style>
	#nav_contactus{
  background-color: #2f589e;
}
</style>

<link rel="stylesheet" href="\css\contactstylemain.css">
<div class="container d-flex justify-content-center align-items-center mt-5">
	
	<!-- // SVG
					from: https://www.freepik.com/free-vector/new-message-concept-landing-page_5777076.htm 
  -------------------------------------------------------------
  -- Note: need to use inline svg to manipulate its components
  ------------------------------------------------------------>

  <div class="img">
   <!-- <img src="\img\logoAcademy.png" alt="alt" class="contact-img">-->
</div>
<form action="{{ route('contact.send') }}" method="POST">
      @csrf
	@if (Session::get('success'))
      <div class="alert alert-success mt-3" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif
		<h1 class="title text-center mb-4" style="color:#2f589e;font-weight:bold;">Contact Us</h1>
	  
		<div class="container ">
			<!-- Name -->
			<div class="text-danger text-left color-red">All fields are required</div>
			<div class="form-group position-relative">
				<label for="formName" class="d-block">
				</label>
				<input type="text" id="formName" name="name" class="form-control form-control-lg thick @error('name') is-invalid @enderror" placeholder="Name" >
				@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>

			<!-- E-mail -->
			<div class="form-group position-relative">
				<label for="formEmail" class="d-block">
				</label>
				<input type="email" id="formEmail" name="email" class="form-control form-control-lg thick @error('email') is-invalid @enderror" placeholder="E-mail" >
				@error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>
			<div class="form-group position-relative">
				<label for="ForSubject" class="d-block">
				</label>
				<input type="text" id="ForSubject" name="subject" class="form-control form-control-lg thick @error('subject') is-invalid @enderror" placeholder="Subject" >
				@error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>
			<!-- Message -->
			<div class="form-group message">
				
				<textarea id="formMessage" name="message" class="form-control form-control-lg @error('message') is-invalid @enderror" cols="30" rows="4" placeholder="Message" style="display:block;" ></textarea>
				
				<div class="text-muted text-right">Max Characters 255</div>
				
				@error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
			</div>
		
			<!-- Submit btn -->
			<div class="text-center">
				<button type="submit" class="btn btn-primary send_btn" tabIndex="-1">Send message</button>
			</div>
		</div>
	</form>
	
</div>
@endsection