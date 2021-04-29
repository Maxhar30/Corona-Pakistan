<?php
$curl =  curl_init();
$url = "https://api.covid19api.com/live/country/pakistan/status/confirmed";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($curl);
if (curl_error($res)) {
    echo $res;
} else {
    $data = json_decode($res, true);
    $arry_size = count($data);
    $resp = array_slice($data, -6, 6, true);
    $array_sort = array_reverse($resp);
}
curl_close($curl);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Corona Report</title>
</head>

<body style="background-color: #ECECEC;">
    <main class="mt-5 container h-100">
        <center>
            <h1 style="color:red">Corona Report Pakistan</h1>
        </center>

        <div class="row mt-5">
            <!-- card start -->
            <?php
            $result = [];

            foreach ($array_sort as $key) {
            ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <h3><?php echo $key['Province']; ?></h3>
                            </div>
                            <br>
                            <br><br><br>
                            <h3 class="card-title"><span class="card-category">Active Cases :</span> <?php echo $key['Active']; ?></h3>
                            <hr>
                            <h3 class="card-title"><span class="card-category">Confirmed :</span> <?php echo $key['Confirmed']; ?></h3>
                            <hr>
                            <h3 class="card-title"><span class="card-category">Deaths :</span> <?php echo $key['Deaths']; ?></h3>
                            <hr>
                            <h3 class="card-title"><span class="card-category">Recovered :</span> <?php echo $key['Recovered']; ?></h3>

                        </div>
                        <div class="card-footer">
                            Last 24 hours
                        </div>
                    </div>
                </div>
                <!-- card end -->
            <?php  }
            ?>
        </div>
        <main>
            <footer>Code by <a href="https://github.com/Maxhar30">Mazhar Hussain</footer>
</body>

</html>