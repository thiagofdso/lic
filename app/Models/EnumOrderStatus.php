<?php
/**
 * Created by PhpStorm.
 * User: Thiago
 * Date: 03/07/2016
 * Time: 13:14
 */

namespace CodeDelivery\Models;


class EnumOrderStatus
{
    private static $status=[
                    0 =>'Pendente',
                    1 =>'A caminho',
                    2 =>'Entregue'
                    ];
    public static function getStatus($statusId)
    {
        return EnumOrderStatus::$status[$statusId];
    }
    public static function getStatusId($status)
    {
        return array_search($status, EnumOrderStatus::$status);
    }
    public static function getList(){
        return [
            'Pendente' =>'Pendente',
            'A caminho' =>'A caminho',
            'Entregue' =>'Entregue'
        ];
    }
}