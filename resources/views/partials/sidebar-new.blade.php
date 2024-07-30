
<aside class="sidebar">
    <div class="sidebar-header">
        <img src="{{asset('img/logo-ccjm.png')}}" alt="logo" />
        <h2>CCJM Agency</h2>
    </div>
    <ul class="sidebar-links">
        <h4>
            <span>Main Menu</span>
            <div class="menu-separator"></div>
        </h4>
        <li>
            <a href="{{route('admin.dashboard')}}">
                <span class="material-symbols-outlined"> dashboard </span>Dashboard</a>
        </li>
        <li>
            <a href="#"><span class="material-symbols-outlined"> overview </span>Overview</a>
        </li>
        <li>
            <a href="#"><span class="material-symbols-outlined"> monitoring </span>Analytic</a>
        </li>
        <h4>
            <span>General</span>
            <div class="menu-separator"></div>
        </h4>
        <li>
            <a href="{{route('agent.index')}}"><span class="material-symbols-outlined"> support_agent </span>Agents</a>
        </li>
        <li>
            <a href="{{route('users.index')}}"><span class="material-symbols-outlined"> groups </span>Users</a>
        </li>
        <li>
            <a href="#"><span class="material-symbols-outlined"> move_up </span>Transfer</a>
        </li>
        <li>
            <a href="#"><span class="material-symbols-outlined"> flag </span>All Reports</a>
        </li>
        <li>
            <a href="#"><span class="material-symbols-outlined">
            notifications_active </span>Notifications</a>
        </li>
        <h4>
            <span>Account</span>
            <div class="menu-separator"></div>
        </h4>
        <li>
            <a href="#"><span class="material-symbols-outlined"> account_circle </span>Profile</a>
        </li>
        <li>
            <a href="#"><span class="material-symbols-outlined"> settings </span>Settings</a>
        </li>
        <li>
            <a href="#"><span class="material-symbols-outlined"> logout </span>Logout</a>
        </li>
    </ul>
    <div class="user-account">
        <div class="user-profile">
            <img src="{{asset('img/profile-img.jpg')}}" alt="Profile Image" />
            <div class="user-detail">
                @if(Auth::check())
                    <h3>{{ Auth::user()->name }}</h3>
                @endif
                <span>Web Developer</span>
            </div>
        </div>
    </div>
</aside>
