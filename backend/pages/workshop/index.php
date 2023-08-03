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
                            <h1 class="m-0">Data Workshop</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Workshop</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                   <?php 
                        $datas = $dataObj->getWorkshop("data");
                        // echo "<pre>";
                        // print_r($datas);
                        // echo"</pre>";
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">ข้อมูล workshop ทั้งหมด</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ที่</th>
                                                <th>ชื่อ workshop</th>
                                                <th>รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=0;
                                                foreach($datas as $data){
                                                    $i++;
                                                    echo "
                                                        <tr>
                                                            <td>{$i}</td>
                                                            <td>{$data['w_name']}</td>
                                                            <td>{$data['w_detail']}</td>
                                                        </tr>
                                                    ";
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </section>
           <br>
           <br>
           <br>
           <br>
           <br>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
           
        </aside>
       
    </div>
    <!-- ---------  -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/footer.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/script.php"; ?>
</body>

</html>