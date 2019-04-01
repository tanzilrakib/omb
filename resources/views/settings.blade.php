
@extends('default')

@section('content')
    <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-lighter:#1d9ba4;">
	  <div class="Polaris-EmptyState">
	    <div class="Polaris-EmptyState__Section">
	      <div class="Polaris-EmptyState__DetailsContainer">
	        <div class="Polaris-EmptyState__Details">
	          <div class="Polaris-TextContainer">
	            <p class="Polaris-DisplayText Polaris-DisplayText--sizeMedium">Settings</p>
	            <div class="Polaris-EmptyState__Content">
	              <p>Change you app's settings from this panel.</p>
	            </div>
	          </div>
	          <div class="Polaris-EmptyState__Actions">
	            <div class="Polaris-Stack Polaris-Stack--alignmentCenter">
	              <div class="Polaris-Stack__Item"><button type="button" class="Polaris-Button Polaris-Button--primary Polaris-Button--sizeLarge"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Show advanced settings</span></span></button></div>
	              <div class="Polaris-Stack__Item"><a class="Polaris-Button Polaris-Button--plain" href="https://help.shopify.com" data-polaris-unstyled="true"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Learn more</span></span></a></div>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="Polaris-EmptyState__ImageContainer"><img src="https://cdn.shopify.com/s/files/1/0757/9955/files/empty-state.svg" role="presentation" alt="" class="Polaris-EmptyState__Image" height="400px"></div>
	    </div>
	  </div>
	</div>

@endsection

@section('scripts')
    @parent
@endsection



@prepend('bootstrap4')
@endprepend