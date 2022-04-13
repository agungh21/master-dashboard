<h1>HELLO USER</h1>
<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
    class="
                         nav-link">
    <i class="nav-icon fas fa-sign-out-alt"></i>
    <p>
        Logout
    </p>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
