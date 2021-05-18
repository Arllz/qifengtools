<?php
require  "app/Controller/AbstractController.php";
require  "app/Controller/BaseController.php";

//自动加载
spl_autoload_register(function($class){
    if (file_exists($class.".php")) {
        include $class.".php";
    }
},true, true);

//遍历目录下的文件
function get_file_1($dir) {
    $ret = scandir($dir);
    global $files;
    foreach ($ret as $row) {
        if ($row != '.' && $row != '..')
        {
            if (is_dir($dir.'/'.$row)) {
                get_file_1($dir.'/'.$row);
            } else {
                $files[] =  $dir.'/'.$row;
            }
        }
    }
    return $files;
}

$fileAll = "D:\Dockerfile\b2b_server_new_hyperf\app\Controller\Admin";
$files = get_file_1($fileAll);
$class = [];
foreach ($files as $it) {
    preg_match('/\/[a-zA-Z]+Controller\.php/',$it,$itt);
    $sit = str_replace(['/','.php'],'',$itt[0]);
    $class[] = $sit;
}

//命令空间
foreach ($class as &$cl) {
    //echo "use App\Controller\Admin\\".$cl.";\n";
    $cl = "App\Controller\Admin\\".$cl;
}

//所有节点名
function getNodes($content)
{
    //控制器
    $cn = preg_match('/prefix=\"admin_api\/[a-zA-Z_]{2,}\"/',$content,$cont);
    return str_replace("\"",'',substr($cont[0],strpos($cont[0],"\""))) ?? '';
}

//注释
$docArr = [];
foreach ($class as $className) {
    $obj = new ReflectionClass(new $className());
    $doc = $obj->getDocComment();//类注解
    $cn = preg_match('/prefix=\"admin_api\/[a-zA-Z_]{2,}\"/',$doc,$cont);
    $tt = str_replace("\"",'',substr($cont[0],strpos($cont[0],"\"")));
    $methods = $obj->getMethods();
    foreach ($methods as $fn) {
        if ($fn->class != 'App\Controller\BaseController') {
            $docFn = $obj->getMethod($fn->name)->getDocComment();
            preg_match_all("/[\x{4e00}-\x{9fa5}]+/u",$docFn,$regs); //方法中文注释
            $msg = implode(',',$regs[0]);
            //方法名
            preg_match('/path=\"[a-zA-Z_]{3,}\"/',$docFn,$tmpFnArr);
            $tmp = str_replace("\"", '', $tmpFnArr[0]);
            $tmpFn = substr($tmp, 5);
            $name = substr($tt,strpos($tt,'/')+1);//唯一字符
            $fnStr =  '/'.$tt . '/' . $tmpFn;
            if ($msg && $tmpFn && $fnStr) {
                $docArr[] = [
                    $msg,
                    $name.'-'.$tmpFn,
                    $fnStr
                ];
            }
        }
    }
}

//格式化数组
$all = [];
foreach ($docArr as $node) {
    $ti = date('Y-m-d H:i:s');
    $all[] = [
        'parent_id' => 99,
        'name' => $node[1],
        'display_name' => $node[0],
        'effect_uri' => $node[2],
        'description' => $node[0],
        'created_at' => $ti,
        'updated_at' => $ti,
    ];
}

$dbhost = '101.37.80.237';  // mysql服务器主机地址
$dbuser = 'report';            // mysql用户名
$dbpass = 'Ofsmate567$%^';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($conn,'ecstore');
$sql = "select * from b2b_v2_system_permissions";
$retval = mysqli_query($conn,$sql);
if (!$retval) {
    die("无法读取数据");
}

//while ($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)) {
//    echo $row['display_name']."\n";
//}

$insertSql = "insert into b2b_v2_system_permissions_1(parent_id,name,display_name,effect_uri,description,created_at,updated_at) values ";
foreach ($all as $row) {
    $insertSql .= "({$row['parent_id']},'{$row['name']}','{$row['display_name']}','{$row['effect_uri']}','{$row['description']}','{$row['created_at']}','{$row['updated_at']}'),";
}
$insertSql = trim($insertSql,',');
file_put_contents('11.txt',$insertSql);
$ret = mysqli_query($conn,$insertSql);
if(! $ret )
{
    die('无法插入数据: ' . mysqli_error($conn));
}
var_dump($ret);
mysqli_close($conn);



