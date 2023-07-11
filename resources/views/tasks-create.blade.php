<!DOCTYPE html>
    <body class="antialiased">
    <form method="post" action="{{ route('tasks.store') }}">
        {!! csrf_field() !!}

        <label for="title">Title</label>
        <input type="text" name="title" required/>
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" required/>
        <br>
        <label for="assigned_to_id">Assigned To</label>
        <select name="assigned_to_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}"> {{ $user->name }} </option>
            @endforeach
        </select>
        <br>
        <label for="assigned_by_id">Assigned To</label>
        <select name="assigned_by_id" class="form-control">
            @foreach($admins as $admin)
                <option value="{{ $admin->id }}"> {{ $admin->name }} </option>
            @endforeach
        </select>
        <br>
        <button>Create Task</button>
    </form>
    </body>
</html>
