<?php

namespace App\Services;
use App\Models\ParkingArea;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class PriceCalculationService
{
    public function calculatePrice(int $parkingAreaId, Carbon $startDate, Carbon $endDate, string $currency): array
    {
        $parkingArea = ParkingArea::findOrFail($parkingAreaId);

        $weekdayPrice = $parkingArea->weekday_price;
        $weekendPrice = $parkingArea->weekend_price;
        $discount = $parkingArea->discount;

        $totalPrice = $this->calculateTotalPrice($weekdayPrice, $weekendPrice, $startDate, $endDate);
        $dicountedPrice = $totalPrice - $totalPrice * $discount / 100;

        if ($currency !== 'USD') {
            $totalPrice = $this->convertCurrency($totalPrice, $currency, $endDate);
            $dicountedPrice = $this->convertCurrency($dicountedPrice, $currency, $endDate);
        }

        return [
            'total' => round($totalPrice, 2),
            'discounted' => round($dicountedPrice, 2),
            'showNotice' => $endDate->isFuture() && $currency !== 'USD',
        ];
    }

    private function calculateTotalPrice(float $weekdayPrice, float $weekendPrice, Carbon $startDate, Carbon $endDate): float
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        
        $daysCount = (int) $startDate->diffInDays($endDate) + 1;
        
        $weekdaysCount = $this->getWeekdaysCount($startDate, $endDate, $daysCount);
        $weekendDaysCount = $daysCount - $weekdaysCount;
        $weekdaysHoursCount = $weekdaysCount * 24;
        $weekendHoursCount = $weekendDaysCount * 24;
        if ($startDate->hour !== 0) {
            $startDayOfWeekInt = $startDate->dayOfWeekIso - 1;

            if ($startDayOfWeekInt > 4) {
                $weekendHoursCount = $weekendHoursCount - $startDate->hour;
            } else {
                $weekdaysHoursCount = $weekdaysHoursCount - $startDate->hour;
            }
        }

        if ($endDate->hour !== 0) {
            $endDayOfWeekInt = $endDate->dayOfWeekIso - 1;

            if ($endDayOfWeekInt > 4) {
                $weekendHoursCount = $weekendHoursCount - 24 + $endDate->hour;
            } else {
                $weekdaysHoursCount = $weekdaysHoursCount - 24 + $endDate->hour;
            }
        }

        return $weekdayPrice * $weekdaysHoursCount + $weekendPrice * $weekendHoursCount;
    }

    private function getWeekdaysCount(Carbon $startDate, Carbon $endDate, int $daysCount): int
    {
        $startDayOfWeekInt = $startDate->dayOfWeekIso - 1;
        $endDayOfWeekInt = $endDate->dayOfWeekIso - 1;

        if ($endDayOfWeekInt > 4) {
            $endDayOfWeekInt = 4;
        }

        if ($startDayOfWeekInt > 4) {
            $startDayOfWeekInt = 0;
        }

        return round($daysCount / 7 + 0.4) * 5 - $startDayOfWeekInt - 4 + $endDayOfWeekInt;
    }

    private function convertCurrency(float $price, string $currency, Carbon $endDate): float
    {
        $date = $endDate->format('Y-m-d');
        if ($endDate->isFuture()) {
            $date = 'latest';
        }

        $response = Http::get('http://api.exchangeratesapi.io/v1/' . $date, ['access_key' => env('EXCHANGE_RATE_API_KEY'), 'symbols' => 'USD, PLN']);

        if (array_key_exists('error', $response->json())) {
            throw new \Exception('Failed to convert currency: ' . $response->json()['error']['message']);
        }

        $usdExchangeRate = $response['rates']['USD'];
        $convertedAmount = $price / $usdExchangeRate;

        if ($currency === 'EUR') {
            return $convertedAmount;
        }

        $plnExchangeRate = $response['rates']['PLN'];
        $convertedAmount = $convertedAmount * $plnExchangeRate;

        return $convertedAmount;
    }
}