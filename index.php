<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>

.card{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 35%;
    margin-left: auto; 
    margin-right: auto;
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.container{
    padding: 2px 16px;
}

.fill {
    text-align: center;
}

.fill input[type="text"]
{
    border:0.5px solid rgb(126, 126, 126);
    height: 30px;
    border-radius: 5px;
    text-align: center;
    width: 120px;

}
#check{
    background-image: linear-gradient(to right,red ,yellow);
}
</style>


<body>
    
    <div class="card">
        <img src="https://img4.tnews.co.th/userfiles/images/131202.jpg" alt="Avatar" style="width: 100%; height: 100%; border-radius: 10px 10px 0 0;">
        <div class="container">
            <h2 style="text-align: center; padding-top: 10px;">Check the Weather</h2>
            <div class="fill">
                <input type="text" id="lattitude"  placeholder="Lattitude">
                <input type="text" id="longtitude"  placeholder="Longtitude">
                <button id="check" class="btn btn-primary btn-sm" style="width: 100px; height: 35px;  border: none; color: white; border-radius: 5px;">CHECK</button>
            </div>

            <div class="weatherdata" >
                <h3 style="padding-top: 20px;">Location : <span id="name" ></span></h3>
                <span id="country" >Country : </span> <br>
                <span id="temp">Temperature : </span> °C<br>
                <span id="humidity">Humidity : </span> %<br>
                <span id="sunrise">Sunrise : </span> <br>
                <span id="sunset">Sunset : </span> <br>
                <span id="wind">Wind Speed : </span> m/s <br>
                <span id="date">Date : </span>
              

            </div>

            <div class="search">
                <h3>Location : <span id="s_name" ></span></h3>
                Country :<span id="s_country" >Country : </span> <br>
                Temperature :<span id="s_temp">Temperature : </span> °C<br>
                Humidity :<span id="s_humidity">Humidity : </span> %<br>
                Sunrise :<span id="s_sunrise">Sunrise : </span> <br>
                Sunset :<span id="s_sunset">Sunset : </span> <br>
                Wind Speed :<span id="s_wind">Wind Speed : </span> m/s <br>
                Date :<span id="s_date">Date : </span>
            </div>

            </div>
        </div>

    <script>
        
        function loadweather(){
            $(".search").hide();
            var url ="https://api.openweathermap.org/data/2.5/weather?lat=8.34661&lon=99.98064&appid=a8a6858c3f85353ae7a036f9ba7aa9b4&units=metric";
            var d = new Date();
            $.getJSON(url)
            .done((data)=>{
                console.log(data)
                console.log(Date());
                $("#name").append(data.name);
                $("#country").append(data.sys.country);
                $("#temp").append(data.main.temp);
                $("#humidity").append(data.main.humidity);
                $("#sunrise").append(data.sys.sunrise);
                $("#sunset").append(data.sys.sunset);
                $("#wind").append(data.wind.speed);
                $("#date").append(Date());

            })
            .fail((xhr,status,err)=>{
                    console.log("error");
            });
        }

        function search(){
            $(".weatherdata").hide();
            $(".search").show();
            var url = "https://api.openweathermap.org";
            var lat = $("#lattitude").val();
            var lon = $("#longtitude").val();
           
            url = url + "/data/2.5/weather?lat=" + lat + "&lon=" + lon +"&appid=a8a6858c3f85353ae7a036f9ba7aa9b4&units=metric";
                $.getJSON(url)
                .done((data)=>{
                    console.log(data)
                        $("#s_name").append(data.name);
                        $("#s_country").append(data.sys.country);
                        $("#s_temp").append(data.main.temp);
                        $("#s_humidity").append(data.main.humidity);
                        $("#s_sunrise").append(data.sys.sunrise);
                        $("#s_sunset").append(data.sys.sunset);
                        $("#s_wind").append(data.wind.speed);
                        $("#s_date").append(data.sys.Date);
                    })

                    .fail((xhr,status,err)=>{
                    console.log("error");
            });
        }

        function remove(){
            $("#s_name").empty();
            $("#s_country").empty();
            $("#s_temp").empty();
            $("#s_humidity").empty();
            $("#s_sunrise").empty();
            $("#s_sunset").empty();
            $("#s_wind").empty();
            $("#s_date").empty();
        }

    

        $(()=>{
            loadweather();
            $("#check").click(()=>{
                search();
            });
            $("#check").click(()=>{
               remove();
            });
        });


    </script>
</body>
</html>
