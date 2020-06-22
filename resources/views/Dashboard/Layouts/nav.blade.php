<!-- Main -->
<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
<li class="active"><a href="{{route('dashboard.home')}}"><i class="icon-home4"></i> <span>Home</span></a></li>
<li>
    <a href="#"><i class="icon-users4"></i> <span>Users</span></a>
    <ul>
        <li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-users"></i>All Users</a></li>
        <li><a href="{{route('dashboard.users.create')}}"><i class="fa fa-user-plus"></i>Add New User</a></li>
    </ul>
</li>

<li>
    <a href="#"><i class="fas fa-archive"></i><span>Categories</span></a>
    <ul>
        <li><a href="{{route('dashboard.categories.index')}}"><i class="fas fa-clone"></i>All Categories</a></li>
        <li><a href="{{route('dashboard.categories.create')}}"><i class="fas fa-plus-square"></i></i>Add New Category</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="fas fa-chalkboard-teacher"></i><span>Courses</span></a>
    <ul>
        <li><a href="{{route('dashboard.courses.index')}}"><i class="fas fa-laptop-code"></i>All Courses</a></li>
        <li><a href="{{route('dashboard.courses.create')}}"><i class="fas fa-book-reader"></i>Add New Course</a></li>
    </ul>
</li>
<li>
    <a href="#"><i class="far fa-clipboard"></i><span>Lessons</span></a>
    <ul>

        <li><a href="{{route('dashboard.lessons.index')}}"><i class="fas fa-copy"></i></i>All Lessons</a></li>
        <li><a href="{{route('dashboard.lessons.create')}}"><i class="fas fa-file"></i>Add New Lesson</a></li>
    </ul>
</li>
{{-- ================================================================== --}}

<li><a href="#"><i class="fas fa-envelope"></i><span>Messages</span></a>
    <ul>
        <li><a href="{{route('dashboard.message.index')}}"><i class="fas fa-envelope-open-text"></i></i>All Messages</a></li>
    </ul>
</li>

<li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fa fa-sign-out-alt"></i><span> Logout</span>
</a>
</li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
