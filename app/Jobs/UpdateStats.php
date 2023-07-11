<?php

namespace App\Jobs;

use App\Models\Statistics;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
       $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $stats=Statistics::where('user_id',$this->user)->first();
        if($stats)
        {
            $currentTaskNo=$stats->tasks_no;
            $stats->update(['tasks_no'=>$currentTaskNo+1]);
        }else{
            Statistics::create([
                'user_id' => $this->user,
                'tasks_no' => 1
            ]);
        }
    }
}
