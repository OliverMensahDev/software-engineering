<?php

namespace app\notification;

use app\personnel\Employee;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailSender implements EmployeeNotifier
{
  public function notify(Employee $employee)
  {
    $email = new  PHPMailer(true);
    try {
      // $email->SMTPDebug = SMTP::DEBUG_SERVER;
      $email->isSMTP();
      $email->Host       = 'smtp.zoho.com';
      $email->SMTPAuth   = true;
      $email->Username   = 'info@imaniimpressionz.com';
      $email->Password   = '67032017Honeydew';
      $email->SMTPSecure = "tls";
      $email->Port       = 587;
      $email->setFrom('info@imaniimpressionz.com', 'Admin');
      $email->addAddress($employee->getEmail());
      $email->addReplyTo('info@imaniimpressionz.com');
      $email->isHTML(true);
      $email->Subject = "Employee Pay";
      $sb = "### EMPLOYEE RECORD ####";
      $sb .= PHP_EOL;
      $sb .= "NAME: " . $employee->getFullName();
      $sb .= PHP_EOL;
      $sb .= PHP_EOL;
      $sb .= "EMAIL: " .  $employee->getEmail();
      $sb .= PHP_EOL;
      $sb .= "MONTHLY WAGE: " . $employee->getMonthlyIncome();
      $email->Body = $sb;
      $email->send();
    } catch (Exception $e) {
      die("Message could not be sent. Error: {$email->ErrorInfo}");
    }
  }
}
