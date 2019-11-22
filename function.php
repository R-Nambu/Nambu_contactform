<?php

function h($str) 
{
    // 第二引数：ENT_QUOTES シングルクオートとダブルクオートを共に変換します。
    // 第三引数：文字のエンコードを指定
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}