<?php
    echo $this->Html->css(array('/js/fullcalendar/fullcalendar'));
    echo $this->Html->script(array('fullcalendar/lib/moment.min'));
    echo $this->Html->script(array('fullcalendar/fullcalendar'));
?>

<div class="row">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-calendar-o"></i> &nbsp; Calendar
        </h3>
    </div>
    <div class="panel-body">
        <div id='h_calendar'></div>
    </div>
</div>
</div>

<script>

	$(document).ready(function() {
		
		$('#h_calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '<?php echo date('Y-m-d'); ?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo $calender_event; ?>
		});
		
	});

</script>