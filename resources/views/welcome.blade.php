
@extends('default')

@section('styles')

    @endsection

@section('content')
    <h1 class="text-center" style="text-align: center">OMB</h1>

    <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-lighter:#1d9ba4;"><button type="button" class="Polaris-Button Polaris-Button--sizeLarge" id="getLiquidBtn"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">Get Liquid Content</span></span></button></div>
@endsection

@section('scripts')
    @parent

    <script>
          $('#getLiquidBtn').click(function(e){
              window.location.href = "{{route('get-liquid')}}";
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