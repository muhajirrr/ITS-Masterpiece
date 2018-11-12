@if ($message_success = Session::get('success'))
    @include('dashboard.components.notif_js', ['body' => $message_success, 'type' => 'success'])
@endif

@if ($message_error = Session::get('error'))
    @include('dashboard.components.notif_js', ['body' => $message_error, 'type' => 'danger'])
@endif

@if ($errors->any())
    @include('dashboard.components.notif_js', ['body' => $errors->first(), 'type' => 'danger'])
@endif