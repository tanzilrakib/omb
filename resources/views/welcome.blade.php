@extends('shopify-app::layouts.default')

@section('content')
    <p>Store: {{ ShopifyApp::shop()->shopify_domain }}</p>


    <h1 class="text-center" style="text-align: center">OMB</h1>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        // ESDK page and bar title
        window.mainPageTitle = 'Home';
            ShopifyApp.ready(function() {
                ShopifyApp.Bar.initialize({
                    title: 'Home'
                })
            });
    </script>
@endsection