@extends('layouts.app')

@section('custom_styles')
@endsection

@section('content')
    <div class="page-body">
        <div class="container-xl">

            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Make a
                        </div>
                        <h2 class="page-title">
                            Lesson Observation
                        </h2>
                    </div>

                </div>
            </div>

            @include('layouts.notification')

            <div class="page-body">

                <form action="{{ route('lesson.update', $lesson->id) }}" method="POST">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Lesson Observation Form</h3>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')

                            {{-- Information about the form --}}

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card-style mb-30">
                                        <h6 class="mb-25">Teacher Details</h6>
                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" name="teachers_id"
                                                    aria-label="Floating label select example">
                                                    <option selected="">Please select a teacher's name</option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}" {{ $teacher->id == $lesson->teachers_id ? "selected" : "" }}>{{ $teacher->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="floatingSelect">Teacher's Name</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingSelect"
                                                            name="student_classes_id" name="teachers_id"
                                                            aria-label="Floating label select example">
                                                            <option selected="">Please select the class being observed
                                                            </option>
                                                            @foreach ($classes as $class)
                                                                <option value="{{ $class->id }}" {{ $class->id == $lesson->student_classes_id ? "selected" : "" }}>Year
                                                                    {{ $class->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="floatingSelect">Class Taught</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="floatingSelect" name="stream"
                                                            name="teachers_id" aria-label="Floating label select example">
                                                            <option selected="">Select stream</option>
                                                            <option value="A" {{ $lesson->stream == "A" ? "selected" : "" }}>A</option>
                                                            <option value="B" {{ $lesson->stream == "B" ? "selected" : "" }}>B</option>
                                                        </select>
                                                        <label for="floatingSelect">Stream</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-style mb-30">
                                        <h6 class="mb-25">Lesson Details</h6>
                                        <div class="row">


                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" name="subjects_id"
                                                    aria-label="Floating label select example">
                                                    <option selected="">Please select the subject</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}" {{ $subject->id == $lesson->subjects_id ? "selected" : "" }}>{{ $subject->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="floatingSelect">Select Subject</label>
                                            </div>
                                            <!-- end col -->
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floating-input" value="{{ $lesson->topic }}" name="topic"
                                                    autocomplete="off">
                                                <label for="floating-input">Topic</label>
                                            </div>
                                            {{-- end of topic --}}
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                        </div>
                    </div>
                    <ol class="p-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Level of organization of schemes of work</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="scheme">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->scheme == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Prepared course outlines with well-listed learning objectives</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="course_outline">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->course_outline == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Learning objectives communicated at the start of the lesson</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="learning_objectives">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->learning_objectives == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Teacher's knowledge of the subject</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="knowledge">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->knowledge == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Knowledge made relevant and interesting to learners</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="relevant">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->relevant == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Teacher exuding confidence in learners via physical outlook: dress
                                                    code/manners</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="dressing">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}"  {{ $lesson->dressing == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Teacher issues assignments</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="assignments">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}"  {{ $lesson->assignments == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Organization of Students’ notes</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="notes">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}"  {{ $lesson->notes == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Teacher’s ability to control class</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="class_control">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->class_control == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Evidence of constant evaluations (tests and cats) to learners</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="evaluation">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->evaluation == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Evidence of issuance of feedback to learners</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="feedback">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->feedback == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Students were praised regularly for their good effort and achievement
                                                </li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="praised">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->praised == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Prompt action is taken to address poor behaviour</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="poor_behaviour">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->poor_behaviour == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Learner engagement throughout the lesson</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="learner_engagement">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->learner_engagement == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>Time well utilized throughout the lesson</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="time_utilisation">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}"  {{ $lesson->time_utilisation == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="form-label col-8 col-form-label">
                                                <li>The quantity of written work/notes meeting the demands of CIAE</li>
                                            </label>
                                            <div class="col">
                                                <select class="form-select" name="caie_demands">
                                                    <option value="">Select</option>
                                                    @foreach ($options as $option)
                                                        <option value="{{ $option->mark }}" {{ $lesson->caie_demands == $option->mark ? "selected" : "" }}>{{ $option->description }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Textarea</label>
                                            <textarea class="form-control" name="comment" rows="6" placeholder="Comment" id="editor"
                                                spellcheck="false">{{ $lesson->comment }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </ol>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
