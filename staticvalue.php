<?php

// DERの計算 係数を必要とする DER = RER * 係数
define("NORMAL",1.6); // 何もしてない成犬
define("FIX", 1.4); // 去勢済み
define("FAT", 1.2); // 肥満
define("DIET",1.0); // 痩せたい
define("REST",1.0); // 入院中など安静中
define("GROWTH",3.0); // 成長期　離乳～４カ月ぐらい

// 係数の日本語
$coefficients = array(
    "成犬"=>NORMAL,
    "成犬(去勢/不妊)" =>FIX,
    "肥満"=>FAT,
    "ダイエット中"=>DIET,
    "入院中などの安静時"=>REST,
    "成長期"=>GROWTH);