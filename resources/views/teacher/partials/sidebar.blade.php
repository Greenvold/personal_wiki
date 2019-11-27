<form action="" method="GET" class="mb-3">
    <input type="text" class="form-control" placeholder="Search..." name="search" id="search">
</form>
<div class="list-group">
    <a href="{{ route('teacher.dashboard') }}"
        class="list-group-item list-group-item-action {{Request::is('teacher/dashboard') ? 'active' : ''}}">Home</a>
    <a href="{{ route('teacher.guides-general') }}"
        class="list-group-item list-group-item-action {{Request::is('teacher/guides-general') ? 'active' : ''}}">Guides</a>
    <a href="{{ route('teacher.courses-general') }}" class="list-group-item list-group-item-action 
    {{Request::is('teacher/courses-general') ? 'active' : ''}}
    ">Courses</a>
    <a href="#" class="list-group-item list-group-item-action disabled">Messages</a>
    <a href="#" class="list-group-item list-group-item-action">Settings</a>
</div>