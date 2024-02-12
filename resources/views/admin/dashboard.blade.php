@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('breadcums')
<h5 class="mb-0 _300">Hi Jone, Welcome back</h5>
<small class="text-muted">Awesome uikit for your next Material Design project</small>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box p-a">
            <div class="pull-left m-r">
                <span class="w-40 warn text-center rounded">
                    <i class="material-icons">shopping_basket</i>
                </span>
            </div>
            <div class="clear">
                <h4 class="m-0 text-md"><a href>75 <span class="text-sm">Sales</span></a></h4>
                <small class="text-muted">6 waiting payment.</small>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box-color p-a primary">
            <div class="pull-right m-l">
                <span class="w-40 dker text-center rounded">
                    <i class="material-icons">local_shipping</i>
                </span>
            </div>
            <div class="clear">
                <h4 class="m-0 text-md"><a href>40 <span class="text-sm">Orders</span></a></h4>
                <small class="text-muted">38 Shipped.</small>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box p-a">
            <div class="pull-right m-l">
                <span class="w-40 accent text-center rounded">
                    <i class="material-icons">people</i>
                </span>
            </div>
            <div class="clear">
                <h4 class="m-0 text-md"><a href>6,000 <span class="text-sm">Members</span></a></h4>
                <small class="text-muted">632 activities post.</small>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box-color p-a accent">
            <div class="pull-left m-r">
                <span class="w-40 dker text-center rounded">
                    <i class="material-icons">comment</i>
                </span>
            </div>
            <div class="clear">
                <h4 class="m-0 text-md"><a href>69 <span class="text-sm">Comments</span></a></h4>
                <small class="text-muted">5 approved.</small>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutter box">
    <div class="col-sm-8">
        <div class="box-header">
            <h3>Activities</h3>
            <small>Your last activity is posted 4 hours ago</small>
        </div>
        <div class="box-body">
            <div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
                [
                  { 
                    data: [[1, 6.1], [2, 6.3], [3, 6.4], [4, 6.6], [5, 7.0], [6, 7.7], [7, 8.3]], 
                    bars: { show: true, barWidth: 0.2, align: 'left', lineWidth: 1, fillColor: { colors: [{ opacity: 0.6 }, { opacity: 1}] } } 
                  },
                  { 
                    data: [[1, 5.5], [2, 5.7], [3, 6.4], [4, 7.0], [5, 7.2], [6, 7.3], [7, 7.5]], 
                    bars: { show: true, barWidth: 0.2, align: 'right', lineWidth: 1, fillColor: { colors: [{ opacity: 0.6 }, { opacity: 1}] } } 
                  }
                ], 
                {
                  colors: ['#0cc2aa','#fcc100'],
                  series: { shadowSize: 3 },
                  xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
                  yaxis:{ show: true, font: { color: '#ccc' }},
                  grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
                  tooltip: true,
                  tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
                }
              " style="height:200px">
            </div>
        </div>
    </div>
    <div class="col-sm-4 dker">
        <div class="box-header">
            <h3>Reports</h3>
        </div>
        <div class="box-body">
            <p class="text-muted m-b-md">Dales nisi nec adipiscing elit. Morbi id neque quam. Aliquam sollicitudin
                venenatis</p>
            <button class="md-btn md-raised m-b-sm p-x success">Read more</button>
        </div>
    </div>
</div>
@endsection