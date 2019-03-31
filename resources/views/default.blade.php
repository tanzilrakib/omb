<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('shopify-app.app_name') }}</title>

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

        <script src="https://unpkg.com/@shopify/app-bridge"></script>
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

            const saveButton = Button.create(app, {label: 'Save'});

            const button1 = Button.create(app, {label: 'Show toast message'});
            const toastOptions = {
              message: 'This is an example Toast Message',
              duration: 2000,
            };
            const toastNotice = Toast.create(app, toastOptions);
            button1.subscribe(Button.Action.CLICK, function() {
                console.log('CLICKED');
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
                console.log('CLICKED');
                toastError.dispatch(Toast.Action.SHOW);
            });

            const button3 = Button.create(app, {label: 'Open modal'});


            const moreActions = ButtonGroup.create(app, {
              label: 'More actions',
              buttons: [button1, button2],
            });


         
            // var breadcrumb = Button.create(app, {label: 'My breadcrumb'});
            // breadcrumb.subscribe(Button.Action.CLICK, function() {
            //   app.dispatch(Redirect.toApp({path: '/breadcrumb-link'}));
            // });

            var titleBarOptions = {
              title: 'Home',
              buttons: {
                primary: saveButton,
                secondary: [moreActions],
              },
              // breadcrumbs: breadcrumb,
            };

            var myTitleBar = TitleBar.create(app, titleBarOptions);


            moreActions.set({
              label: 'Additional options',
            });

        </script>
            @include('shopify-app::partials.flash_messages')
        @endif

        @yield('scripts')
    </body>
</html>