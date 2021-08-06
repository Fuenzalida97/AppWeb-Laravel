@extends('dashboard.layout')

@section('content')
<?php
// detalles de la conexion
$conn_string = "host=localhost port=5432 dbname=agrinodb user=agrino password=123456 options='--client_encoding=UTF8'";
 
// establecemos una conexion con el servidor postgresSQL
$dbconn = pg_connect($conn_string);


//$conexion = mysql_connect("localhost", "root", "root");
pg_query("SET NAMES 'utf8'");

$resultado = pg_query("SELECT DISTINCT chipinfo_sector FROM info_sectores WHERE '1'");

?>
<form action="{{route('dashboard::graphics.respuestagraphicstemperatura_view')}}" method="POST">
{{ csrf_field() }}
  <select name="chipinfo_sector">
  <?php
    while ($row=pg_fetch_array($resultado))
      {
       echo "<option>";
        echo $row[0];
        echo "</option>";
      }
    pg_close($dbconn);
  ?>
  </select><br>
  <input type="date" name="fechainfo_sector" ><br>
  <input type="submit" name="Enviar" >
</form>
@stop