<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserAppliance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * GET /api/dashboard
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Load all appliances for this user with their relations
        $appliances = UserAppliance::with(['itemType','warranty'])
            ->where('user_id', $user->id)
            ->get();

        // Total added
        $total = $appliances->count();

        // Compute expiry date for each item
        $now = Carbon::now();
        $appliances->each(function($ua) {
            $ua->expiry = Carbon::parse($ua->purchase_date)
                ->addMonths($ua->warranty->months);
        });

        // Out‑of‑warranty: expiry < today
        $outOfWarranty = $appliances
            ->filter(fn($ua) => $ua->expiry->lt($now))
            ->count();

        // Due for renewal: expiry within next 15 days
        $dueForRenewal = $appliances
            ->filter(fn($ua) => $ua->expiry->between($now, $now->copy()->addDays(15)))
            ->count();

        // Group by item type for "My Devices"
        $deviceGroups = $appliances
                ->groupBy(fn($ua) => $ua->itemType->id)
                ->map(fn($group, $itemTypeId) => [
                    'id'    => (int) $itemTypeId,
                    'name'  => $group->first()->itemType->name,
                    'count' => $group->count(),
                ])->values();


       
        $reminders = $appliances
        ->filter(fn($ua) =>
            $ua->expiry->gte($now) &&
            $ua->expiry->lte($now->copy()->addDays(15))
        )
        ->map(fn($ua) => [
            'id'       => $ua->id, 
            'message'    => "Extend warranty for {$ua->itemType->name}",
            'due_at'     => $ua->expiry->toDateString(),
        ])
        ->values();

 


        return response()->json([
            'code'=> 200,
                'status'  => 'success',
                'message' => 'success',
            'user' => [
                'id'    => $user->id,
                'name'  => $user->name,
                'avatar'=> null, // or URL if you store one
            ],
            'stats' => [
                'devices_added'   => $total,
                'out_of_warranty' => $outOfWarranty,
                'due_for_renewal' => $dueForRenewal,
            ],
            'device_groups' => $deviceGroups,
            'reminders'     => $reminders,
        ], 200);
    }
}
