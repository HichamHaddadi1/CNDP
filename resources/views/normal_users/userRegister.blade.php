@extends('layouts.viewer_layout')
@section('viewer_content')
   
    <!-- Google Font: Source Sans Pro -->
    <!-- Font Awesome Icons -->
    <!-- Theme style -->
    <style>
        body {
                background: #ffffff;
            }
        .h2_stream{
            font-weight: bold;
            color:#2f589e;
        }
    </style>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
  <div class="container">
      <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
          @csrf
          <h2 class="text-center h2_stream">Join a Seminar</h2>
      <div class="row jumbotron shadow-lg">
          <div class="col-sm-6 form-group">
              <label for="name-f">First Name</label>
              <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" id="fname" placeholder="Enter your first name." >
              @error('fname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="name-l">Last name</label>
              <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" id="lname" placeholder="Enter your last name." >
              @error('lname')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="name-l">Username</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please choose a username." >
              @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email." >
              @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="address-1">Address Line-1</label>
              <input type="address" class="form-control" name="address" id="address" placeholder="Locality/House/Street no." >
              @error('address')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          </div>
          <div class="col-sm-6 form-group">
              <label for="gender">Gender</label>
              <select id="gender" name="gender" id="gender" class="form-control browser-default custom-select @error('gender') is-invalid @enderror">
              <option value="male">Male</option>
              <option value="female">Female</option>
          </select>
          @error('gender')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>
         
          <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" id="pass" placeholder="Enter your password." >
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="col-sm-6 form-group">
                <label for="pass2">Confirm Password</label>
                <input type="Password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="pass2" placeholder="Re-enter your password." >
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        
            <div class="col-sm-6 form-group">
                <label for="avatar">Avatar</label>
   
                <input type="file" name="image" id="file" class="form-control @error('image') is-invalid @enderror" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        
          
          <div class="col-sm-12">
            <p style="color:#5B9BD5;font-style: italic;font-weight: bold">Conformément à la loi 09-08, vous disposez d’un droit d’accès, de rectification et d’opposition au traitement de vos données personnelles. Ce traitement a été notifié auprès de la CNDP via la déclaration n° D-CEX-764/2021 du 15/11/2021</p>
         </div>
         <div class="col-sm-12">
            <input type="checkbox" class="form-check d-inline @error('check') is-invalid @enderror" id="checkbox" name="check"><label for="chb" class="form-check-label" required>&nbsp; I accept all <a href="" data-toggle="modal" data-target="#exampleModalLong">Terms and Conditions<a>.
            </label>
            @error('check')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
          <div class="col-sm-12 form-group mb-0">
             <button class="btn btn-primary float-right">Submit</button>
          </div>
          
      </div>
      </form>
  </div>


  <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Terms & Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p style="color:#5B9BD5;font-style: italic;font-weight: bold;text-align: justify">
            Les informations recueillies font l’objet d’un traitement destiné à <strong style="color:#444444">la gestion des événements</strong> de la CNDP-CDAI.

            Conformément à la loi n° 09-08 promulguée par le Dahir 1-09-15 du 18 février 2009, relative à la protection des personnes physiques à l’égard du traitement des données à caractère personnel, vous bénéficiez d’un droit d’accès et de rectification aux informations qui vous concernent, que vous pouvez exercer en vous adressant à mesdroits@cndp.ma
            
            Vous pouvez également, pour des motifs légitimes, vous opposer à ce que les données qui vous concernent fassent l’objet d’un traitement. Ce traitement a été notifié auprès de la CNDP via la déclaration n° D-CEX-764/2021 du 15/11/2021
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
@endsection