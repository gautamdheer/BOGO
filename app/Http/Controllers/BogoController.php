<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BogoController extends Controller
{
    // Function to handle the BOGO offer based on the provided rule
    public function bogoOffer(Request $request, $rule)
    {
        $productPrices = $request->input('prices', []);
        $productPrices = array_map('intval', $productPrices);

        switch ($rule) {
            case 1:
                return $this->offerRule1($productPrices);
            case 2:
                return $this->offerRule2($productPrices);
            case 3:
                return $this->offerRule3($productPrices);
            default:
                return response()->json(['error' => 'Invalid rule'], 400);
        }
    }

    private function offerRule1($prices)
    {
        rsort($prices);
        $payableItems = [];
        $discountedItems = [];

        while (count($prices) > 1) {
            $first = array_shift($prices);
            foreach ($prices as $key => $second) {
                if ($second <= $first) {
                    $payableItems[] = $first;
                    $discountedItems[] = $second;
                    unset($prices[$key]);
                    $prices = array_values($prices);
                    break;
                }
            }
        }

        $payableItems = array_merge($payableItems, $prices);

        return response()->json([
            'Payable Items' => $payableItems,
            'Discounted Items' => $discountedItems,
        ]);
    }

    private function offerRule2($prices)
    {
        rsort($prices);
        $payableItems = [];
        $discountedItems = [];

        while (count($prices) > 1) {
            $first = array_shift($prices);
            foreach ($prices as $key => $second) {
                if ($second < $first) {
                    $payableItems[] = $first;
                    $discountedItems[] = $second;
                    unset($prices[$key]);
                    $prices = array_values($prices);
                    break;
                }
            }
        }

        $payableItems = array_merge($payableItems, $prices);

        return response()->json([
            'Payable Items' => $payableItems,
            'Discounted Items' => $discountedItems,
        ]);
    }

    private function offerRule3($prices)
    {
        rsort($prices);
        $payableItems = [];
        $discountedItems = [];

        while (count($prices) > 3) {
            $first = array_shift($prices);
            $second = array_shift($prices);
            $third = null;
            $fourth = null;

            foreach ($prices as $key => $product) {
                if ($third === null && $product < $first) {
                    $third = $product;
                    unset($prices[$key]);
                } elseif ($fourth === null && $product < $second) {
                    $fourth = $product;
                    unset($prices[$key]);
                    break;
                }
            }

            $payableItems[] = $first;
            $payableItems[] = $second;

            if ($third !== null) $discountedItems[] = $third;
            if ($fourth !== null) $discountedItems[] = $fourth;

            $prices = array_values($prices);
        }

        $payableItems = array_merge($payableItems, $prices);

        return response()->json([
            'Payable Items' => $payableItems,
            'Discounted Items' => $discountedItems,
        ]);
    }
}
