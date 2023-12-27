<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>導覽</title>
        <script type="text/javascript"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <style type="text/css">
            .docu {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <!-- docu -->
        <div class = "docu">
            <form action='pro.php' method='post'>
                Sleep Quality: <input type='text' name='sleep_quality'><br>
                Headaches Weekly: <input type='text' name='headaches_weekly'><br>
                Academic Performance: <input type='text' name='academic_performance'><br>
                Study Load: <input type='text' name='study_load'><br>
                Extracurricular Activities: <input type='text' name='extracurricular_activities'><br>
                <input type='submit' value="Submit"/>
            </form>

            <?php
            if (isset($_POST['sleep_quality']) && isset($_POST['headaches_weekly']) && isset($_POST['academic_performance']) && isset($_POST['study_load']) && isset($_POST['extracurricular_activities'])) {
                $sleep_quality = $_POST['sleep_quality'];
                $headaches_weekly = $_POST['headaches_weekly'];
                $academic_performance = $_POST['academic_performance'];
                $study_load = $_POST['study_load'];
                $extracurricular_activities = $_POST['extracurricular_activities'];

                // Adjust the path to the Rscript executable and your R script as necessary
                $str = '"C:\Program Files\R\R-4.2.0\bin\Rscript.exe" .\iris-svm.R ' . $sleep_quality . ' ' . $headaches_weekly . ' ' . $academic_performance . ' ' . $study_load . ' ' . $extracurricular_activities . ' 2>&1';
                exec($str, $output, $return_var);
                
                // if (count($output) > 0) {
                //     foreach ($output as $line) {
                //         echo "<p>Output Line: $line</p>";
                //     }
                // } else {
                //     echo "<p>No output or error received from R script.</p>";
                // }
                echo "<br/>";
                echo '<h1 class="text-red-500 font-bold text-2xl">預測學生壓力等級為 ' . $output[3] . ' 級(1-5)</h1>';
            }
            ?>
        </div>
        <h5>效能</h5>
            <img src="images/performance.png" class="img-thumbnail" style="width:600px;height:260px" />
    </body>
</html>
