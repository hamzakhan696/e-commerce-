<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public  $code;
    public  $value;
    public  $type;
    public  $cart_value;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric'
        ]);
    }
    public function storeCoupon()
    {
        $this->validate([
           'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric'
        ]);
        $coupon= new Coupon();
        $coupon->code=$this->code;
        $coupon->value=$this->value;
        $coupon->type=$this->type;
        $coupon->cart_value=$this->cart_value;

        $coupon->save();
        session()->flash('message','coupon has been craeted succesfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.base');;
    }
}
