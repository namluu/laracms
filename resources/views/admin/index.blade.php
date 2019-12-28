admin index
{{session('status')}}
@if(Auth::guard('admin')->check())
    <p>hello {{ Auth::guard('admin')->user()->name }}</p>
    <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
        Logout
    </a>
    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endif