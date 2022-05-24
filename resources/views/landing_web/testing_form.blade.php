
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  


<link href="{{asset('time_picker_asset/mdtimepicker.css')}}" rel="stylesheet">


</head>
    
<body>



<input type="text" id="timepicker"/>


<!-- <link href="{{asset('web_assets/css/bootstrap-3.1.1.min.css')}}" rel='stylesheet' type='text/css' />
 -->






  <!-- <script src="{{asset('time_picker_asset/mdtimepicker.min.js')}}"></script> -->

  


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="{{asset('time_picker_asset/mdtimepicker.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#timepicker').mdtimepicker({
          // format of the time value (data-time attribute)
          timeFormat: 'hh:mm:ss.000', 

          // format of the input value
          format: 'h:mm tt',      

          // theme of the timepicker
          // 'red', 'purple', 'indigo', 'teal', 'green', 'dark'
          theme: 'blue',        

          // determines if input is readonly
          readOnly: true,       

          // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
          hourPadding: false,

          // determines if clear button is visible  
          clearBtn: false
        }); 
    });

</script>
 

</body>
</html>





<!-- <script>
  $(document).ready(function(){
    $('#timepicker').mdtimepicker(); //Initializes the time picker
  });
</script> -->