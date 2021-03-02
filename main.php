<?php

// test
// DER １日あたりのエネルギー要求量 = 安静時エネルギー要求量(RER) * 係数
// Daily Energy Requirementの略、１日に必要なエネルギー量

// RERはResting Energy Requirementの略、安静時の必要カロリーのこと

// 簡易RER計算　体重を元に計算 30* 体重(kg) + 70
$weight = 8;
$rer_tiny = 30 * $weight + 70;

print "体重".$weight."kgのわんこの";
print "rer簡易計算結果は".$rer_tiny."です<br>";


// 普通のRER計算　70(体重(kg)) 0.75乗 を四捨五入する
$rer_normal = round(70 * $weight ** 0.75);

print "普通の計算でのrerは".(int)$rer_normal."です<br>";


// DERの計算 係数を必要とする DER = RER * 係数
define("NORMAL",1.6); // 何もしてない成犬
define("FIX", 1.4); // 去勢済み
define("FAT", 1.2); // 肥満
define("DIET",1.0); // 痩せたい
define("REST",1.0); // 入院中など安静中
define("GROWTH",3.0); // 成長期　離乳～４カ月ぐらい


$coefficients = array(
    "成犬"=>NORMAL,
    "成犬(去勢/不妊)" =>FIX,
    "肥満"=>FAT,
    "ダイエット中"=>DIET,
    "入院中などの安静時"=>REST,
    "成長期"=>GROWTH);


foreach ($coefficients as $key => $value) {
    $der = $rer_normal * $value;
    print $key."のDERは".$der."kcal/日です<br>";
}

print "<hr>";

// 給与量の計算
// 給与量 = DER / ME * 100

// フードの量 100g単位でのカロリーを調べる（袋にだいたい書いてある）
// それをMEとしてる meal Energyかな？

// ハルくんのアミノペプチドフォーミュラの場合 	392 kcal/100gとなるのでME=392

$me = 400;


foreach ($coefficients as $key => $value) {
    $der = $rer_normal * $value;
    print $key."のDERは".$der."kcal/日です<br>";
    $food = round($der / $me * 100);
    print "1日のフード量は".$food."gです<br>";
}

print "<hr>";




