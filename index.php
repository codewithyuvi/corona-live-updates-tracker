<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Corona Live Updates Tracker</title>
   
  </head>

  <body>

  <?php include "header.php" ?>
  <section class="corona_update container-fluid">
    <div class="my-5">
      <h3 class="text-center text-uppercase">
        COVID 19 LIVE UPDATES OF INDIA
      </h3>
    </div>
    <div class="table-responsive">


      <table class="table table-bordered table-stripped text-center">
        <tr id="table_header">
          <th class="text-capitalize">Last Updated Time</th>
          <th class="text-capitalize">state</th>
          <th class="text-capitalize">confirmed</th>
          <th class="text-capitalize">active</th>
          <th class="text-capitalize">recovered</th>
          <th class="text-capitalize">Deaths</th>
        </tr>

<?php 

    $data = file_get_contents('https://api.covid19india.org/data.json');
    $coronaLive = json_decode($data, true);
    // echo "<pre>";

    // print_r($coronaLive);

    // echo "</pre>";

    $statesCount = count($coronaLive['statewise']);
    // echo $coronaLive['statewise'][1]['state'];

    $i = 1;
    while($i < $statesCount){

      ?>

    <tr>

      <td> <?php  echo $coronaLive['statewise'][$i]['lastupdatedtime']?> </td>
      <td> <?php  echo $coronaLive['statewise'][$i]['state']?> </td>
      <td> <?php  echo $coronaLive['statewise'][$i]['confirmed']?> </td>
      <td> <?php  echo $coronaLive['statewise'][$i]['active']?> </td>
      <td> <?php  echo $coronaLive['statewise'][$i]['recovered']?> </td>
      <td> <?php  echo $coronaLive['statewise'][$i]['deaths']?> </td>
    
    </tr>

      <?php
      $i++;
    }
?>


      </table>


    </div>
  </section>
  <?php include "footer.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


  </body>
</html>