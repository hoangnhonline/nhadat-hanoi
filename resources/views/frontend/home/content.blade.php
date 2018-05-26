@include('frontend.partials.meta')
@section('content')
<section class="col-sm-12 col-xs-12 block-sitemain">
    <article class="block block-news-new clearfix">
    <div class="col-sm-12 col-xs-12">      
        <div class="row">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#trmn11" aria-controls="trmn11" role="tab" data-toggle="tab">BĐS BÁN</a>
            </li>
            <li role="presentation">
              <a href="#trmn12" aria-controls="trmn12" role="tab" data-toggle="tab">BĐS CHO THUÊ</a>
            </li>
          </ul>
          
          <div class="block-contents">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="trmn11">
                <ul>                  
                  @foreach($hotProduct as $product)
                    <li class="news-new-item">                      
                      <div class="news-new-item-head">
                        <a  href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}"><img  title="{{ $product->title }}" src="{{ $product->image_urls ? Helper::showImageThumb($product->image_urls) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="{!! $product->title !!}" > 
                        
                        
                      </div>
                      <div class="news-new-item-description">
                        <h4>
                        <a class="description-title vip1" href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}">@if( $product->is_hot == 1 )
                        <img class="img-hot" src="{{ URL::asset('backend/dist/img/star.png')}}" alt="Nổi bật" title="Nổi bật" />
                        @endif {!! $product->title !!}</a></h4>
                            <div class="description-info">
                              <div class="id-post"><i class="fa fa-rebel" aria-hidden="true"></i><label>Mã tin<span>:</span></label>{{ $product->id }}</div>
                              <div class="price"><label>Giá<span>:</span></label>{!! $product->price !!} {{ Helper::getName($product->price_unit_id, 'price_unit')}}                                
                                @if($product->type == 1)
                                    @if($product->cart_status == 1)
                                      <span class="label label-primary">Chưa bán</span>
                                    @else
                                      <span class="label label-danger">Đã bán</span>
                                    @endif              
                                @else
                                    @if($product->cart_status == 1)
                                      <span class="label label-primary">Còn trống</span>
                                    @else
                                      <span class="label label-danger">Đã thuê</span>
                                    @endif
                                @endif

                              </div>
                                <div class="area"><label>Diện tích<span>:</span></label>{!! $product->area !!} m<sup>2</sup></div>
                                <div class="location"><label>Vị trí<span>:</span></label>{!! Helper::getName($product->district_id, 'district') !!} - {!! Helper::getName($product->city_id, 'city') !!}</div>
                            </div>
                            <span class="date">{{ date('d/m/Y', strtotime($product->updated_at)) }}</span>
                      </div>
                    </li> 
                    @endforeach   
                 
                </ul>                      
              </div><!-- /home -->
              <div role="tabpanel" class="tab-pane" id="trmn12">
                <ul>                  
                  @foreach($hotProduct2 as $product)
                    <li class="news-new-item">                      
                      <div class="news-new-item-head">
                        <a  href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}"><img  title="{{ $product->title }}" src="{{ $product->image_urls ? Helper::showImageThumb($product->image_urls) : URL::asset('backend/dist/img/no-image.jpg') }}" alt="{!! $product->title !!}" > 
                        
                        
                      </div>
                      <div class="news-new-item-description">
                        <h4>
                        <a class="description-title vip1" href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}">@if( $product->is_hot == 1 )
                        <img class="img-hot" src="{{ URL::asset('backend/dist/img/star.png')}}" alt="Nổi bật" title="Nổi bật" />
                        @endif {!! $product->title !!}</a></h4>
                            <div class="description-info">
                              <div class="id-post"><i class="fa fa-rebel" aria-hidden="true"></i><label>Mã tin<span>:</span></label>{{ $product->id }}</div>
                              <div class="price"><label>Giá<span>:</span></label>{!! $product->price !!} {{ Helper::getName($product->price_unit_id, 'price_unit')}}                                
                                @if($product->type == 1)
                                    @if($product->cart_status == 1)
                                      <span class="label label-primary">Chưa bán</span>
                                    @else
                                      <span class="label label-danger">Đã bán</span>
                                    @endif              
                                @else
                                    @if($product->cart_status == 1)
                                      <span class="label label-primary">Còn trống</span>
                                    @else
                                      <span class="label label-danger">Đã thuê</span>
                                    @endif
                                @endif

                              </div>
                                <div class="area"><label>Diện tích<span>:</span></label>{!! $product->area !!} m<sup>2</sup></div>
                                <div class="location"><label>Vị trí<span>:</span></label>{!! Helper::getName($product->district_id, 'district') !!} - {!! Helper::getName($product->city_id, 'city') !!}</div>
                            </div>
                            <span class="date">{{ date('d/m/Y', strtotime($product->updated_at)) }}</span>
                      </div>
                    </li> 
                    @endforeach   
                 
                </ul>                      
              </div><!-- /home -->
            </div>
          </div>
        </div>
    </div>
  </article><!-- /block-news-new -->
</section>
<section style="margin-bottom: 10px !important;">
<article class="block block-fengshui block-news-new">
 
    <div class="col-sm-6 col-xs-12" style="padding: 5px">
     
        
          <div class="block-title block-title-common">
            <h3><span class="icon-tile2"><img src="{{ URL::asset('assets/images/icon-living.png') }}" alt="Tin tức"> Tin tức</h3>
          </div>
          <div class="block-contents">

            <div class="news-fengshui clearfix">
             @if(isset($khonggiansong[0]))
              <div class="fengshui-news-hot">
                      <a href="{{ route('news-detail', ['slug' => $khonggiansong[0]['slug'], 'id' => $khonggiansong[0]['id']]) }}" title="">
                  <img src="{{ $khonggiansong[0]['image_url'] ? Helper::showImageThumb($khonggiansong[0]['image_url'], 2, '325x200') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="{!! $khonggiansong[0]['title'] !!}">
                </a>    
                      
                      <h4><a href="{{ route('news-detail', ['slug' => $khonggiansong[0]['slug'], 'id' => $khonggiansong[0]['id']]) }}" title="{!! $khonggiansong[0]['title'] !!}" >{!! $khonggiansong[0]['title'] !!}</a></h4>
                  </div>
                  @endif
                  <div class="fengshui-news-list">
                    <ul>
                       <?php $i =0; ?>
                        @foreach($khonggiansong as $tin)
                        <?php $i++; 
                        ?>
                        @if($i > 1)
                        <li><a href="{{ route('news-detail', ['slug' => $tin['slug'], 'id' => $tin['id']]) }}" title="{!! $tin['title'] !!}">{!! $tin['title'] !!}</a></li>
                        @endif
                        @endforeach
                    </ul>
                  </div>
            </div>
          </div>
   

    </div>
  
  
    <div class="col-sm-6 col-xs-12" style="padding: 5px">
      
      <div class="block-title block-title-common">
        <h3><span class="icon-tile2"><img src="{{ URL::asset('assets/images/icon-tkkt.png') }}" alt="Tư vấn thiết kế"> Văn bản</h3>
      </div>
      <div class="block-contents">

        <div class="news-fengshui clearfix">
         @if(isset($luat[0]))
          <div class="fengshui-news-hot">
                  <a href="{{ route('news-detail', ['slug' => $luat[0]['slug'], 'id' => $luat[0]['id']]) }}" title="{!! $luat[0]['title'] !!}">
              <img src="{{ $luat[0]['image_url'] ? Helper::showImageThumb($luat[0]['image_url'], 2, '325x200') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="{!! $luat[0]['title'] !!}">
            </a>    
                  
                  <h4><a href="{{ route('news-detail', ['slug' => $luat[0]['slug'], 'id' => $luat[0]['id']]) }}" title="{!! $luat[0]['title'] !!}">{!! $luat[0]['title'] !!}</a></h4>
              </div>
              @endif
              <div class="fengshui-news-list">
                <ul>
                   <?php $i =0; ?>
                    @foreach($luat as $tin)
                    <?php $i++; 
                    ?>
                    @if($i > 1)
                    <li><a href="{{ route('news-detail', ['slug' => $tin['slug'], 'id' => $tin['id']]) }}" title="{!! $tin['title'] !!}">{!! $tin['title'] !!}</a></li>
                    @endif
                    @endforeach
                </ul>
              </div>
        </div>
      </div>
 
    </div>

</article><!-- /block-inews -->
<?php 
$bannerArr = DB::table('banner')->where(['object_id' => 3, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>             
<article class="block block-adv-full">
<?php $i = 0; ?>
@foreach($bannerArr as $banner)
<?php $i++; ?>
    @if($banner->ads_url !='')
<a href="{{ $banner->ads_url }}">
@endif
        <img src="{{ Helper::showImage($banner->image_url) }}" alt="Banner tuyển dụng {{ $i }}" style="width:100%"></a>

     @if($banner->ads_url !='')
</a>
@endif

@endforeach
  </article>
</section>
@endsection