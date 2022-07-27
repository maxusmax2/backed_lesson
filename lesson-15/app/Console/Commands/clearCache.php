<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class clearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearCache:please';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Cache::flush('part1');
        Cache::flush('part2');
        Cache::flush('part3');
        Cache::tags('part4tags')->flush('part4');
        Cache::tags('part5tags')->flush('part5');
        return 0;
    }
}
