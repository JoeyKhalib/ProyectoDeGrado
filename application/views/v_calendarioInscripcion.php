<div class="content-wrapper">
<div class="container">
  <div class="row">
    <div class="col-md-12">

<br>
<div class="card-header bg-white">
 <h3 class="card-title ">Lista de Dias:</h3>
</div>

<div id='calendar'></div>

    <?php 
$lista=$lista->result();
echo $nombresJugador=$row->nombresJugador;
         ?>
	

  <script>
    $(document).ready(function() {

      $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
          },
        option:{
          locale : "es"
        },
        defaultDate: new Date(),
        events: '<?php echo site_url("jugador/pagoVista");?>',
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
</div>