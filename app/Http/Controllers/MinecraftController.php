<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinecraftController extends Controller
{
    private $serverPath = '/home/gitmeriz/minecraft-server';

    public function startServer(Request $request)
    {
        $output = shell_exec("bash $this->serverPath/Start.sh");
        
        return response()->json(['status' => 'Server is starting...']);
    }

    public function stopServer(Request $request)
    {
        $output = shell_exec("bash $this->serverPath/Stop.sh");
        return response()->json(['status' => 'Server is stopping...']);
    }

    public function serverStatus()
    {
        $output = shell_exec("bash $this->serverPath/Status.sh");

        $isRunning = str_contains($output, 'running'); // Adjust as necessary
        return response()->json(['status' => $output, 'isRunning' => $isRunning]);
    }
}