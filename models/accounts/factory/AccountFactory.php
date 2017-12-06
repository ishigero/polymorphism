<?php

require_once(APPPATH.'models/accounts/normal/Normal.php');
require_once(APPPATH.'models/accounts/superviser/Superviser.php');
require_once(APPPATH.'models/accounts/executive/Exective.php');
require_once(APPPATH.'models/accounts/administrators/Administrator.php');

class AccountFactory {

    public static function create($value) {
        if($value->type === AccountType::ACCOUNT_0) return new AccountAdministrator(
            $value->user_id, $value->name, $value->password);
        if($value->type === AccountType::ACCOUNT_1) return new AccountExective(
            $value->user_id, $value->name, $value->password);
        if($value->type === AccountType::ACCOUNT_2) return new AccountSuperviser(
            $value->user_id, $value->name, $value->password);
        if($value->type === AccountType::ACCOUNT_3) return new AccountNormal(
            $value->user_id, $value->name, $value->password);
        throw new InvalidArgumentException('アカウントタイプが不正です');
    }

}
