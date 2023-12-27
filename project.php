<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stress Prediction System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open+Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">專題題目：學生心理壓力等級預測系統</h1>
        <p class="mb-4">此系統旨在經由各項指數預測學生之心理壓力</p>
        
        <h2 class="text-2xl font-semibold mb-3">專題目標</h2>
        <p class="mb-4">此系統旨在經由各項指數預測學生之心理壓力等級(1-5)</p>
        
        <h2 class="text-2xl font-semibold mb-3">資料集名稱</h2>
        <p class="mb-4"><a href="https://www.kaggle.com/datasets/samyakb/student-stress-factors/" class="text-blue-500 font-bold text-xl" >Student stress factors(點我前往)</a></p>
        
        <h2 class="text-2xl font-semibold mb-3">機器學習名稱</h2>
        <p class="mb-4">SVM演算法</p>
        
        <h2 class="text-2xl font-semibold mb-3">模型效能截圖</h2>
        <img src="images/performance.png" alt="Model Accuracy Screenshot" class="mb-4" style="width:800px;height:300px">
        
        <h2 class="text-2xl font-semibold mb-3">輸入各項指數</h2>
        <form action='project.php' method='post'>
            <div class="grid grid-cols-1 gap-4 mb-6">
                <!-- Repeat this block for each dropdown input -->
                <div>
                <label for="sleep_quality" class="block mb-2">睡眠品質:</label>
                <select id="sleep_quality" name="sleep_quality" class="border-gray-300 rounded-md p-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <!-- ... -->
            </div>

            <div class="grid grid-cols-1 gap-4 mb-6">
                <!-- Repeat this block for each dropdown input -->
                <div>
                <label for="headaches_weekly" class="block mb-2">一周頭痛次數:</label>
                <select id="headaches_weekly" name="headaches_weekly" class="border-gray-300 rounded-md p-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <!-- ... -->
            </div>

            <div class="grid grid-cols-1 gap-4 mb-6">
                <!-- Repeat this block for each dropdown input -->
                <div>
                <label for="academic_performance" class="block mb-2">學業表現:</label>
                <select id="academic_performance" name="academic_performance" class="border-gray-300 rounded-md p-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <!-- ... -->
            </div>

            <div class="grid grid-cols-1 gap-4 mb-6">
                <!-- Repeat this block for each dropdown input -->
                <div>
                <label for="study_load" class="block mb-2">學業負擔:</label>
                <select id="study_load" name="study_load" class="border-gray-300 rounded-md p-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <!-- ... -->
            </div>

            <div class="grid grid-cols-1 gap-4 mb-6">
                <!-- Repeat this block for each dropdown input -->
                <div>
                <label for="extracurricular_activities" class="block mb-2">課外活動:</label>
                <select id="extracurricular_activities" name="extracurricular_activities" class="border-gray-300 rounded-md p-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <!-- ... -->
            </div>
            <button type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                預測學生壓力等級
            </button>
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
                
                echo "<br/>";
                echo '<h1 class="text-red-500 font-bold text-2xl">預測學生壓力等級為 ' . $output[3] . ' 級(1-5)</h1>';
                // if (count($output) > 0) {
                //     foreach ($output as $line) {
                //         echo "<p>Output Line: $line</p>";
                //     }
                // } else {
                //     echo "<p>No output or error received from R script.</p>";
                // }
            }
            ?>
    </div>
</body>
</html>