<!DOCTYPE html>
    <body class="antialiased">
    <table border="1">
        <thead>
        <tr>
            <th> Task Title</th>
            <th> Task Description</th>
            <th> Assigned To </th>
            <th> Assigned By </th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td> {{$task->title}} </td>
                <td> {{$task->description}} </td>
                <td> {{$task->user->name}} </td>
                <td> {{$task->admin->name}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <button type="button" onclick="window.location='{{ route("stats.index") }}'">Show Statistics</button>
    </body>
</html>
