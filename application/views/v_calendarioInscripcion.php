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
foreach ($inscritos->result() as $row) {
 ?>


<input type="hidden" id="id" name="id" value="<?php echo $row->id;?>;">
<input type="hidden" id="start" name="start" value="<?php echo $row->start;?>;">
<input type="hidden" id="end" name="end" value="<?php echo $row->end;?>;">
<input type="hidden" id="title" name="title" value="<?php echo $row->title;?>;">

 <?php
}
 ?>


  <script>
    $(document).ready(function() {
    	var id= $('#id').val();
    	var start=$('#start').val();
    	var end=$('#end').val();
    	var title=$('#title').val();
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
        events: [ {
          id:id,
          title: title,
          start: start,
          end:end,
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
</div>