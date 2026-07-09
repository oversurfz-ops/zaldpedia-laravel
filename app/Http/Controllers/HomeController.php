<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the ZALD PEDIA storefront home dashboard.
     */
    public function index()
    {
        // Self-seeding database wrapper for instant developer previews
        try {
            if (Service::count() === 0) {
                $defaults = [
                    ['sku_id' => 'dm-5', 'name' => '5 Diamonds', 'category' => 'diamonds', 'price' => 1500, 'description' => 'Instant Injection (3-5 mins)', 'icon' => '💎'],
                    ['sku_id' => 'dm-50', 'name' => '50 Diamonds', 'category' => 'diamonds', 'price' => 14000, 'description' => 'Instant Injection (3-5 mins)', 'icon' => '💎'],
                    ['sku_id' => 'dm-100', 'name' => '100 Diamonds', 'category' => 'diamonds', 'price' => 27000, 'description' => 'Instant Injection (3-5 mins)', 'icon' => '💎'],
                    ['sku_id' => 'dm-250', 'name' => '250 Diamonds', 'category' => 'diamonds', 'price' => 68000, 'description' => 'Instant Injection (3-5 mins)', 'icon' => '💎'],
                    ['sku_id' => 'dm-500', 'name' => '500 Diamonds', 'category' => 'diamonds', 'price' => 135000, 'description' => 'Instant Injection (3-5 mins)', 'icon' => '💎'],
                    ['sku_id' => 'sl-member', 'name' => 'Starlight Member', 'category' => 'starlight', 'price' => 145000, 'description' => 'Unlock Starlight skin & perks', 'icon' => '⭐'],
                    ['sku_id' => 'twilight', 'name' => 'Twilight Pass', 'category' => 'twilight', 'price' => 139000, 'description' => 'Get up to 6000% rewards', 'icon' => '👑'],
                    ['sku_id' => 'joki-star-gm', 'name' => 'Joki Per Bintang GM', 'category' => 'joki', 'price' => 5000, 'description' => 'Rank Grandmaster Boosting', 'icon' => '🛡️'],
                    ['sku_id' => 'joki-star-epic', 'name' => 'Joki Per Bintang Epic', 'category' => 'joki', 'price' => 8000, 'description' => 'Rank Epic Boosting', 'icon' => '⚔️'],
                    ['sku_id' => 'joki-star-legend', 'name' => 'Joki Per Bintang Legend', 'category' => 'joki', 'price' => 12000, 'description' => 'Rank Legend Boosting', 'icon' => '🛡️'],
                    ['sku_id' => 'joki-star-mythic', 'name' => 'Joki Per Bintang Mythic', 'category' => 'joki', 'price' => 20000, 'description' => 'Rank Mythic Boosting', 'icon' => '🔥']
                ];
                foreach ($defaults as $d) {
                    Service::create($d);
                }
            }
        } catch (\Exception $e) {
            // Graceful error fallback for unconfigured DB migrations
            logger('Service self-seeding skipped: ' . $e->getMessage());
        }

        // Retrieve items grouped by categories
        $services = Service::all();
        $diamonds = $services->where('category', 'diamonds');
        $starlight = $services->where('category', 'starlight');
        $twilight = $services->where('category', 'twilight');
        $joki = $services->where('category', 'joki');

        return view('home', compact('diamonds', 'starlight', 'twilight', 'joki', 'services'));
    }
}
