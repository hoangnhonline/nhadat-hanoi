<footer class="footer">	
    <div class="container">
    	<div class="block-footer row">
    		<div class="block-logo-footer col-sm-3">
                <a href="{{ route('home') }}" title="logo thanhphuthinhland">
                	<img src="{{ Helper::showImage($settingArr['logo']) }}" alt="logo">
                </a>

            </div>
            <div class="block-footer-address col-sm-5">
                <address>
					{!! $settingArr['cty_info'] !!}
				</address>
            </div>
            <div class="block-menu-bottom-bottom col-sm-4">
				<label>Thông Tin Mua Bán</label>
                <ul>
                	@if($footerLink)
                	@foreach($footerLink as $link)
					<li><a href="{{ $link->link_url }}" title="{!! $link->link_text !!}">{!! $link->link_text !!}</a></li>
					@endforeach
					@endif
                </ul>
            </div>
    	</div>
    </div> 
</footer><!-- /footer -->