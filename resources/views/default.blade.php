<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('shopify-app.app_name') }}</title>

        <!-- Shopify's polaris styles -->
        <link
          rel="stylesheet"
          href="https://sdks.shopifycdn.com/polaris/3.11.0/polaris.min.css"
        />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-polaris.min.css') }}">
        @yield('styles')
    </head>

    <body>
        <div class="app-wrapper">
            <div class="app-content">
                <main role="main">
                    @yield('content')
                </main>
            </div>
        </div>

        @if(config('shopify-app.esdk_enabled'))
        <script
          src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@shopify/app-bridge"></script>
        <script src="{{ asset('js/bootstrap-polaris.js') }}"></script>
        <script>
            var AppBridge = window['app-bridge'];
            var createApp = AppBridge.createApp;
            const app = createApp({
              apiKey: "{{env('SHOPIFY_API_KEY')}}",
              shopOrigin: "{{ShopifyApp::shop()->shopify_domain}}",
            });

            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;
            var Toast = actions.Toast;
            var Button = actions.Button;
            var ButtonGroup = actions.ButtonGroup;
            var Loading = actions.Loading;

            const redirect = Redirect.create(app);
            const loading = Loading.create(app);

            loading.dispatch(Loading.Action.STOP); 

            const saveButton = Button.create(app, {label: 'Plans'});

            saveButton.subscribe('click', () => {
                $('#app-loader-overlay').css('display','flex');
                loading.dispatch(Loading.Action.START);
                app.dispatch(Redirect.toApp({path: '/plans'}));
            });

            const button1 = Button.create(app, {label: 'Show toast message'});
            const toastOptions = {
              message: 'This is an example Toast Message',
              duration: 2000,
            };
            const toastNotice = Toast.create(app, toastOptions);
            button1.subscribe(Button.Action.CLICK, function() {
                toastNotice.dispatch(Toast.Action.SHOW);
            });

            const button2 = Button.create(app, {label: 'Show Toast Error'});
            const toastErrorOptions = {
                message: 'Error saving',
                duration: 2000,
                isError: true,
            };
            const toastError = Toast.create(app, toastErrorOptions);
            button2.subscribe(Button.Action.CLICK, function() {
                toastError.dispatch(Toast.Action.SHOW);
            });

            const button3 = Button.create(app, {label: 'Open modal'});

            const moreActions = ButtonGroup.create(app, {
              label: 'More actions',
              buttons: [button1, button2],
            });


            const homeButton = Button.create(app, {label: 'Home'});
            homeButton.subscribe('click', () => {
                $('#app-loader-overlay').css('display','flex');
                loading.dispatch(Loading.Action.START);
                redirect.dispatch(Redirect.Action.APP, "/");
            });

            const settingsButton = Button.create(app, {label: 'Settings'});
            settingsButton.subscribe('click', () => {
                $('#app-loader-overlay').css('display','flex');
                loading.dispatch(Loading.Action.START);
                app.dispatch(Redirect.toApp({path: '/settings'}));
            });


         
            var breadcrumb = Button.create(app, {label: 'Settings'});
            breadcrumb.subscribe(Button.Action.CLICK, function() {
              app.dispatch(Redirect.toApp({path: '/settings'}));
            });

            var titleBarOptions = {
              title: "{{ucwords(Route::currentRouteName())}}",
              buttons: {
                primary: saveButton,
                secondary: [homeButton, settingsButton, moreActions],
              },
              // breadcrumbs: breadcrumb,
            };

            var myTitleBar = TitleBar.create(app, titleBarOptions);

            moreActions.set({
              label: 'Show Features',
            });

        </script>
            @include('shopify-app::partials.flash_messages')
        @endif

        @yield('scripts')
    </body>

    @include('partials.loader')
</html>