<div class="pb-3">
    <label class="form-label" for="name">Name</label>
    <input class="form-control" type="text" name="name" value="{{isset($event) ? $event->name : ''}}" required>
</div>
<div class="pb-3">
    <label class="form-label" for="slug">Slug</label>
    <input class="form-control" type="text" name="slug" value="{{isset($event) ? $event->slug : ''}}" required>
</div>
<div class="pb-3">
    <label class="form-label" for="start_date">Start Date</label>
    <input class="form-control" type="datetime-local" name="start_date" value="{{isset($event) ? $event->start_date : ''}}" required>
</div>
<div class="pb-3">
    <label class="form-label" for="end_date">End Date</label>
    <input class="form-control" type="datetime-local" name="end_date" value="{{isset($event) ? $event->end_date : ''}}" required>
</div>

<button class="btn btn-primary" type="submit">Submit</button>
<a class="btn btn-warning" href="{{ route('events.index') }}">Back</a>
