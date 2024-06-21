<form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="nameFeedBack" placeholder="Course name">
        @error('name')
            <div id="nameFeedBack" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3" id="file_input_div">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
   
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>