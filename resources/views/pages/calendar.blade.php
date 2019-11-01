@extends('layouts.inner')

@section('title', 'Task')

@section('header', 'Calendar ')

@section('sub_header', 'le calendrier')
@section('css')
<style>

</style>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.systemCalendar') }}
    </div>

    <div class="card-body">
        <div id="m_calendar"></div>
    </div>
</div>
@endsection

@section('javascript')
@parent
<script>

    $(document).ready(function () {

        var calendarInit = function () {
            if ($('#m_calendar').length === 0) {
                return;
            }
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');
            let events = {!! json_encode($events) !!};

            $('#m_calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                defaultDate: moment(),
                events: events,

                eventRender: function (event, element) {
                    if (element.hasClass('fc-day-grid-event')) {
                        element.data('content', event.description);
                        element.data('placement', 'top');
                        mApp.initPopover(element);
                    } else if (element.hasClass('fc-time-grid-event')) {
                        element.find('.fc-title').append('<div class="fc-description">' + event.description + '</div>');
                    } else if (element.find('.fc-list-item-title').lenght !== 0) {
                        element.find('.fc-list-item-title').append('<div class="fc-description">' + event.description + '</div>');
                    }
                }
            });
        }

        calendarInit();
        });


</script>
@endsection

