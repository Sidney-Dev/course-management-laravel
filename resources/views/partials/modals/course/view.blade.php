<div class="modal fade" id="course{{ $course->id }}ViewModal" tabindex="-1" role="dialog" aria-labelledby="course{{ $course->id }}ViewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-body">

            <h3><strong>Course Name:</strong> {{ $course->name }}</h3>

            <div class="image-container mt-3">
                <label><strong>Course Image</strong></label>
                <img class="img-responsive" src="{{ asset("storage/images/course/{$course->id}/{$course->image}") }}" class="card-img" alt="{{ $course->name }}">
            </div>
            
        </div>
    </div>
    </div>
</div>