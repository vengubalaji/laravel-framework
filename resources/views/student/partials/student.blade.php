{{-- @break($key == 2) --}}
{{-- @continue($key == 1) --}}
<tr>
    <td>{{ $student->roll_no }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->email }}</td>
    <td>
        <div class="action"><a href="{{ route('student.show', ['student' => $student->id]) }}">VIEW</a></div>
        <div class="action"><a href="{{ route('student.edit', ['student' => $student->id]) }}">EDIT</a></div>
        <div class="action">
            <form action="{{ route('student.destroy', ['student' => $student->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="DELETE" />
            </form>
        </div>
    </td>
</tr>