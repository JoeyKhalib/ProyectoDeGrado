<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <!-- Calendario -->
  <script src="<?php echo base_url();?>assets/plugins/fullcalendar-3.9.0/lib/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/fullcalendar-3.9.0/lib/jquery-ui.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/fullcalendar-3.9.0/lib/moment.min.js"></script>
  <!-- mostrandoCalendario -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fullcalendar-3.9.0/fullcalendar.min.css">
  <script src="<?php echo base_url();?>assets/plugins/fullcalendar-3.9.0/fullcalendar.min.js"></script>
  <!-- Traduccion al español -->
  <script src="<?php echo base_url();?>assets/plugins/fullcalendar-3.9.0/locale/es.js"></script>

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
        events: '<?php echo site_url("calendario/getEventos");?>',
      });
    });
  </script>

    <style>
      #calendar{
        width: 800px;
        margin: 0px auto;
      }

    </style>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">





