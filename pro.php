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
                        text-align : center;
                }

           </style>               
        </head>

        <body>
        <!-- docu -->
        <div class = "docu">
        <form action='pro.php' method='post'>
            花萼的長度：<input type='text' name='sL' id="idCar"/><br>
            花萼的寬度：<input type='text' name='sW' id="idChi"/><br>
            花瓣的長度：<input type='text' name='pL' id="idAge"/><br>
            花瓣的寬度：<input type='text' name='pW' id="idInc"/><br>
            
            <input type='submit' value="送出"/>
        </form>
                    

    <?php
        if(isset($_POST['sL']) & isset($_POST['sW']) & isset($_POST['pL']) & isset($_POST['pW'])) {
        $sL = $_POST['sL'];
        $sW = $_POST['sW'];
        $pL = $_POST['pL'];
        $pW = $_POST['pW'];

        /* $str = '"C:\Program Files\R\R-[版本]\bin\Rscript"' . ' .\[所要執行的 R 檔名].R' ." $[物件]";*/
        //$str = '"C:\Program Files\R\R-4.1.3\bin\Rscript"'.' .\script_1.R'." $car"." $chi"." $age"." $inc";
        $str = '"C:\Program Files\R\R-4.3.1\bin\Rscript"'.' .\iris-svm.R'." $sL"." $sW"." $pL"." $pW";

        exec($str, $output, $return_var);  
        
        $pattern = "/\[\d\]/" ;
        $replacement = "";

        $output[0] = preg_replace ($pattern , $replacement , $output[0]);
		$output[1] = preg_replace ($pattern , $replacement , $output[1]);
        $output[2] = preg_replace ($pattern , $replacement , $output[2]);
        $output[3] = preg_replace ($pattern , $replacement , $output[3]);
        $output[4] = preg_replace ($pattern , $replacement , $output[4]);
                 
        print_r($output[0]);
		
        echo "<script>";                     
        echo "$('#idCar').val(".$output[1].");";
        echo "$('#idChi').val(".$output[2].");";
        echo "$('#idAge').val(".$output[3].");";
        echo "$('#idInc').val(".$output[4].");";                    
        echo "</script>";                
        
        /* 產生亂數 */
        // $nocache = rand();

        /* 輸出圖檔 */
        /*echo("<img src='output/hist.png' />"); */
        }
    ?>
        </div>
        <h5>效能</h5>
            <img src="images/performance.png" class="img-thumbnail" style="width:600px;height:260px" />
        
        </body>
</html>