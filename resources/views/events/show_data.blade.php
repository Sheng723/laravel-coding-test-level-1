@extends('layouts.event_layout')

@section('title')
    Events
@endsection
@section('header_script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        const allEventData = {!! json_encode($events) !!};
        let filteredData = [];

        allEventData.forEach(eventData => {
            filteredData.push(
                [eventData.name, eventData.slug, eventData.start_date, eventData.end_date]);
        });

        console.log(filteredData);
        google.charts.load('current', {
            'packages': ['table']
        });
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            const data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('string', 'Slug');
            data.addColumn('string', 'Start Date');
            data.addColumn('string', 'End Date');
            data.addRows(filteredData);

            const table = new google.visualization.Table(document.getElementById('show-events-table'));

            table.draw(data, {
                showRowNumber: true,
                width: '100%',
                height: '100%'
            });
        }
    </script>
@endsection
@section('content')
    <div class="event-section container py-3">
        <h1 class="title pb-3">Events</h1>
        <div class="events-table-container overflow-auto">
            <table class="table table-striped table-bordered" id="show-events-table">
            </table>
        </div>
    </div>
@endsection
