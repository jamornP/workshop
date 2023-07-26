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
                        $datas = $dataObj->getMember("data");
                        echo "<pre>";
                        print_r($datas);
                        echo"</pre>";
                        // $i=0;
                        // foreach($datas as $m){
                        //     $i++;
                        //     // echo $m['title']."<br>";
                        //     $title = $dataObj->getIdTitle($m['title']);
                        //     $data['s_email'] = $m['email'];
                        //     $data['s_password'] = $m['password'];
                        //     $data['ti_id'] = $title;
                        //     $data['s_name'] = $m['firstname'];
                        //     $data['s_surname'] = $m['lastname'];
                        //     $data['s_school'] = $m['school'];
                        //     $data['s_tel'] = $m['phone'];
                        //     $data['role'] = "student";

                            
                        //     // $ckadd = $authObj->addUser2($data);
                        //     // echo $i.". ".$ckadd."<br>";
                        //     // print_r($data);
                        //     // echo "<br>";
                        //     // echo "<pre>";
                        //     // print_r($data);
                        //     // echo"</pre>";

                        // }
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