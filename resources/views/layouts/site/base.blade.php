<!DOCTYPE html>
<html lang="ja">
{{-- Head --}}
@includeIf('layouts.site.head')

<body class="hold-transition">
<div class="wrapper">
    @include('layouts.site.header')
    {{-- Main Content --}}
    @includeIf('layouts.site.main')
</div><!-- ./wrapper -->
@includeIf('layouts.site.js')
</body>
</html>
