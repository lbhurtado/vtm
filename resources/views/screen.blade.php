<html>
    <head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VCM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
			body {margin:0;padding:0;height:100%;}
			div.topdiv {clear:both;position:fixed;top:0;height:10%;width:100%;color:#FFFFFF;font-size:16px;text-align:center;}
			div.bottomdiv {clear:both;position:fixed;bottom:0;height:90%;width:100%;color:#FFFFFF;font-size:16px;text-align:center;}​
        </style>
    </head>
    <body>
		<div style="height:100%">
			<div class="topdiv">
				<iframe src="{{route('status', $ballot)}}" width="100%" height="100%"></iframe>
			</div>
			<div class="bottomdiv">
				<iframe src="{{route('electronic-ballot', $ballot)}}" width="25%" height="100%"></iframe>
				<iframe src="{{route('physical-ballot', $ballot)}}" width="48%" height="100%"></iframe>
				<iframe src="/tally" width="25%" height="100%"></iframe>
			</div>
		</div>

    </body>
</html>