<?php 

namespace app\handlers;

class DiscountManager 
{
  public function applyVouchers($voucher, $price)
  {
       if($this->isValidVoucher($voucher)){
          $price = $price * 0.95;
     } else {
         // throw new Exception("Voucher invalid");
         echo "Voucher invalid";
     }
     return $price;
  }

  
  private function isValidVoucher($voucher)
  {
      return $voucher === "GIMME_DISCOUNT" || $voucher === "CHEAPER_PLEASE";
  }
}