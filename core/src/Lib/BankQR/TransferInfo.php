<?php

namespace App\Lib\BankQR;


class TransferInfo
{
    private $amount;
    private $content;

    public function set_amount($amount) {
        $this->amount = $amount;
    }

    public function get_amount() {
        return $this->amount;
    }

    public function set_content($content) {
        $this->content = $content;
    }

    public function get_content() {
        return $this->content;
    }
}