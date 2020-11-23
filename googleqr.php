<?php

class QR_BarCode{

  private $googleChartAPI= 'http://chart.apis.google.com/chart';

  private $codeData;

  public function url($url= null){
    $this->codeData = preg_match("#^https?:/#", $url) ? $url: "http://{$url}";
  }

  public function text($text){
    $this->codeData= $text;
  }

  public function email($email = null, $subject = null, $message = null){
    $this->codeData = "MATMSG:TO:{$email};SUB{$subject};BODY:{$message};;";
  }

  public function phone($phone){
    $this->codeData= "TEL:{$phone}";
  }

  public function sms($phone = null, $msg = null){
    $this->codeData= "SMSTO:{$phone}:{$msg}";
  }

  public function contact($name = null, $address = null, $phone)
}
 ?>
