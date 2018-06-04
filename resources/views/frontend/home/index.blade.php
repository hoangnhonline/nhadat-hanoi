@extends('frontend.layout')
  
@include('frontend.home.search')
@include('frontend.home.content')

@section('javascript_page')
<script type="text/javascript">
  $(document).ready(function(){
    $('#city_id').change(function(){
      obj = $(this);
      
      $.ajax({
        url : '{{ route('get-child') }}',
        data : {
          mod : 'district',
          col : 'city_id',
          id : obj.val()
        },
        type : 'POST',
        dataType : 'html',
        success : function(data){
          $('#district_id').html(data).selectpicker('refresh');         
        }
      });
    });
    
    $('#tab-search li a').click(function(){
      obj = $(this);
      var type = obj.data('type');
      $('#type').val(type);
      $('#tab-search li').removeClass('active');
      obj.parents('li').addClass('active');

      $.ajax({
        url : '{{ route('get-child') }}',
        data : {
          mod : 'estate_type',
          col : 'type',
          id : type
        },
        type : 'POST',
        dataType : 'html',
        success : function(data){
          $('#estate_type_id').html(data).selectpicker('refresh');
        }
      });
      $.ajax({
        url : '{{ route('get-child') }}',
        data : {
          mod : 'price',
          col : 'type',
          id : type
        },
        type : 'POST',
        dataType : 'html',
        success : function(data){
          $('#price_id').html(data).selectpicker('refresh');
        }
      });
    });
  });

</script>
@endsection