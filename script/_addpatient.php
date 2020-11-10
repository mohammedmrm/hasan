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
$age= $_REQUEST['age'];
$id_card= $_REQUEST['id'];
$device_id = $_REQUEST['device_id']; ;



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
    'phone'   => [$phone,   "required|isPhoneNumber"],
    'age'   => [$age,   "required|int"],
    'id'   => [$id_card ,   "required|min(2)|max(250)"],
]);

if($v->passes()) {
  $sql = 'insert into patient (name,birthdate,phone,device_id,id_card,age,dev_id) values (?,?,?,?,?,?,?)';
  $result = setData($con,$sql,[$name,$birthdate,$phone,$device_id,$id_card,$age,$device_id]);
  if($result > 0){
    $success = 1;
  }
}else{
  $error = [
           'name_err'=> implode($v->errors()->get('name')),
           'phone_err'=>implode($v->errors()->get('phone')),
           'age_err'=>implode($v->errors()->get('age')),
           'id_err'=>implode($v->errors()->get('id')) ,
           ];
}
echo json_encode([$_REQUEST,'success'=>$success, 'error'=>$error]);
?>