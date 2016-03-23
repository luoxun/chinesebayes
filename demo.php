<?php

include('./vendor/autoload.php');



$chinese_text = "北京大学在四川招生";

$_SEGMENT_BASE_URL = 'http://segment.sae.sina.com.cn/urlclient.php';

$fenciUrl = 'http://luoxunfenc.applinzi.com/?str='.$chinese_text;



<tr>
    <td></td>
    <td>
            <label><input name="Fruit" type="radio" value="" />苹果 </label> 
            <label><input name="Fruit" type="radio" value="" />桃子 </label> 
            <label><input name="Fruit" type="radio" value="" />香蕉 </label> 
            <label><input name="Fruit" type="radio" value="" />梨 </label> 
            <label><input name="Fruit" type="radio" value="" />其它 </label>
    </td>
    <td>
            <label><input name="Fruit" type="radio" value="" />苹果 </label> 
            <label><input name="Fruit" type="radio" value="" />桃子 </label> 
            <label><input name="Fruit" type="radio" value="" />香蕉 </label> 
            <label><input name="Fruit" type="radio" value="" />梨 </label> 
            <label><input name="Fruit" type="radio" value="" />其它 </label>
    </td>

    <td>
            <label><input name="Fruit" type="radio" value="" />苹果 </label> 
            <label><input name="Fruit" type="radio" value="" />桃子 </label> 
            <label><input name="Fruit" type="radio" value="" />香蕉 </label> 
            <label><input name="Fruit" type="radio" value="" />梨 </label> 
            <label><input name="Fruit" type="radio" value="" />其它 </label>
    </td>


</tr>


exit;

//$array = asyncWord('罗技键盘K240');


//$documer = new Documer\Documer(new \Documer\Storage\Memory());
$documer = new Documer\Documer(new \Documer\Storage\SqliteStorage());


$documer->train('good', '罗技（Logitech）M185 无线鼠标 黑色灰边');
//$documer->train('good', '罗技键盘K240');

//$documer->train('good', '罗技（Logitech）M185 无线鼠标 黑色灰边');
//$documer->train('good', '罗技（Logitech） LS1 激光鼠标 黑色绿边');
//$documer->train('good', '罗技（Logitech）G402 高速追踪游戏鼠标');



$scores = $documer->guess('罗技（Logitech）MK345 无线键鼠套装');


var_dump($scores);






  $scores = $documer->guess('微软（Microsoft）Surface Pro 4 平板电脑 12.3英寸（Intel i5 4G内存 128G存储 触控笔 预装Win10）');

  var_dump($scores);

 $scores = $documer->guess('酷比魔方 TALK7X八核 7.0英寸平板电脑（双卡双待联通移动3G 八核 1G/8G） 前白后白');

 var_dump($scores);
exit;
$documer->train('good', '罗技（Logitech）M185 无线鼠标 黑色灰边');
$documer->train('good', '罗技（Logitech） LS1 激光鼠标 黑色绿边');
$documer->train('good', '罗技（Logitech）G402 高速追踪游戏鼠标');

$documer->train('bad','大显（Daxian）JL123 移动联通2G 老人手机 单卡单待 手机 红色');
$documer->train('bad','优思（Uniscope）US96 移动/联通2G老人手机 双卡双待 红色');
$documer->train('bad','大显（DaXian） DX800 移动/联通2G直板大按键大字体大音量老人手机 蓝色');
$documer->train('bad','讯拓（SUNT） 轻装上阵KX03 双USB接口 有线键鼠套装');


//  $scores = $documer->guess('罗技（Logitech）MK345 无线键鼠套装');

//  var_dump($scores);


//  $scores = $documer->guess('微软（Microsoft）Surface Pro 4 平板电脑 12.3英寸（Intel i5 4G内存 128G存储 触控笔 预装Win10）');

//  var_dump($scores);

// $scores = $documer->guess('酷比魔方 TALK7X八核 7.0英寸平板电脑（双卡双待联通移动3G 八核 1G/8G） 前白后白');

//  var_dump($scores);


// $scores = $documer->guess('易百年EzloveEZ812老人手机 白 官方标配');


// var_dump($scores);

$scores = $documer->guess('新贵（NEWMEN）倾城之恋101 有线键鼠套装 双USB接口');


var_dump($scores);

exit;






function asyncWord($context)
{


    $fenciUrl = 'http://luoxunfenc.applinzi.com/?str='.$context;

    //初始化
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $fenciUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //执行并获取HTML文档内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    //echo($output);

    $jsonout = $output;
    $jsonout = json_decode($output);
    $result = array();

    // var_dump($jsonout);
    foreach ($jsonout as $key => $value) {
        if (!empty($value->word)) {


            array_push($result, $value->word);
        }
    }
    return $result;
}
