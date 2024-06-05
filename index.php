<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Dynamic Loading</h1>
        </div>
        <div id="content">
            <form method="">
                <label for="">Country: </label>
                <select id="country">
                    <option value="">Select Country</option>
                </select>
                <br><br>
                <label for="">State: </label>
                <select id="state">
                    <option value="">Select State</option>
                </select>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            function loadData(type, category_id){
                $.ajax({
                    url: "load-cs.php",
                    type: "POST",
                    data: {type: type, id: category_id},
                    success: function(data){
                        if(type == "stateData"){
                            $("#state").html('<option value="">Select State</option>' + data);
                        }else{
                            $("#country").append(data);
                        }
                        
                    }
                });
            }
            loadData();

            $("#country").on("change", function(){
                let country = $("#country").val();
                loadData("stateData", country);
            });
        });
    </script>
    
    
</body>
</html>