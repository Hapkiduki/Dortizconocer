@extends('layouts.app')

@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="pageTitle">Mis Citas</h2>
            </div>
        </div>
    </div>
</section>
<div class="container" id="content">
    <div class="row">
        <div id='calendar'></div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/fullcalendar-3.7.0/lib/jquery-ui.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar-3.7.0/lib/moment.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar-3.7.0/fullcalendar.min.js')}}"></script>
<script src="{{ asset('plugins/fullcalendar-3.7.0/locale/es.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#calendar').fullCalendar({
            locale: 'es',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            events: "my_current_appointments"
        })
    });

</script>
@endpush