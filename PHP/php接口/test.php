<?php
interface User{
    function getDiscount();
    function getUserType();
}


//vip用户实现接口
class VipUser implements User{
    private $discount = 0.8;
    function getDiscount(){
        return $this->discount;
    }

    function getUserType(){
        return "VIP用户";
    }
}

//普通用户
class NormalUser implements User{
    private $discount = 1.1;
    public function getDiscount()
    {
        return $this->discount;
    }

    public function getUserType() {
        // TODO: Implement getUserType() method.
        return "NormalUser";
    }

}


class Goods{
    var $price = 100;
    var $vc;
    //定义User接口类型参数，这是并不知道是什么用户
    function run(User $vc)
    {
        $this->vc = $vc;
        $discount = $vc->getDiscount();
        $userType = $vc->getUserType();
        echo $userType."商品价格：".$discount*$this->price;
    }
}

$display = new Goods();
//$display->run(new VipUser);#VIP用户商品价格：80
$display->run(new NormalUser);