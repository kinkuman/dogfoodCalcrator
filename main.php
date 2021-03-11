<?php

require 'staticvalue.php';

// 用語
// DER １日あたりのエネルギー要求量 = 安静時エネルギー要求量(RER) * 係数
// Daily Energy Requirementの略、１日に必要なエネルギー
// RERはResting Energy Requirementの略、安静時の必要カロリーのこと
// MEはたぶんMeal Energy

// テスト犬の体重（希望）
$weight = 8;

$rer_tiny = perCalclateEasy($weight);

print "体重".$weight."kgのわんこの";
print "rer簡易計算結果は".$rer_tiny."です<br>";


$rer_normal = perCalclate($weight);

print "普通の計算でのrerは".(int)$rer_normal."です<br>";

/***
 * 簡易PER計算
 */
function perCalclateEasy($weight) {
    // 簡易RER計算　体重を元に計算 30* 体重(kg) + 70
    $rer = 30 * $weight + 70;
    return $rer;
}

/***
 * 通常PER計算
 */
function perCalclate($weight) {
    // 普通のRER計算　70(体重(kg)) 0.75乗 を四捨五入する
    $rer = round(70 * $weight ** 0.75);
    return $rer;
}




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

// 複数環境で使うテスト用の記述



