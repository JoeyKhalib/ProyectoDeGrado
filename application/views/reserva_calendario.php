<div class="content-wrapper">
<div class="container">
  <div class="row">
    <div class="col-md-12">

<br>
<div class="card-header bg-white">
 <h3 class="card-title ">Lista de Reservas:</h3>
 <div class="card-tools">
<a href="<?php echo base_url();?>index.php/invitado/reservasCanchasOpcion">
  <button class="btn btn-success btn-block">Crear Reserva</button>
</a>
</div>
</div>



<div id='calendar'></div>

<?php 
foreach ($registroCanchitas as $row) {
 ?>


<input type="hidden" id="id" name="id" value="<?php echo $row->id;?>;">
<input type="hidden" id="start" name="start" value="<?php echo $row->start;?>;">

 <?php
}
 ?>



<script>

  $(document).ready(function() {
  		var id= $('#id').val();
    	var start=$('#start').val();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'listDay,listWeek,month'
      },

      views: {
        listDay: { buttonText: 'Dia' },
        listWeek: { buttonText: 'Semana' }
      },

      defaultView: 'listWeek',
      defaultDate: new Date(),
      events:  [ {
      	  id:id,
          start: start,
          backgroundColor:'green'
          }],
    });

  });

</script>

    <style>
      #calendar{
        width: 800px;
        margin: 0px auto;
      }

    </style>





</div>
</div>
</div>
</div>