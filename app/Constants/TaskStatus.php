<?php

namespace App\Constants;

class TaskStatus
{
    public const DOING = 0;

    public const DONE = 1;

    public const LABELS = [
        self::DOING => 'Đang làm',
        self::DONE => 'Hoàn thành',
    ];

    public const BADGE_CLASSES = [
        self::DOING => 'bg-warning text-dark',
        self::DONE => 'bg-success',
    ];

    public static function options(): array
    {
        return self::LABELS;
    }

    public static function label(int|string|null $status): string
    {
        return self::LABELS[(int) $status] ?? 'Không xác định';
    }

    public static function badgeClass(int|string|null $status): string
    {
        return self::BADGE_CLASSES[(int) $status] ?? 'bg-secondary';
    }
}
