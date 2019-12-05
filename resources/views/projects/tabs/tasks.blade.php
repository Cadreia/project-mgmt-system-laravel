@if ($tasksCount >= 1)
<div class="col-md-6 mx-auto">
    <h2 class="text-center">Tasks</h2><hr>
</div>
@else
    <h4 class="text-center mt-4 mb-3">There are no tasks for this project.</h4>
    <div class="d-flex justify-content-center">
    <a class="btn btn-primary" href="{{ route('tasks.create', [$project->id]) }}">Add one</a>
</div>
<hr>
@endif

<!-- List of Tasks -->
<div class="row">
@foreach ($tasks as $task)
    <div class="col-md-4">
        <h3>{{ $task->name }}</h3>
        <p>{{ $task->description }}</p>
        <p>Days: {{ $task->days }}</p>
        <p>Hours: {{ $task->hours }}</p>
        <p><a class="btn btn-secondary btn-sm" href="/tasks/{{ $task->id }}" role="button">View details »</a></p>
    </div>
@endforeach

</div>