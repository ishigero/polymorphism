<?php

interface  User {
    public function confirm_password($password): bool;
    public function typeOf($type): bool;
    public function isLoggedIn();
    public function sell($goodsId);
    public function buy($goodsId);
    public function watch($goodsId)
}