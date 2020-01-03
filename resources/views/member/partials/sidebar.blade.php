<form action="" method="GET" class="mb-3">
    <input type="text" class="form-control" placeholder="Search..." name="search" id="search">
</form>
<div class="list-group">
    {{-- <a href="{{ route('member.dashboard') }}"
    class="list-group-item list-group-item-action {{Request::is('member/dashboard') ? 'active' : ''}}">Home</a>
    <a href="{{ route('member.guides-general') }}"
        class="list-group-item list-group-item-action {{Request::is('member/guides-general') ? 'active' : ''}}">Guides</a>
    <a href="{{ route('member.courses-general') }}" class="list-group-item list-group-item-action 
    {{Request::is('member/courses-general') ? 'active' : ''}}
    ">Courses</a> --}}
    <a href="#" class="list-group-item list-group-item-action disabled">Messages</a>
    <a href="#" class="list-group-item list-group-item-action">Settings</a>
</div>