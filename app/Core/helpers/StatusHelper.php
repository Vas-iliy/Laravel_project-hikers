<?php


namespace App\Core\helpers;


use Illuminate\Support\Arr;

class StatusHelper
{
    public static function statusList(): array
    {
        return [
            9 => 'Draft',
            10 => 'Active',
            1 => 'Deleted',
        ];
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case 9:
                $class = 'badge badge-secondary';
                break;
            case 0:
                $class = 'badge badge-danger';
                break;
            case 10:
                $class = 'badge badge-primary';
                break;
            default:
                $class = 'badge badge-secondary';
        }

        return "<span class='{$class}'>".(in_array($status, self::statusList()) ?: self::statusList()[$status]) ."</span>";
    }
}
