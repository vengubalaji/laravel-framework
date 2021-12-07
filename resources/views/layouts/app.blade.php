<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel App - @yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
</head>

<body>
  <div class="form-style-5">
    @if (session('status'))
        <div class="form_flashmsg">{{ session('status') }}</div>    
    @endif
    @yield('content')
  </div>
</body>
<script>
  jQuery(document).ready(function() {
    jQuery('#students_list').DataTable( {
      "pageLength": 10
    } );
} );
</script>
</html>