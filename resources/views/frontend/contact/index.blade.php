@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<section class="col-sm-8 col-xs-12 block-sitemain">
<article class="block-breadcrumb-page">
    <ul class="breadcrumb"> 
        <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>        
        <li class="active">Liên hệ</li>
    </ul>
</article>
    <article class="block block-news-new block-news-cate clearfix">
        <div class="col-sm-12"> 
                                
                    <div class="content">
                        <h4>CTY CP ĐẦU TƯ VÀ THƯƠNG MẠI BĐS IPO VIỆT NAM</h4>                        
                        <p>Hotline: <span class="tel">0964 26 26 25</span></p>                        
                        <p>Email: <a href="mailto:luongsb108@gmail.com">luongsb108@gmail.com</a></p>
                    </div>
                    @if(Session::has('message'))
                    <p class="alert alert-info" >{{ Session::get('message') }}</p>
                    @endif
                    <form method="POST" action="{{ route('send-contact') }}">
                     @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>                           
                            <li>Vui lòng nhập đầy đủ thông tin.</li>                            
                        </ul>
                      </div>
                    @endif  
                    <div class="contact-form-box">
                        <div class="form-selector" style="padding-right:0px;height:45px">                            
                            <input type="text" placeholder="Họ và tên" class="form-control input-sm" id="full_name" name="full_name"  value="{{ old('full_name') }}" style="height:35px" />
                        </div>
                        <div class="form-selector col-md-4" style="padding-left:0px;height:45px">                            
                            <input type="text" placeholder="Số điện thoại" class="form-control input-sm" id="phone" name="phone" value="{{ old('phone') }}" style="height:35px"/>
                        </div>   
                        <div class="form-selector col-md-8" style="padding-right:0px;height:45px">                           
                            <input type="email" placeholder="Email của bạn" class="form-control input-sm" id="email" name="email" value="{{ old('email') }}" style="height:35px"/>
                        </div>
                        <div class="form-selector" style="margin-bottom:10px">                            
                            <textarea style="font-size:14px" class="form-control input-sm" rows="8" id="content" name="content" placeholder="Nhập nội dung bạn muốn liên hệ hoặc góp ý">{{ old('content') }}</textarea>

                        </div>
                        <input type="hidden" name="type" value="1">                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        
                        <div class="form-selector">
                            <button type="submit" id="btn-send-contact" class="btn">GỬI LIÊN HỆ</button>
                        </div>
                    </div>
                    </form>
                </div>
    </article><!-- /block-news-new -->
</section><!-- /block-site-left -->
@endsection