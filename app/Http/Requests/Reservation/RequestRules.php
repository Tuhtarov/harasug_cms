<?php

namespace App\Http\Requests\Reservation;

class RequestRules
{
    private static array $base = [
        'book.time_in' => 'required|date',
        'book.time_out' => 'required|date',
        'book.qty_old' => 'required|integer',
        'book.qty_child' => 'nullable|integer'
    ];

    private static array $home = [
        'book.home_id' => 'required|exists:App\Models\Home,id',
        'book.title' => 'required|exists:App\Models\Home,title_full',
        'book.max_peoples' => 'integer'
    ];

    private static array $homeForBooking = [
        'book.home_id' => 'required|exists:App\Models\Home,id',
        'book.max_peoples' => 'integer'
    ];

    private static array $booking = [
        'book.phone' => 'required|string|max:12|min:12',
        'book.name' => 'required|string|min:3|max:254',
    ];

    /**
     * @return array|string[]
     */
    public static function getCheckHomeRules(): array
    {
        return array_merge(self::$base, self::$home);
    }

    /**
     * @return array|string[]
     */
    public static function getCheckAdditionalRules(): array
    {
        $rules = self::$base;

        unset($rules['book.qty_old'], $rules['book.qty_child']);

        return array_merge($rules, [
            'book.max_peoples' => 'required|min:1',
            'book.qty_peoples' => 'required|min:1',
            'book.home_id' => 'required|min:1',
        ], self::$home);
    }

    /**
     * @return array|string[]
     */
    public static function getBookingRules(): array
    {
        return array_merge(self::$base, self::$homeForBooking, self::$booking);
    }

    public static function getSearchRules(): array
    {
        return self::$base;
    }
}
