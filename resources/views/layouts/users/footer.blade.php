<?php
$umum = $settings['umum'];
?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Copyright &copy; {{ date('Y') }}
    </div>
    <!-- Default to the left -->
    <i class="fas fa-tools text-primary"></i>
    Created By <a class="text-primary" href="https://adiva.co.id"><strong>{{ $umum['creator_app'] }}.</strong></a>
</footer>
</div>
