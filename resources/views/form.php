<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><h4>Upload Video</h4></div>
                <form action="/video" enctype="multipart/form-data" method="post">
					<p><input type="file" name="video_file"></p>
  					<p><button type="submit">Upload</button></p>
                </form>
            </div>
        </div>
    </body>
</html>
