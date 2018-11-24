@extends('dashboard.template')

@section('title', 'Home')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Traffic</h4>
                    <p class="category">Detail Web Traffic</p>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="chart-1-container"></div>
                            </div>

                            <div class="col-md-6">
                                <div id="chart-2-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@php
    $KEY_FILE_LOCATION = public_path(Storage::url("masterpieceits-8f6807a457b3.json"));
    $acc = new \Google\Auth\Credentials\ServiceAccountCredentials(['https://www.googleapis.com/auth/analytics.readonly'],$KEY_FILE_LOCATION);
    $authToken = $acc->fetchAuthToken();
    $access_token = $authToken["access_token"];
@endphp 
<script>
(function(w,d,s,g,js,fs){
    g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
    js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
    js.src='https://apis.google.com/js/platform.js';
    fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>

<script>
    gapi.analytics.ready(function() {
        
      gapi.analytics.auth.authorize({
        'serverAuth': {
          'access_token': '{{ $access_token }}'
        }
      });
    
      var dataChart1 = new gapi.analytics.googleCharts.DataChart({
        query: {
          'ids': 'ga:185180615',
          'start-date': '30daysAgo',
          'end-date': 'yesterday',
          'metrics': 'ga:sessions,ga:users',
          'dimensions': 'ga:date'
        },
        chart: {
          'container': 'chart-1-container',
          'type': 'LINE',
          'options': {
            'width': '100%'
          }
        }
      });
      dataChart1.execute();
    
      var dataChart2 = new gapi.analytics.googleCharts.DataChart({
        query: {
          'ids': 'ga:185180615',
          'start-date': '30daysAgo',
          'end-date': 'yesterday',
          'metrics': 'ga:pageviews',
          'dimensions': 'ga:pagePathLevel1',
          'sort': '-ga:pageviews',
          'filters': 'ga:pagePathLevel1!=/',
          'max-results': 7
        },
        chart: {
          'container': 'chart-2-container',
          'type': 'PIE',
          'options': {
            'width': '100%',
            'pieHole': 4/9,
          }
        }
      });
      dataChart2.execute();
    
    });
    </script>
@endsection
