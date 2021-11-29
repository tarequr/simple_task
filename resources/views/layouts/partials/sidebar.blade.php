<div class="list-group">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ Route::is('dashboard') ? 'active' : '' }}">Profile</a>

    <a href="{{ route('notes.index') }}" class="list-group-item list-group-item-action {{ Route::is('notes.index') || Route::is('notes.edit') ? 'active' : '' }} ">Note</a>
</div>