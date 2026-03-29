<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BBS | Dashboard</title>

  <!-- ======= Compiled Styles ====== -->
  @vite(['resources/css/app.scss', 'resources/js/app.js'])

</head>

<body>
<div class="dash-container">
  {{-- Sidebar --}}
  @include('layouts.sidebar')
</div>
</body>

</html>