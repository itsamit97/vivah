@extends('layout.web_master')
@section('content')



<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Contact</li>
     </ul>
   </div>
   <div class="grid_5">
      <p>Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient. montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
      <address class="addr row">
        <dl class="grid_4">
            <dt>Address :</dt>
            <dd>
                8901 Nulla Pariatur, <br>
                Ipsum, D05 87GR.
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>Telephones :</dt>
            <dd>
                +1 800 245 4578 <br>
                +1 800 789 5478
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>E-mail :</dt>
            <dd><a href="malito:mail@demolink.org">mail(at)Marital.com</a></dd>
        </dl>
      </address>
    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
	<h2>Contact Form</h2>
    @if($errors->any())
     <h4>{{$errors->first()}}</h4>
    @endif

    @if (count($errors) > 0)
       <div class = "alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
             @endforeach
          </ul>
       </div>
    @endif
	  <form action="{{route('contact_create')}}" method="post" id="contact-form" class="contact-form">
        {{csrf_field()}}
        <fieldset>
          <input type="text" class="text" name="first_name"  placeholder="First Name"  required="">

         <input type="text" class="text" name="last_name"  placeholder="Last Name" required="">

        <!--   <input type="text" class="text" name="mobile_no" placeholder="" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"> -->

          <input type="text" class="text" name="email" placeholder="Email"  required="">

          <textarea   name="message" placeholder="Message" required=""></textarea>
          <input name="submit" type="submit" id="submit" value="Submit">
        </fieldset>
      </form>
  </div>
</div>















@stop