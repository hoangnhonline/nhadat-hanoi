@include('frontend.partials.meta')
@section('content')
<section class="block-search">
  <div class="container">
    <div class="block-title block-tab-customize">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist" id="tab-search">
        <li role="presentation" class="active"><a href="javascript:void(0)" data-type="2" >BẤT ĐỘNG SẢN CHO THUÊ</a></li>
        <li role="presentation" ><a href="javascript:void(0)" data-type="1" >BẤT ĐỘNG SẢN BÁN</a></li>
        
      </ul>
    </div>
    <div class="block-contents">
      <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
            <form action="{{ route('search') }}" method="GET" accept-charset="utf-8" class="search-content-input selectpicker-cus">
              <input type="hidden" id="type" value="2" name="type">             
              <div class="row-select">
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" data-live-search="true" name="estate_type_id" id="estate_type_id">
                    <option selected="selected" value="">Loại bất động sản</option>
                    @foreach($thueList as $ban)
                    <option data-slug="{{ $ban->slug }}" value="{{ $ban->id }}">{!! $ban->name !!}</option>
                    @endforeach
                  </select>
                </div>
              </div>  
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" data-live-search="true" id="city_id" name="city_id">
                    <option value="">Tỉnh/TP</option>
                    @foreach($cityList as $city)
                    <option data-slug="{{ $city->alias }}" value="{{ $city->id }}">{!! $city->name !!}</option>
                    @endforeach
                  </select>
                </div>
              </div>                
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" data-live-search="true" id="district_id" name="district_id">
                    <option value="">Quận/Huyện</option>
                    @foreach($districtList as $district)
                    <option data-slug="{{ $district->slug }}" value="{{ $district->id }}">{!! $district->name !!}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" data-live-search="true" id="ward_id" name="ward_id">
                    <option value="">Phường/Xã</option>
                    
                  
                  </select>
                </div>
              </div>
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" id="street_id" name="street_id" data-live-search="true">
                    <option value="">Đường/Phố</option>
                  </select>
                </div>
              </div>
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" data-live-search="true" id="project_id" name="project_id">
                    <option value="">Dự án</option>
                  </select>
                </div>
              </div>
              
              <div class="col-xs-2">
                <div class="form-group" style="width: 98%">
                  <select class="selectpicker form-control" data-live-search="true" name="price_id" id="price_id">
                    <option value="">Mức giá</option>
                    @foreach($priceList as $price)
                    <option  value="{{ $price->id }}">{!! $price->name !!}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
            </div>
            <div class="row-select">
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" id="area_id" name="area_id" data-live-search="true">
                    <option value="">Diện tích</option>
                    @foreach($areaList as $area)
                    <option value="{{ $area->id }}">{!! $area->name !!}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" data-live-search="true" name="direction_id">
                    <option value="">Hướng nhà</option>
                    @foreach($directionList as $dir)
                    <option value="{{ $dir->id }}">{!! $dir->name !!}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-xs-2">
                <div class="form-group">
                  <select class="selectpicker form-control" data-live-search="true" name="no_room">
                    <option value="">Số phòng ngủ</option>
                    <option value="1">1+</option>
                    <option value="2">2+</option>
                    <option value="3">3+</option>
                    <option value="4">4+</option>
                    <option value="5">5+</option>
                    <option value="6">6+</option>
                  </select>
                </div>
              </div>                
              <div class="col-xs-2 col-button">
                <div class="form-group">
                  <button type="button" id="btnSearch" class="btn btn-success btn-search-home"><i class="fa fa-search"></i> Tìm Kiếm</button>
                </div>
              </div>
            </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="profile">
            
          </div>
        </div>
    </div>
  </div>
</section><!-- /block-search -->
<section style="margin-bottom: 10px !important;">
  <article class="block block-inews block-news-new">
    <div class="block-advisory">
      <div class="col-sm-6 col-xs-12">
        <div class="block-title block-title-common">
          <h3><span class="icon-tile"><i class="fa fa-star"></i></span> GIỚI THIỆU</h3>
        </div>
        <div class="block-content">{!! $settingArr['gioi_thieu_so_luoc'] !!}</div>
      </div>
    </div>
    <div class="block-architectural">
      <div class="col-sm-6 col-xs-12">
        <div class="block-title block-title-common">
          <h3><span class="icon-tile2"><img src="{{ URL::asset('assets/images/icon-tkkt.png') }}" alt="VIDEO CLIP"></span> Hình ảnh</h3>
        </div>
        <div class="block-contents">
          <?php 
            if(!isset($project_id)){
              $bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
            }else{
              if($tab_id == 1){
                $bannerArr =  DB::table('banner')->where(['object_id' => $project_id, 'object_type' => 4])->orderBy('display_order', 'asc')->get();
              }else{
                $bannerArr = (object)[];
              }
              
            }

            ?>                    
            @if($bannerArr)
            <div class="block-slider-home">
                    <div class="owl-carousel dotsData owl-style2" data-nav="false" data-margin="0" data-items='1' data-autoplayTimeout="500" data-autoplay="true" data-loop="true">
                      <?php $i = 0; ?>
                      @foreach($bannerArr as $banner)
                       <?php $i++; ?>
                      <div class="item-slide" data-dot="{{ $i }}">
                        @if($banner->ads_url !='')
                        <a href="{{ $banner->ads_url }}">
                        @endif
                          <img src="{{ Helper::showImage($banner->image_url) }}" alt="slide {{ $i }}">
                        @if($banner->ads_url !='')
                        </a>
                        @endif
                      </div><!-- item-slide1 -->
                      @endforeach             
                    </div>
                  </div>
            @endif
        </div>
      </div>
    </div>
  </article><!-- /block-inews -->
</section>
<div class="clearfix"></div>
<?php 
$bannerArr = DB::table('banner')->where(['object_id' => 2, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
?>             
      <section style="padding: 0 10px;margin: 10px 0" > 
      <?php $i = 0; ?>
@foreach($bannerArr as $banner)
  <?php $i++; ?>
          @if($banner->ads_url !='')
  <a href="{{ $banner->ads_url }}">
  @endif
              <img src="{{ Helper::showImage($banner->image_url) }}" alt="Banner giữa trang {{ $i }}" style="width:100%"></a>

           @if($banner->ads_url !='')
  </a>
  @endif

      @endforeach
      </section>
<section class="col-sm-12 col-xs-12 block-sitemain">
    <article class="block block-news-new clearfix">
    <div class="col-sm-12 col-xs-12">      
        <div class="row">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#trmn12" aria-controls="trmn12" role="tab" data-toggle="tab">BĐS CHO THUÊ</a>
            </li>
            <li role="presentation" >
              <a href="#trmn11" aria-controls="trmn11" role="tab" data-toggle="tab">BĐS BÁN</a>
            </li>
            
          </ul>
          
          <div class="block-contents">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane" id="trmn11">
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
              <div role="tabpanel" class="tab-pane active" id="trmn12">
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
  <article class="block block-inews block-news-new">
    <div class="block-advisory">
      <div class="col-sm-9 col-xs-12">
        <article class="block block-news-new clearfix" id="du-an-list">
            <div class="col-sm-12 col-xs-12">      
                <div class="row">
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                      <a href="#trmn1" aria-controls="trmn1" role="tab" data-toggle="tab">Dự án</a>
                    </li>                          
                  </ul>
                  
                  <div class="block-contents">
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="trmn1">
                       <div  class="owl-carousel dotsData owl-style2" data-nav="false" data-margin="0" data-items='3' data-autoplayTimeout="500" data-autoplay="true" data-loop="true">
                @if($landingList)
                  @foreach($landingList as $value)
                  <div class="large-item" style="padding:10px">
                                    <a href="{{ route('detail-project', [$value->slug])}}" title="{!! $value->name !!}"><img src="{{ $value->image_url ? Helper::showImageThumb($value->image_url, 3, '306x194') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="" /></a>
                                    <h4><a href="{{ route('detail-project', [$value->slug])}}" title="{!! $value->name !!}">{!! $value->name !!}</a></h4>
                                    <p>{{ $value->address }}</p>
                                </div>
                                @endforeach
                            @endif
                </div>                      
                      </div><!-- /home -->                             
                    </div>
                  </div>
                </div>
            </div>
          </article><!-- /block-news-new -->
      </div>
    </div>
    <div class="block-architectural">
      <div class="col-sm-3 col-xs-12">                
        <div class="block-contents">

          <?php 
          $bannerArr = DB::table('banner')->where(['object_id' => 6, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
          ?>                  
          <div style="margin-bottom: 5px;">
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
          </div>
          <?php 
          $bannerArr = DB::table('banner')->where(['object_id' => 7, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
          ?> 
          <div>
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
          </div>
        </div>
      </div>
    </div>
  </article><!-- /block-inews -->
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