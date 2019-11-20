
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/game.css">
        <script src="js/game.js"></script>
        <title>Tres en Raya</title>
	</head>    
	<body>        
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h5>User: <span id='user' data-user='blue'></span></h5>
                </div>
                <div class="col-10">
                    <table id="table" class="table-responsive table-bordered">
                        <tr>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='1' data-row='1'></td>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='2' data-row='1'></td>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='3' data-row='1'></td>
                        </tr>
                        <tr>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='1' data-row='2'></td>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='2' data-row='2'></td>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='3' data-row='2'></td>
                            
                        </tr>
                        <tr>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='1' data-row='3'></td>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='2' data-row='3'></td>
                            <td><img class='element' src="images/empty.png" alt="" data-pieze='empty' data-col='3' data-row='3'></td>
                        </tr>
                    </table>   
                </div>
            </div>  
        </div>    
    </body>
</html>
