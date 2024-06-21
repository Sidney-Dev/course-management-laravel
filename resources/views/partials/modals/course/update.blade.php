<div class="modal fade" id="course{{ $course->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="course{{ $course->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="course{{ $course->id }}ModalLabel">Update Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            @include('partials.forms.course.update')
        </div>
    </div>
    </div>
</div>