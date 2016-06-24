<?php
require( '../wp-load.php' );
get_header('labro');

?>

<?php 

//If the form is submitted
if(isset($_POST['submit'])) {

    //Check to make sure that the name field is not empty and is an integer
    if(trim($_POST['pn']) == '' && !is_int(trim($_POST['pn']))) {
        $hasError = true;
    } else {
        $pn = trim($_POST['rn']);
    }

    //Check to make sure that the subject field is not empty and is an integer
    if(trim($_POST['rn']) == '' && !is_int(trim($_POST['rn']))) {
        $hasError = true;
    } else {
        $rn = trim($_POST['rn']);
    }
    
}

?>
<!-- .results-table-wrapper -->
<div class="results-table-wrapper">

                    <?php
                    $pn = $_POST['pn'];
                    $rn = $_POST['rn'];
                    ?>
                    
                    <?php if (strlen($pn) >= 5 && strlen($rn) >= 5) { ?>
                    <table class="results-table">
                    
                        <thead>
                        
                            <tr>
                            
                                <th colspan="2"> Laboratory Results</th>
                            
                            </tr>
                            
                        </thead>
                    
                        <tbody>
                        
                            <?php
                            foreach (glob("../web_lab_results/*".$pn."*".$rn."*.pdf") as $filename) {
                            $getFileDate = date("Y-m-d", filectime($filename));
                            $todaysDate = date("Y-m-d");
                            $validDate = strtotime ( '-30 day' , strtotime ( $todaysDate ) ) ;
                            $fileDate = strtotime($getFileDate);        
                            
                            
                            if ($validDate < $fileDate) {
                            $filedownload = urlencode($filename);
                            $filename = mb_convert_encoding(substr("$filename", 19), "UTF-8");
                            echo "<tr>\n";
                            echo "<td class=\"filename\">";
                            echo "<img src=\"http://cardinalsantos.com.ph/wp-content/themes/bootstraplosito/i/pdf-icon.png\" /> $filename";
                            echo "</td>";
                            echo "<td class=\"download-link\">";
                            echo "<a href=\"download.php?f=$filedownload\" title=\"Download this laboratory result.\"><img src=\"http://cardinalsantos.com.ph/wp-content/themes/bootstraplosito/i/download-icon.png\" /></a>";
                            echo "</td></tr>";
                            
                            }
                            else {
                            echo "<tr>\n";
                            echo "<td>";
                            echo "<p></p><p></p><p></p><p class=\"noresults\">No results found. <br />The laboratory result you are requesting is more than 30 days old. <br />Please contact CSMC to manually request for a copy of your laboratory result.</p>";
                            echo "</td></tr>";
                            }
                            }
                            ?>
                    
                        </tbody>
                        
                    </table>
                    <?php } elseif (!$pn == '' && !$rn == '') { ?>
                    <p></p><p></p><p></p><p class="noresults">No results found. <br />Please make sure you have entered <br />the correct Patient ID and Request Number.</p>
                    <?php } else { ?>    
                    <?php } ?>
                                    
</div><!--/end .results-table-wrapper -->
<div data-role="main" class="ui-content">
                                        <!--a href="#pageone">Go Back to Special Services Directory</a-->
                                         <button onclick="goBack()">Home</button>
                                        <script>
                                            function goBack(){
                                                window.history.back();
                                            }
                                        </script>
                                    </div>