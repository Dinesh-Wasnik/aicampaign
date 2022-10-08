<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Voucher;
use Carbon\Carbon;

class ReleaseVoucherCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'release:vouchercode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make available voucher to other customer which are not lock';

    protected $voucher;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Voucher $voucher)
    {
        parent::__construct();
        $this->voucher = $voucher;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {    
        //make free unclaimed vouchers;
        $this->voucher->where('lock_at',  '<=',  Carbon::now()->subMinutes(11))
                    ->where('is_lock', 0)
                    ->update([
                       'lock_at_'   => null, 
                       'assign_to' => null, 
                       'assign_at' => null, 
                       'is_lock'   => 0, 
                    ]);
    }
}
