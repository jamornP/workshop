<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>
    <!-- -------- -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/link.php"; ?>
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
                            <h1 class="m-0">Student</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Student</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                   <?php 
                    $datas = $dataObj->getStudentByRole("student") ;
                    // echo "<pre>";
                    // print_r($datas);
                    // echo"</pre>";
                   ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">ข้อมูล Student ทั้งหมด</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ที่</th>
                                                <th>ชื่อ</th>
                                                <th>นามสกุล</th>
                                                <th>โรงเรียน</th>
                                                <th>email</th>
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
                                                            <td>{$data['s_name']}</td>
                                                            <td>{$data['s_surname']}</td>
                                                            <td>{$data['s_school']}</td>
                                                            <td>{$data['s_email']}</td>
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
           
        </div>
        <aside class="control-sidebar control-sidebar-dark">
           
        </aside>
       
    </div>
    <!-- ---------  -->
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/footer.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/workshop/backend/components/script.php"; ?>
</body>

</html>