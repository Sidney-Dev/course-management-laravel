<form action="{{ route('courses.destroy', $course->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this course?');">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn"><i class="fa-solid fa-trash danger"></i></button>
</form>