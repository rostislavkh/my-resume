<?php

namespace App\Http\Middleware;

use App\Models\CheckMyResume;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Orchid\Screen\Layouts\Card;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
        elseif (filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
        else $ip = $remote;

        $isp = file_get_contents('https://api.iplocation.net/?ip=' . $ip);
        $isp = json_decode($isp, true);

        $check = CheckMyResume::where('ip_address', $isp['ip'])->first();

        if ($check == null) {
            CheckMyResume::create([
                'ip_address' => $isp['ip'],
                'country' => $isp['country_name'],
                'date_time' => Carbon::now(),
                'chart_date' => Carbon::now()
            ]);
        } else {
            $check->update([
                'updated_at' => Carbon::now()
            ]);
        }

        return $next($request);
    }
}
