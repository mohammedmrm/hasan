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
$email   = $_REQUEST['email'];
$phone   = $_REQUEST['phone'];
$password= $_REQUEST['password'];
$confirm = $_REQUEST['confirm'];



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
    'email'   => [$email,   'email'],
    'phone'   => [$phone,   "required|isPhoneNumber"],
    'password'=> [$password,  'required|min(6)|max(16)'],
    'confirm' => [$confirm,  'required|matches(password)']
]);

if($v->passes()) {
  $pass = hashPass($password);
  $sql = 'insert into admin (name,phone,email,password,role) values (?,?,?,?)';
  $result = setData($con,$sql,[$name,$phone,$email,$pass,1]);
  if($result > 0){
    $success = 1;
  }
}else{
  $error = [
           'name_err'=> implode($v->errors()->get('name')),
           'email_err'=>implode($v->errors()->get('email')),
           'phone_err'=>implode($v->errors()->get('phone')),
           'password_err'=>implode($v->errors()->get('password')),
           'confirm_err'=>implode($v->errors()->get('confirm')),
           ];
}
echo json_encode(['success'=>$success, 'error'=>$error]);
?>