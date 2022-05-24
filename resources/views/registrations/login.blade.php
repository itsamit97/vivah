
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

  <link href="{{asset('web_assets/css/style_login.css')}}" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
    
<body style="background-color:'red'">
  <div class="wrapper">
    <!--     @if($errors->any())
        <center><label  class="text-primary">{{$errors->first()}}</label></center>
        @endif
 -->
         @if (count($errors) > 0)
           <div class = "alert alert-primary">
              <ul>
                 @foreach ($errors->all() as $error)
                    <li class="text -center text-blue">{{ $error }}</li>
                 @endforeach
              </ul>
           </div>
          @endif
   	  <div class="logo"> <img src="{{asset('web_assets/images/bc_images/login1.jpg')}}" alt=""> </div>
      <div class="text-center mt-4 name text-primary"> 1Vivah</div>
      <form action="{{route('login')}}" method="post" class="p-3 mt-3">
        {{csrf_field()}}
          <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="email" id="email" placeholder="Email"> </div>
          <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="text" name="password" id="password" placeholder="Password"> </div> 
          <button type="submit" name="submit" class="btn mt-3">Login</button>
      </form>
      <div class="text-center fs-6"> <a href="{{route('registration')}}">Bride & Groom?</a> or <a href="#">ServiceProvider</a> </div>
  </div>
</body>
</html>






