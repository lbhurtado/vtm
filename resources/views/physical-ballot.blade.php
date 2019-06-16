<html>
    <head>
        <title>Physical Ballot</title>
        <style>
	        * {
	            margin: 0;
	            padding: 0;
	        }
	        .imgbox {
	            display: grid;
	            height: 100%;
	        }
	        .center-fit {
	            max-width: 100%;
	            max-height: 100vh;
	            margin: auto;
	        }
        </style>
    </head>
    <body>
		<div class="imgbox">
		    <img class="center-fit" src="{{ asset($ballot->image) }}">
		</div>
    </body>
</html>