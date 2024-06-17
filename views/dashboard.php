

<div class="row">
    <img src="./assets/img/logo.jpg"; class="mx-auto d-block img-tumbnail" width="500px">
</div>

<br>

<!--
<div class="row">
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-olive elevation-1"><i class="fas fa-hand-holding-usd"></i></span>
<div class="info-box-content">
<span class="info-box-text">Ventas de Hoy</span>
<span class="info-box-number">
$10,000

</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-box"></i></span>
<div class="info-box-content">
<span class="info-box-text">Productos</span>
<span class="info-box-number">
12
<small>Disponibles</small>
</span>
</div>

</div>

</div>-->

<!--
<div class="card card-outline card-secondary">
<div class="card-header">
<h3 class="card-title">Ventas</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body">
<canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>-->




</div>

</div>
</div>



<script>

 $(function(){

    

//-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

});


</script>




















<!--
<div class="row">

<div class="col-lg-3 col-6">
<div class="small-box bg-olive">
<div class="inner">
<h3>150</h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-lightblue">
<div class="inner">
<h3>150</h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-secondary">
<div class="inner">
<h3>150</h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
<h3>150</h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>


</div>-->