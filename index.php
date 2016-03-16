<html>
<head>
    <title></title>
</head>
<body>
    <?php
// 1.  Populate a sample array with 100 values, where each value is a random number between 0 to 10000.  DONE 
//     Implement a selection sort algorithm that returns a new array that's sorted with smallest number on the left. 
//     Do this without creating another array. DONE
// 2.  Modify your code so that instead of just getting the minimum when doing the linear scan, it gets BOTH the maximum and the minimum.
// 3.  Using php microtime() (http://php.net/manual/en/function.microtime.php) find out how many seconds this sorting took for 10000 values in the array.
// 4.  Upload this work to your GitHub account.
// 5.  For sorting an array of 10,000 values, count how many if/else statements were done to sort the array. You'll find that it's approximately equal to 
//      10,000 x 10,000 or in other words that this algorithm's efficiency is on the order of N^2 where N is the number of values in the array.
// 6.  Find out how much time it now took for selection sort to work with this change in algorithm.   


    function selectionSort(){
        $j=0;
        $k=0;
        $elapsedTime = '';
        $startTime = '';
        $endTime = '';
        $min = 0;
        $max = 0;
        $ifElseCount = 0;


        set_time_limit(0);

        $startTime= microtime(true);
   
        // $arrayForSort=[10,1,5,7,6,8,4,3,2,9];

        for ($j=0; $j<10000; $j++){
            $arrayForSort[$j] = rand(0,10000);
        }

        //Set min / max to values in the array, in case none of them are 0!
        $min = $arrayForSort[0];
        $max = $arrayForSort[0];
        $arraySize = 0;
                
        $arraySize = count($arrayForSort)-1;

          
          //Find the minimum & maximum

        do{
            for($j=0; $j<($arraySize); $j++){
                if ($arrayForSort[$j]>$arrayForSort[$k]){
                                $temp = $arrayForSort[$k];
                                $arrayForSort[$k] = $arrayForSort[$j];
                                $arrayForSort[$j]=$temp;
                                $ifElseCount ++;
                        }else if($arrayForSort[$j] < $min){
                                $min = $arrayForSort[$j];
                                $temp = array_shift($arrayForSort);  //array_shift puts the value in [0] to $temp
                                array_push($arrayForSort, $temp); //add the item formerly in [0]
                                $ifElseCount ++;            
                        }else if($arrayForSort[$j] > $max){
                                 $max = $arrayForSort[$j];
                                 array_splice($arrayForSort, $j,1); //remove max
                                 array_push($arrayForSort, $max); //you removed max, now add it at the end
                                 $ifElseCount ++;
                        }else{
                            $ifElseCount++;
                        }
            }
                
               
                $k++;                
            } while ($k<count($arrayForSort));

                           
       $endTime=microtime(true);
       $elapsedTime = $endTime - $startTime;

       echo ("Sort completed in " . $elapsedTime . " seconds.  Using "  .$ifElseCount . " if / else evaluations");
       
       var_dump($arrayForSort);
       
       }
       
        selectionSort();
    
?>
</body>
</html>
