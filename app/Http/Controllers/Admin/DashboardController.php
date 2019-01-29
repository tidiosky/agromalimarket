<?php
/**
 * Created by PhpStorm.
 * User: wasstel2018
 * Date: 17/12/2018
 * Time: 15:04
 */

namespace App\Http\Controllers\Admin;


use App\Charts\DashboardChart;
use App\Charts\DashboardChartP;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;

use App\User;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Sarfraznawaz2005\VisitLog\Models\VisitLog;

class DashboardController extends Controller
{
    public function index(User $user, Comment $comment, Order $order, VisitLog $log)
    {
        $chart = new DashboardChart();


        $today_users = User::whereDate('created_at', today())->count();
        $yesterday_users = User::whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago = User::whereDate('created_at', today()->subDays(2))->count();



        $chart->title("Agramalimarket");
        $chart->type('bar');

        $chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users]);



        return view('admin.dashboard.index', compact('user', 'chart', 'comment','order','log','app'));
    }
}