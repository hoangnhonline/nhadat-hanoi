<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en-US" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="en-US" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vi">
<!--<![endif]-->
<head>
	<title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="description" content="@yield('site_description')"/>
    <meta name="keywords" content="@yield('site_keywords')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <meta name="google-site-verification" content="" />
    <meta name="wot-verification" content="b5ae556432dab929c4bb"/>
    <meta property="article:author" content="https://www.facebook.com/"/>
    <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
    <link rel="canonical" href="{{ url()->current() }}"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('site_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('site_description')" />
    <meta name="twitter:title" content="@yield('title')" /> 
    <meta name="norton-safeweb-site-verification" content="-1t675c2tm6yc1iiisvmazxhwlu4chr547-91-psjr5jge1rf9ph4c2cwzyh5h0ua5w0ev8pbkf" />       
    <meta name="wot-verification" content="bcbd535ff2ff0c0067e0"/>
    <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
	<link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<!-- ===== Style CSS Common ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
	<!-- ===== Responsive CSS ===== -->
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ URL::asset('backend/dist/css/sweetalert2.min.css') }}">  
    
    <!-- HTML5 Shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link href='{{ URL::asset('assets/css/animations-ie-fix.css') }}' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
		<script src="https://oss.maxcdn.com/libs/respond.{{ URL::asset('assets/js/1.4.2/respond.min.js') }}"></script>
	<![endif]-->	
</head>
<body {{ \Request::route()->getName() == "home" ? 'class="page_home"' : "" }}>
	<header id="header" class="header">
	
		<div class="header-logo">
	        <div class="container">
	            <div class="logo">
	                <a href="{{ route('home') }}" title="Logo">
	                	<img src="{{ Helper::showImage($settingArr['logo']) }}" alt="Logo">	                   
	                </a>
	            </div>
	            <?php 
				$bannerArr = DB::table('banner')->where(['object_id' => 4, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
				?>	           
	            <div class="banner_adv" id="Banner_tet" style="display: block;">	
	            <?php $i = 0; ?>
				@foreach($bannerArr as $banner)
					<?php $i++; ?>
	                @if($banner->ads_url !='')
					<a href="{{ $banner->ads_url }}">
					@endif
	                    <img src="{{ Helper::showImage($banner->image_url) }}" alt="Banner top {{ $i }}"></a>

	                 @if($banner->ads_url !='')
					</a>
					@endif

	            @endforeach
	            </div>
	        </div>
	    </div>
	</header><!-- /header -->

	<nav id="mainNav" class="navbar navbar-default navbar-custom fix-header">
        <div class="container" id="main-menu">
        	<!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	              <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
	            </button>
			</div>

			@include('frontend.partials.home-menu')
        </div>
	</nav><!-- /navigation -->
	@if( \Request::route()->getName() == 'home')	
	<section class="container" style="margin-top:5px;">
	@include('frontend.home.slider')	
	</section>	
	@endif
	<section class="main" id="site-main">
		<section class="container">
			
			<section class="row">			

				@yield('content')

				@if(\Request::route()->getName() != "home" && (!isset($detailPage)))
				@include('frontend.partials.sidebar')
				@endif

				
			</section>
		</section>
	</section><!-- /main -->

	@include('frontend.home.footer')	
    <style type="text/css">
    	#du-an-list .owl-dots {
    		display: none !important;
    	}
    </style>   
 	<!-- /.block-call -->
	<a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
  		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</a>
	<!-- RETURN TO TOP -->

	<!-- ===== JS ===== -->
	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<!-- JS Bootstrap -->
	<script src="{{ URL::asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
	<!-- ===== JS Bxslider ===== -->
	<script src="{{ URL::asset('assets/vendor/bxslider/jquery.bxslider.min.js') }}"></script>
	<!-- ===== JS Bxslider ===== -->
	<script src="{{ URL::asset('assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
	<!-- JS Sticky -->
	<script src="{{ URL::asset('assets/vendor/sticky/jquery.sticky.js') }}"></script>
	<!-- ===== JS Bootstrap Select ===== -->
	<script src="{{ URL::asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
	<!-- Js Common -->
	<script src="{{ URL::asset('backend/dist/js/sweetalert2.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/common.js') }}"></script>		
	@yield('javascript_page')
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajaxSetup({
		        headers: {
		          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });		    
		    
		    $('.bxslider').bxSlider({
				pagerCustom: '#bx-pager',
				pager: true,
				auto: true,
				pause: 4000
			});
			$('#btnSearch').click(function(){		
				if($('#estate_type_id').val() == ''){
					swal({ title: '', text: 'Vui lòng chọn loại bất động sản.', type: 'error' });
					return false;
				}	
				var url = $('#estate_type_id').find(":selected").data('slug');
				
				if($('#project_id').val() > 0){
					url += '-' + $('#project_id').find(":selected").data('slug');
					location.href="{{ env('app.url') }}/" + url + '-5-' + $('#estate_type_id').val() + '-' + $('#project_id').val();
					return false;
				}
				if($('#street_id').val() > 0){
					url += '-' + $('#street_id').find(":selected").data('slug');
					location.href="{{ env('app.url') }}/" + url + '-4-' + $('#estate_type_id').val() + '-' + $('#street_id').val();
					return false;
				}
				if($('#ward_id').val() > 0){
					url += '-' + $('#ward_id').find(":selected").data('slug');
					location.href="{{ env('app.url') }}/" + url + '-3-' + $('#estate_type_id').val() + '-' + $('#ward_id').val();
					return false;
				}
				if($('#district_id').val() > 0){
					url += '-' + $('#district_id').find(":selected").data('slug');
					location.href="{{ env('app.url') }}/" + url + '-2-' + $('#estate_type_id').val() + '-' + $('#district_id').val();
					return false;
				}
				if($('#city_id').val() > 0){					
					url += '-' + $('#city_id').find(":selected").data('slug');
					location.href="{{ env('app.url') }}/" + url + '-1-' + $('#estate_type_id').val() + '-' + $('#city_id').val();
				}
			});
			$('#district_id').change(function(){
				var district_id = $(this).val();
				$.ajax({
					url : '{{ route('get-child') }}',
					data : {
						mod : 'ward',
						col : 'district_id',
						id : district_id
					},
					type : 'POST',
					dataType : 'html',
					success : function(data){
						$('#ward_id').html(data).selectpicker('refresh');
					}
				});

				$.ajax({
					url : '{{ route('get-child') }}',
					data : {
						mod : 'street',
						col : 'district_id',
						id : district_id
					},
					type : 'POST',
					dataType : 'html',
					success : function(data){
						$('#street_id').html(data).selectpicker('refresh');
					}
				});

				$.ajax({
					url : '{{ route('get-child') }}',
					data : {
						mod : 'project',
						col : 'district_id',
						id : district_id
					},
					type : 'POST',
					dataType : 'html',
					success : function(data){
						$('#project_id').html(data).selectpicker('refresh');
					}
				});
			});


			$('.block-box-search li a').click(function(){
				obj = $(this);
				var type = obj.data('type');
				$('#type').val(type);
				$('.block-box-search li').removeClass('active');
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
						@if(isset($estate_type_id) && $estate_type_id > 0)
						$('#estate_type_id').val({{ $estate_type_id }}).selectpicker('refresh');
						@endif
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
						@if(isset($price_id) && $price_id > 0)
						$('#price_id').val({{ $price_id }}).selectpicker('refresh');
						@endif
					}
				});
			});
			@if(isset($type) && $type >0)
				var type = {{ $type }};
				$('#type').val({{ $type }});
				$('.block-box-search li').removeClass('active');
				$('.block-box-search li a[data-type={{$type}}]').parents('li').addClass('active');

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
						@if(isset($estate_type_id) && $estate_type_id > 0)
						$('#estate_type_id').val({{ $estate_type_id }}).selectpicker('refresh');
						@endif
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
						@if(isset($price_id) && $price_id > 0)
						$('#price_id').val({{ $price_id }}).selectpicker('refresh');
						@endif
					}
				});
			@endif
		});
function getDistrict(city_id) {
    if(!city_id) {
      $('#district_id').empty();
      $('#district_id').append('<option value="0">Chọn Quận/Huyện</option>');
      return;
    }

    $.ajax({
      url: "{{ route('get-district') }}",
      method: "POST",
      data : {
        id: city_id
      },
      success : function(list_ward){          	
        $('#district_id').empty();
        $('#district_id').append('<option value="0">Chọn Quận/Huyện</option>');

        for(i in list_ward) {
          $('#district_id').append('<option data-slug="'+list_ward[i].slug +'"  value="'+list_ward[i].id+'">'+list_ward[i].name+'</option>');
        }
        $('.selectpicker').selectpicker('refresh');
      }
    });
  }   
	</script>
</body>
</html>
