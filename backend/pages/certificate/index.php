<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>
    <!-- -------- -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/link.php"; ?>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
       
        <!-- ----- -->
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/load.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/menu_left.php"; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/navbar.php"; ?>
       
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Create Certificate</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Certificate</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <?php
                    $data = $dataObj->getWorkshopAll("data");
                    // print_r($data);
                    foreach($data as $w){
                       
                        // echo "<br>";
                        $student = $dataObj->getDataByWId("data", $w['wd_id']);
                        if(count($student)>0){
                            echo "<h3>{$w['w_name']}</h3>";
                        ?>
                            <table id="" class="table table-bordered table-striped">
                               <thead>
                                   <tr>
                                       <th>num</th>
                                       <th>title</th>
                                       <th>name</th>
                                       <th>surname</th>
                                       <th>school</th>
                                       <th>file_cer</th>
                                       <th>date_at</th>
                                       <th>project</th>
                                       <th>award</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    <?php 
                                        $i=0;
                                        foreach($student as $st){
                                            $i++;
                                            echo "
                                                <tr>
                                                    <td>{$i}</td>
                                                    <td></td>
                                                    <td>{$st['s_name']}</td>
                                                    <td>{$st['s_surname']}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{$st['wd_date']}</td>
                                                    <td>{$st['w_name']}</td>
                                                    <td>ได้เข้าร่วม</td>
                                                </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                       }
                    }
                    ?>
                   
                </div>
            </section>
           
        </div>
        <aside class="control-sidebar control-sidebar-dark">
           
        </aside>
       
    </div>
    <!-- ---------  -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/footer.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/script.php"; ?>
</body>

</html>