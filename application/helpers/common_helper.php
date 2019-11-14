<?php
//================================================================================
// Create invite token
//================================================================================
function inviteTokenGenerator($length = 30) {
  return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

//================================================================================
// Date when add to database
//================================================================================
function dateInsert(){
  return date('YmdHis');
}

//================================================================================
// Date format 2018/12/15
//================================================================================
function formatDate($date){
  $newDate = date("Y/m/d", strtotime($date));
  return $newDate;
}



//================================================================================
// Decrypt / Encrypt
//================================================================================
// function string_secure($action, $string) {
//     $output = false;
//     $encrypt_method = "AES-256-CBC";
//     $secret_key = 'suzuki';
//     $secret_iv = 'coffee';
//     // hash
//     $key = hash('sha256', $secret_key);

//     // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
//     $iv = substr(hash('sha256', $secret_iv), 0, 16);
//     if ( $action == 'encrypt' ) {
//         $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
//         $output = base64_encode($output);
//     } else if( $action == 'decrypt' ) {
//         $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
//     }
//     return $output;
// }
function protect_url($action, $string, $pass){
  $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_iv = 'coffee';
    $key = hash('sha256', $pass);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypted' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypted' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

//================================================================================
// Convert text to fullwidth text
//================================================================================
function conv_str($str) {
  // 「全角スペース」を「半角スペース」に変換
  $str = mb_convert_kana($str, "s", "UTF-8");
  // 「タブ」を「半角スペース」に変換
  $str = preg_replace("/\t/", " ", $str);
  // 複数文字の「半角スペース」を1文字に変換
  $str = preg_replace("/[ ]+/", " ", $str);
  // 前後の「半角スペース」を削除
  $str = trim($str, " ");
  // 「全角英数字」を「半角」に変換
  $str = mb_convert_kana($str, "a", "UTF-8");
  // 「濁点」付きの文字を一文字に変換
  $str = mb_convert_kana($str, "V", "UTF-8");
  // 「半角カタカナ」を「全角カタカナ」に変換
  $str = mb_convert_kana($str, "K", "UTF-8");
  // 「濁点」を削除
  $str = preg_replace("/゛/", "", $str);
  // 「半濁点」を削除
  $str = preg_replace("/゜/", "", $str);
  // 適用可能な文字を全てHTMLエンティティに変換
  $str = htmlentities($str, ENT_QUOTES, "UTF-8");
  return $str;
}

//================================================================================
// Send mail function
//================================================================================
function send_mail($tomail, $subject, $body){
  $body = mb_convert_encoding($body, "ISO-2022-JP","AUTO");
  $from_mail = 'info@bellezavietnam.vn';
  $from_name = 'Schoolmail Project';
  $header  = "Return-Path: $from_mail\n";
  $header .= "From:" . mb_encode_mimeheader($from_name) . "<$from_mail>\n";
  $header .="MIME-Version: 1.0\r\nContent-Type: text/html; charset=ISO-2022-JP\r\n";
  $header .= "Reply-To: $from_mail\n";
  return mb_send_mail($tomail, $subject, $body, $header);
}
