<x-app-layout>

    <div class="container">

        <div class="mt-3 mb-3 course-create-link">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseCreateModal">
                Create New
            </button>
            @include('partials.modals.course.create')
        </div>

        @if(count($courses) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{ $course->id }}</th>
                            <td>{{ $course->name }}</td>
                            <td>
                                <button type="button" class="btn" data-toggle="modal" data-target="#course{{ $course->id }}ViewModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                @include('partials.modals.course.view')
                            </td>
                            <td class="course-edit">
                                <button type="button" class="btn" data-toggle="modal" data-target="#course{{ $course->id }}Modal">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>

                                @include('partials.modals.course.update')
                            </td>
                            <td class="course-delete">
                                
                                @include('partials.forms.course.delete')
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>



</x-app-layout>
