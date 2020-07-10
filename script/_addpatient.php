<?php
session_start();
error_reporting(0);
header('Content-Type: application/json');
require_once("dbconnection.php");
require_once("_crpt.php");

use Violin\Violin;
require_once('../validator/autoload.php');
$v = new Violin;


$success = 0;
$error = [];
$name    = $_REQUEST['name'];
$phone   = $_REQUEST['phone'];
$birthdate= $_REQUEST['birthdate'];
$device_id = 1;



$v->addRuleMessage('isPhoneNumber', ' رقم هاتف غير صحيح  ');

$v->addRule('isPhoneNumber', function($value, $input, $args) {
    return   (bool) preg_match("/^[0-9]{10,15}$/",$value);
});
$v->addRuleMessages([
    'required' => 'الحقل مطلوب',
    'int'      => 'فقط الارقام مسموع بها',
    'regex'      => 'فقط الارقام مسموع بها',
    'min'      => 'قصير جداً',
    'max'      => 'مسموح ب {value} رمز كحد اعلى ',
    'email'      => 'البريد الالكتروني غيز صحيح',
    'matches'      => 'كلمة المرور غير متطابقة',
]);

$v->validate([
    'name'    => [$name,    'required|min(4)|max(50)'],
    'phone'   => [$phone,   "required|isPhoneNumber"]
]);

if($v->passes()) {
  $sql = 'insert into patient (name,birthdate,phone,device_id) values (?,?,?,?)';
  $result = setData($con,$sql,[$name,$birthdate,$phone,$device_id]);
  if($result > 0){
    $success = 1;
  }
}else{
  $error = [
           'name_err'=> implode($v->errors()->get('name')),
           'phone_err'=>implode($v->errors()->get('phone'))
           ];
}
echo json_encode(['success'=>$success, 'error'=>$error]);
?>