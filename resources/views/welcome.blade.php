
@extends('default')

@section('content')
    <h1 class="text-center" style="text-align: center">OMB</h1>
    <h2 style="text-align: center">Find out what suits your business</h2>
<!--     @if( ShopifyApp::shop()->plan_id != 1  )
        <a href="{{ route('billing', ['plan_id' => 1]) }}">Basic</a>
    @endif
    @if( ShopifyApp::shop()->plan_id != 2  )
        <a href="{{ route('billing', ['plan_id' => 2]) }}">Standard</a>
    @endif
    @if( ShopifyApp::shop()->plan_id != 3  )
        <a href="{{ route('billing', ['plan_id' => 3]) }}">Premium</a>
    @endif
 -->

    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);

        body {
          background: #F2F2F2;
          padding: 0;
          maring: 0;
        }

        #price {
          text-align: center;
        }

        .plan {
          display: inline-block;
          margin: 10px 1%;
          font-family: 'Lato', Arial, sans-serif;
        }

        .plan-inner {
          background: #fff;
          margin: 0 auto;
          min-width: 280px;
          max-width: 100%;
          position:relative;
        }

        .entry-title {
          background: #53CFE9;
          height: 140px;
          position: relative;
          text-align: center;
          color: #fff;
          margin-bottom: 30px;
        }

        .entry-title>h3 {
          background: #20BADA;
          font-size: 20px;
          padding: 5px 0;
          text-transform: uppercase;
          font-weight: 700;
          margin: 0;
        }

        .entry-title .price {
          position: absolute;
          bottom: -25px;
          background: #20BADA;
          height: 95px;
          width: 95px;
          margin: 0 auto;
          left: 0;
          right: 0;
          overflow: hidden;
          border-radius: 50px;
          border: 5px solid #fff;
          line-height: 80px;
          font-size: 28px;
          font-weight: 700;
        }

        .price span {
          position: absolute;
          font-size: 9px;
          bottom: -10px;
          left: 30px;
          font-weight: 400;
        }

        .entry-content {
          color: #323232;
        }

        .entry-content ul {
          margin: 0;
          padding: 0;
          list-style: none;
          text-align: center;
        }

        .entry-content li {
          border-bottom: 1px solid #E5E5E5;
          padding: 10px 0;
        }

        .entry-content li:last-child {
          border: none;
        }

        .btn {
          padding: 3em 0;
          text-align: center;
        }

        .btn a {
          background: #323232;
          padding: 10px 30px;
          color: #fff;
          text-transform: uppercase;
          font-weight: 700;
          text-decoration: none
        }
        .hot {
            position: absolute;
            top: -7px;
            background: #F80;
            color: #fff;
            text-transform: uppercase;
            z-index: 2;
            padding: 2px 5px;
            font-size: 9px;
            border-radius: 2px;
            right: 10px;
            font-weight: 700;
        }
        .basic .entry-title {
          background: #75DDD9;
        }

        .basic .entry-title > h3 {
          background: #44CBC6;
        }

        .basic .price {
          background: #44CBC6;
        }

        .standard .entry-title {
          background: #4484c1;
        }

        .standard .entry-title > h3 {
          background: #3772aa;
        }

        .standard .price {
          background: #3772aa;
        }

        .ultimite .entry-title > h3 {
          background: #DD4B5E;
        }

        .ultimite .entry-title {
          background: #F75C70;
        }

        .ultimite .price {
          background: #DD4B5E;
        }

        .plan .btn.disabled a{
            background: #20BADA;
        }
        .plan.standard .btn.disabled a{
            background: #3772aa;
        }
        .plan.ultimite .btn.disabled a{
            background: #DD4B5E;
        }


    </style>
    <div id="price">
      <!--price tab-->
      <div class="plan">
        <div class="plan-inner">
          <div class="entry-title">
            <h3>Basic</h3>
            <div class="price">$5.00<span>/MONTH</span>
            </div>
          </div>
          <div class="entry-content">
            <ul>
              <li><strong>1x</strong> option 1</li>
              <li><strong>2x</strong> option 2</li>
              <li><strong>Free</strong> option 4</li>
              <li><strong>Limited</strong> option 5</li>
            </ul>
          </div>
            @if( ShopifyApp::shop()->plan_id != 1  )
                <div class="btn">
                    <a href="{{ route('billing', ['plan_id' => 1]) }}">Purchase</a>
                </div>
            @else
                <div class="btn disabled">
                    <a href="javascript:void(0)" disabled="disabled">Active Plan</a>
                </div>
            @endif
        </div>
      </div>
      <!-- end of price tab-->
      <!--price tab-->
      <div class="plan standard">
        <div class="plan-inner">
          <div class="hot">hot</div>
          <div class="entry-title">
            <h3>Standard</h3>
            <div class="price">$12.99<span>/MONTH</span>
            </div>
          </div>
          <div class="entry-content">
            <ul>
              <li><strong>2x</strong> Free Entrance</li>
              <li><strong>Custom</strong> Swags</li>
              <li><strong>2x</strong> Certificate</li>
              <li><strong>Regular</strong> Wifi</li>
            </ul>
          </div>
          @if( ShopifyApp::shop()->plan_id != 2  )
                <div class="btn">
                    <a href="{{ route('billing', ['plan_id' => 2]) }}">Purchase</a>
                </div>
            @else
                <div class="btn disabled">
                    <a href="javascript:void(0)" disabled="disabled">Active Plan</a>
                </div>
            @endif
        </div>
      </div>
      <!-- end of price tab-->
      <!--price tab-->
      <div class="plan ultimite">
        <div class="plan-inner">
          <div class="entry-title">
            <h3>Premium</h3>
            <div class="price">$19.99<span>/MONTH</span>
            </div>
          </div>
          <div class="entry-content">
            <ul>
              <li><strong>1x</strong> option 1</li>
              <li><strong>2x</strong> option 2</li>
              <li><strong>Free</strong> option 4</li>
              <li><strong>Unlimited</strong> option 5</li>
            </ul>
          </div>
          @if( ShopifyApp::shop()->plan_id != 3  )
                <div class="btn">
                    <a href="{{ route('billing', ['plan_id' => 3]) }}">Purchase</a>
                </div>
            @else
                <div class="btn disabled">
                    <a href="javascript:void(0)" disabled="disabled">Active Plan</a>
                </div>
            @endif
        </div>
      </div>
      <!-- end of price tab-->
    </div>



@endsection

@section('scripts')
    @parent


    <script src="https://unpkg.com/@shopify/app-bridge"></script>


    <script>
        
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