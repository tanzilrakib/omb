
@extends('default')

@section('styles')

    @endsection

@section('content')
    <h1 class="text-center" style="text-align: center">OMB</h1>

    <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-lighter:#1d9ba4;">
        <button type="button" class="Polaris-Button Polaris-Button--sizeLarge" id="alterLiquidBtn"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Alter Liquid Content</span></span></button>
        <button type="button" class="Polaris-Button Polaris-Button--sizeLarge" id="restoreLiquidBtn"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Restore Liquid</span></span></button>
    </div>

    <div class="banner" tabindex="0" role="status">
      <div class="banner__ribbon">
        <span class="polaris-icon polaris-icon__has-backdrop">
          <svg class="polaris-icon__svg" viewBox="0 0 20 20">
            <g fill-rule="evenodd">
              <path fill="currentColor" d="M2 3h11v4h6l-2 4 2 4H8v-4H3"></path>
              <path d="M16.105 11.447L17.381 14H9v-2h4a1 1 0 0 0 1-1V8h3.38l-1.274 2.552a.993.993 0 0 0 0 .895zM2.69 4H12v6H4.027L2.692 4zm15.43 7l1.774-3.553A1 1 0 0 0 19 6h-5V3c0-.554-.447-1-1-1H2.248L1.976.782a1 1 0 1 0-1.953.434l4 18a1.006 1.006 0 0 0 1.193.76 1 1 0 0 0 .76-1.194L4.47 12H7v3a1 1 0 0 0 1 1h11c.346 0 .67-.18.85-.476a.993.993 0 0 0 .044-.972l-1.775-3.553z"></path>
            </g>
          </svg>
        </span>
      </div>
      <div>
        <h3>Module is ready</h3>
        <p>This module is ready to be implemented on a live app.</p>
      </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script>

        var liquidToast = {
          message: 'Liquid file altered successfully',
          duration: 2000,
        };
        var liquidToastNotice = Toast.create(app, liquidToast);
  
        $('#alterLiquidBtn').click(function(e){
          // window.location.href = "{{route('alter-liquid')}}";
            $('#app-loader-overlay').css('display','flex');
            $.ajax({
                type: "GET",
                url: "{{route('alter-liquid')}}",
                success: function(res){
                    console.log(res);
                    $('#app-loader-overlay').hide();
                    liquidToastNotice.dispatch(Toast.Action.SHOW);
                }
            });
        });

        $('#restoreLiquidBtn').click(function(e){
            $('#app-loader-overlay').css('display','flex');
            $.ajax({
                type: "GET",
                url: "{{route('restore-searchbar')}}",
                success: function(res){
                    console.log(res);
                    liquidToast = {
                      message: 'Liquid file restored successfully',
                      duration: 2000,
                    };
                    liquidToastNotice = Toast.create(app, liquidToast);
                    $('#app-loader-overlay').hide();
                    liquidToastNotice.dispatch(Toast.Action.SHOW);
                }
            });
        });
    </script>

    <!-- <script type="text/javascript">
        // ESDK page and bar title
        window.mainPageTitle = 'Home';
            ShopifyApp.ready(function() {
                ShopifyApp.Bar.initialize({
                    title: 'Home'
                })
            });
    </script> -->
@endsection



@prepend('bootstrap4')
@endprepend