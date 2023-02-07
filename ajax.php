<?
$cityName = $_POST['value'];

function dbConn()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'test-task';
    $link = mysqli_connect($host, $user, $pass, $db_name);

    return $link;
}

$link = dbConn();
if($_POST['event'] == 'start'){
    $sql = mysqli_query($link, 'SELECT * FROM `city`');
}else{
    $sql = mysqli_query($link, 'SELECT * FROM `city` WHERE `name` LIKE "%' . $cityName . '%"');
}

$html = '<ul>';
while ($result = mysqli_fetch_array($sql)) {
    $html .= '<li>' . $result['name'] . '</li>';
}
$html .= '</ul>';

echo $html;