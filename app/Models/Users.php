<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Users
{
	public function getIp()
	{
		foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
			if (array_key_exists($key, $_SERVER) === true) {
				foreach (explode(',', $_SERVER[$key]) as $ip) {
					$ip = trim($ip); // just to be safe
					if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
						return $ip;
					}
				}
			}
		}
		return request()->ip(); // it will return server ip when no client ip found
	}

	public function setEndTestDate($userId, $type)
	{
		return DB::table('users')
			->where('id', '=', $userId)
			->update([
				"end_test_{$type}_date" => date("Y-m-d H:i:s")
			]);
	}
}
