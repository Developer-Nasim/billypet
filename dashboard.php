<?php
    session_start();
    include_once "header.php";

    if (!$_SESSION['user_name']) {
        header('location: login.php');
    }

    // u7cishq6mgylg
    // ,lk:f^$c*$c~
    // dbobifxby92xlm

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "sidahmed437";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);
    if (!$conn) {
        die('Connection Failed: '.mysqli_connect_error());
    }
    include_once "header.php";
    
    // Pets 
    $pets_sql = "select * from pet_form";  
    $pets_result = mysqli_query($conn, $pets_sql);   
    $pets_row = mysqli_fetch_all($pets_result, MYSQLI_ASSOC);  
    $pets_count = mysqli_num_rows($pets_result);
    // Faceless 
    $fcls_sql   = "select * from faceless";  
    $fcls_result= mysqli_query($conn, $fcls_sql);   
    $fcls_row   = mysqli_fetch_all($fcls_result, MYSQLI_ASSOC);  
    $fcls_count = mysqli_num_rows($fcls_result);

 

    if (!$_SESSION['user_name']) {
        header('location: login.php');
    }else{
?>

   
        <!-- dasboard -->
        <div class="dashboard">
            <div class="dash-header">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-4">
                            <div class="menu">
                                <ul>
                                    <li><a href="#" class="active">Poster <span><?php echo $pets_count + $fcls_count ?></span></a></li>
                                    <!-- <li><a href="#">Poster faceless <span>34</span></a></li>
                                    <li><a href="#">classic <span>34</span></a></li>
                                    <li><a href="#">revisions <span>2</span></a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="avater">
                                <div class="drpDn">
                                    <span>VA Dashboard</span>
                                    <ul>
                                        <li><a href="./incs/logout.php">logout</a></li> 
                                    </ul>
                                </div>
                                <img src="assets/img/avater.png" class="avater" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashbody">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <form action="#" class="searchForm">
                                <input type="text" placeholder="Search..." name="" id="search_rec">
                                <img src="assets/img/search.png" alt="">
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <div class="dtable">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Pets / Faceless</th>
                                            <th>Pets Figures</th>
                                            <th>Pictures</th>
                                            <th>Formate</th>
                                            <th>poster name</th>
                                            <th>notes</th>
                                            <th>size</th>
                                            <th>colour</th>
                                            <th>status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mytable">
                                        <?php   

                                            if ($pets_count > 0) { 
                                                foreach ($pets_row as $key => $value) {
                                                    $imgs = json_decode($pets_row[$key]["pet_file"]);
                                                    $kp     = "";
                                                    $kUl    = "";
                                                    $kbTn   = "";
                                                    foreach ($imgs as $key => $value) {
                                                        $src = 'assets/img/pets/'.$value.'';
                                                        $kp .= '
                                                        <span>  
                                                            <img src="'.$src.'" alt="">
                                                            <a href="'.$src.'" download="'.$src.'"><img src="assets/img/icons/download.png" alt=""></a>
                                                        </span>  
                                                        ';
                                                    }
                                                    if (isset($pets_row[$key]["introduction"]) && $pets_row[$key]["introduction"]) {
                                                        $kUl .= '<p>'.$pets_row[$key]["introduction"].'</p>';
                                                    }
                                                    if (isset($pets_row[$key]["status"]) && strtolower($pets_row[$key]["status"]) == "submit") {
                                                        $kbTn .= '<span class="sts success">'.$pets_row[$key]["status"].'</span>';
                                                    }else {
                                                        $kbTn .= '<span class="sts secondary">'.$pets_row[$key]["status"].'</span>';
                                                    }
                                                    echo ' 
                                                        <tr>
                                                            <td>'.$pets_row[$key]['user_name'].'</td>
                                                            <td>'.$pets_row[$key]['user_email'].'</td>
                                                            <td>Pet</td>
                                                            <td>'.$pets_row[$key]['pets'].'</td>
                                                            <td>
                                                                <div class="tImgsD">
                                                                '.$kp.' 
                                                                </div>
                                                            </td>
                                                            <td>'.$pets_row[$key]['order_amount'].'</td> 
                                                            <td>'.$pets_row[$key]['petname'].'</td>
                                                            <td>
                                                                <div class="nte">
                                                                    <?xml version="1.0" encoding="iso-8859-1"?>
                                                                    <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                        width="612px" height="612px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
                                                                    <g>
                                                                        <g id="_x39__36_">
                                                                            <g>
                                                                                <path d="M155.104,345.551L72.866,512.053c-6.904,18.742,8.09,35.534,26.833,26.832l166.387-82.295
                                                                                    c7.172-1.396,14.134-4.169,19.68-9.734l295.558-295.768c14.841-14.841,14.841-38.919,0-53.779l-67.167-67.225
                                                                                    c-14.841-14.841-38.9-14.841-53.741,0L164.838,325.852C159.292,331.417,156.5,338.379,155.104,345.551z M473.841,70.418
                                                                                    c7.421-7.421,19.45-7.421,26.871,0l40.296,40.334c7.421,7.42,7.421,19.469,0,26.89l-40.296,40.334l-66.211-68.18L473.841,70.418z
                                                                                    M406.196,138.121l67.645,66.747L258.876,419.966c-25.188-25.207-60.033-60.071-67.167-67.225L406.196,138.121z M225.407,440.238
                                                                                    l-102.739,62.232c-9.372,4.342-17.768-4.646-13.407-13.426l62.194-102.815L225.407,440.238z M573.75,229.5v306
                                                                                    c0,20.999-20.77,38.479-41.75,38.479H76.003c-20.98,0-38.001-17.021-38.001-38.021V79.656c0-21,17.519-41.406,38.499-41.406h306
                                                                                    V0h-306C34.521,0,0,37.657,0,79.656v456.303C0,577.957,34.023,612,76.003,612H532c41.979,0,80-34.502,80-76.5v-306H573.75z"/>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    <g>
                                                                    </g>
                                                                    </svg>
                                                                    Note
                                                                    '.$kUl.'
                                                                </div>
                                                            </td> 
                                                            <td>'.$pets_row[$key]['size'].'</td>
                                                            <td>'.$pets_row[$key]['color'].'</td> 
                                                            <td>'.$kbTn.'</td>
                                                        </tr>
                                                    ';
                                                }
                                            }
 
                                            if ($fcls_count > 0) {   
                                                foreach ($fcls_row as $key => $value) { 
                                                    $kps    = "";
                                                    $imges = json_decode($fcls_row[$key]["files"]);
                                                    $kUls  = "";
                                                    $kbTns = "";
                                                    if ($fcls_row[$key]["notes"]) {
                                                        $kUls .= '<p>'.$fcls_row[$key]["notes"].'</p>';
                                                    }
                                                    foreach ($imges as $k => $vlu) {
                                                        $srcs= 'assets/img/faceless/'.$vlu.'';
                                                        $kps .= '
                                                        <span>  
                                                            <img src="'.$srcs.'" alt="">
                                                            <a href="'.$srcs.'" download="'.$src.'"><img src="assets/img/icons/download.png" alt=""></a>
                                                        </span>  
                                                        ';
                                                    } 
                                                    if ($fcls_row[$key]["status"] == "submit") {
                                                        $kbTns .= '<span class="sts success">'.$fcls_row[$key]["status"].'</span>';
                                                    }else {
                                                        $kbTns .= '<span class="sts secondary">'.$fcls_row[$key]["status"].'</span>';
                                                    }
                                                    echo '<tr>
                                                        <td>'.$fcls_row[$key]['user_name'].'</td>
                                                        <td>'.$fcls_row[$key]['user_email'].'</td>
                                                        <td>Faceless</td>
                                                        <td>'.$fcls_row[$key]['characters'].'</td>
                                                        <td>
                                                            <div class="tImgsD">
                                                            '.$kps.'
                                                            </div>
                                                        </td> 
                                                        <td>'.$fcls_row[$key]['order_amount'].'</td>
                                                        <td></td>
                                                        <td>
                                                            <div class="nte">
                                                                <?xml version="1.0" encoding="iso-8859-1"?>
                                                                <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                    width="612px" height="612px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
                                                                <g>
                                                                    <g id="_x39__36_">
                                                                        <g>
                                                                            <path d="M155.104,345.551L72.866,512.053c-6.904,18.742,8.09,35.534,26.833,26.832l166.387-82.295
                                                                                c7.172-1.396,14.134-4.169,19.68-9.734l295.558-295.768c14.841-14.841,14.841-38.919,0-53.779l-67.167-67.225
                                                                                c-14.841-14.841-38.9-14.841-53.741,0L164.838,325.852C159.292,331.417,156.5,338.379,155.104,345.551z M473.841,70.418
                                                                                c7.421-7.421,19.45-7.421,26.871,0l40.296,40.334c7.421,7.42,7.421,19.469,0,26.89l-40.296,40.334l-66.211-68.18L473.841,70.418z
                                                                                M406.196,138.121l67.645,66.747L258.876,419.966c-25.188-25.207-60.033-60.071-67.167-67.225L406.196,138.121z M225.407,440.238
                                                                                l-102.739,62.232c-9.372,4.342-17.768-4.646-13.407-13.426l62.194-102.815L225.407,440.238z M573.75,229.5v306
                                                                                c0,20.999-20.77,38.479-41.75,38.479H76.003c-20.98,0-38.001-17.021-38.001-38.021V79.656c0-21,17.519-41.406,38.499-41.406h306
                                                                                V0h-306C34.521,0,0,37.657,0,79.656v456.303C0,577.957,34.023,612,76.003,612H532c41.979,0,80-34.502,80-76.5v-306H573.75z"/>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                </svg>
                                                                Note
                                                                '.$kUls.'
                                                            </div>
                                                        </td>
                                                        <td>'.$fcls_row[$key]['size'].'</td>
                                                        <td>'.$fcls_row[$key]['color'].'</td> 
                                                        <td>'.$kbTns.'</td>
                                                    </tr> ';
                                                    
                                                }
                                            } 
                                        ?>  
                                    </tbody>
                                </table>
                                    <?php
                                        
                                        if ($fcls_count == 0 && $pets_count == 0) {
                                            echo "<p class='text-center mt-5' style='color:red'>No Data</p>";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- dasboard -->


        
    

<?php
            }

    include_once "footer.php";
?>