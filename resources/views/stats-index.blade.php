<!DOCTYPE html>
    <body class="antialiased">
    <table border="1">
        <thead>
        <tr>
            <th> User Name</th>
            <th> Number Of Tasks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stats as $stat)
            <tr>
                <td> {{$stat->user->name}} </td>
                <td> {{$stat->tasks_no}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>

    <button type="button" style="background: darkslateblue;font-weight: bold;padding: 10px; color: #9ca3af" onclick="window.location='{{ route("tasks.create") }}'">Home</button>

</body>
</html>
