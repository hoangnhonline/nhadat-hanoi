
<section class="col-sm-4 col-xs-12 block-sitebar">
	<div class="scroll_fix">						
		<article class="block-sidebar block-support">
			<div class="block-title-common">
				<h3><span class="icon-tile"><i class="fa fa-life-ring"></i></span> Hỗ Trợ Khách Hàng</h3>
			</div>
			<div class="block-contents">
				<ul class="support">
					@foreach($supportList as $sup)
					<li class="item-support clearfix">
						<img src="{{ $sup->image_url ? Helper::showImage($sup->image_url) : URL::asset('assets/images/contact2.jpg') }}" alt="{!! $sup->name !!}" style="max-width:80px">
						<div class="item-support-info">
							<h3>{!! $sup->name !!}</h3>
							<p>{{ $sup->phone }}</p>
							@if($sup->facebook)
							<a target="_blank" href="https://www.facebook.com/messages/t/{{ $sup->facebook }}"><img src="{{ URL::asset('assets/images/rb_facebook.png') }}" alt="icon facebook" style="width:27px;height:27px"></a>
							@endif
							@if($sup->skype)
							<a  href="skype:{{ $sup->skype }}?chat"><img src="{{ URL::asset('assets/images/skype.jpg') }}" alt="icon skype"></a>
							@endif
						</div>
					</li>
					@endforeach								
				</ul>
			</div>
		</article><!-- /block-news-sidebar -->
		<article class="block-sidebar block-news-sidebar">
			<div class="block-title-common">
				<h3><span class="icon-tile"><i class="fa fa-star"></i></span> Tin xem nhiều</h3>
			</div>
			<div class="block-contents">
				<ul class="block-list-sidebar block-icon-title">
					@foreach($tinRandom as $tin)
                  
                  <li><h4><a href="{{ route('news-detail', ['slug' => $tin['slug'], 'id' => $tin['id']]) }}" title="">{{ $tin['title'] }}</a></h4></li>
                 
                  @endforeach
					
				</ul>
			</div>
		</article><!-- /block-news-sidebar -->

		<article class="block-sidebar block-news-sidebar">
			<div class="block-title-common">
				<h3><span class="icon-tile"><i class="fa fa-building-o"></i></span> Dự án nổi bật</h3>
			</div>
			<div class="block-contents block-contents2">
				<ul class="block-list-sidebar block-slide-sidebar">
					<div class="bxslider">
					@if($landingList)
						@foreach($landingList as $value)
						<div class="large-item" >
                            <a href="{{ route('detail-project', [$value->slug])}}" title="{!! $value->name !!}"><img src="{{ $value->image_url ? Helper::showImageThumb($value->image_url, 3, '306x194') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="" /></a>
                            <h4><a href="{{ route('detail-project', [$value->slug])}}" title="{!! $value->name !!}">{!! $value->name !!}</a></h4>
                            <p>{{ $value->address }}</p>
                        </div>
                        @endforeach
                    @endif
					</div>
					<div id="bx-pager" class="bx-thumbnail">
						@if($landing2List)
						@foreach($landing2List as $value)
						<div class="item">
							<div class="item-child">
	                            <a data-slide-index="0" class="slide_title" onclick="location.href='{{ route('detail-project', [$value->slug])}}'" href="{{ route('detail-project', [$value->slug])}}" title=""><img class="avatar" src="{{ $value->image_url ? Helper::showImageThumb($value->image_url, 3, '308x190') : URL::asset('backend/dist/img/no-image.jpg') }}" alt="" /></a>
	                            <div class="slide_info">
	                                <a  onclick="location.href='{{ route('detail-project', [$value->slug])}}'" href="{{ route('detail-project', [$value->slug])}}" title="">{{ $value->name }}</a>
	                                <p>{{ $value->address }}</p>
	                            </div>
                            </div>
                        </div>
                        @endforeach
                        @endif			                       
                        
					</div>
				</ul>
			</div>
		</article><!-- /block-news-sidebar -->

		<article class="block-sidebar block-news-sidebar">
			<div class="block-title-common">
				<h3><span class="icon-tile"><i class="fa fa-th-list"></i></span> Liên kết nổi bật</h3>
			</div>
			<div class="block-contents">
				<ul class="block-list-sidebar block-icon1-title">
					@foreach($customLink as $link)
					<li><h4><a href="{{ $link->link_url }}" title="{{ $link->link_text }}">{{ $link->link_text }}</a></h4></li>
					@endforeach
				</ul>							
			</div>
		</article><!-- /block-news-sidebar -->
	</div>
</section><!-- /block-site-right -->