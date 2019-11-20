<form action="" method="GET" class="mb-3">
    <input type="text" class="form-control" placeholder="Search..." name="search" id="search">
</form>
<div class="list-group">
    <a href="@if (Request::is('teacher/dashboard-general'))
    {{ route('teacher.dashboard-tabular') }}
    @else
    {{ route('teacher.dashboard-general') }}
    @endif" class="list-group-item list-group-item-action">
        @if (Request::is('teacher/dashboard-general'))
        Tabular
        view
        @else
        Regular view
        @endif
    </a>
    <a href="#" class="list-group-item list-group-item-action disabled">Messages</a>
    <a href="#" class="list-group-item list-group-item-action">Settings</a>
</div>