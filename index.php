<?php 

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

header('Access-Control-Allow-Origin: *');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$dir_path = "tmp";

function getRandomImage($dir_path = NULL){
    if(!empty($dir_path)){
        $files = scandir($dir_path);
        $count = count($files);
        if($count > 2){
            $index = rand(2, ($count-1));
            
            return $index;
        } else {
            return "The directory is empty!";
        }
    } else {
        return "Please enter valid path to image directory!";
    }
}

$files = scandir($dir_path);

$index = getRandomImage($dir_path);
$filename = $files[$index];
rename("tmp/$filename", 'out.png');
#echo '<img src="'.$dir_path."/".$filename.'" alt="'.$filename.'">';
echo $filename;


$output = shell_exec('./gen_images.py --network network-snapshot-000180.pkl --seeds 1 --outdir tmp > /dev/null 2>/dev/null &');
//$output = shell_exec('python3 test.py 2>&1');
//echo $output;


?>
<img src="out.png?=<?php echo time()?>"/>