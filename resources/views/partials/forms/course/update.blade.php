<form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" placeholder="course Name"/>
    </div>

    <div class="mb-3 mt-3" id="file_input_div">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>