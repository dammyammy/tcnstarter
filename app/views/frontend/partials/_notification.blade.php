@if ($errors->any())

@endif

@if ($message = Session::get('success'))

@endif

@if ($message = Session::get('error'))

@endif

@if ($message = Session::get('warning'))

@endif

@if ($message = Session::get('info'))

@endif