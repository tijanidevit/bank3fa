<?php

namespace App\Console\Commands;

use App\Models\Bank;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateBanksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:store-banks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store banks from Paystack';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Fetching banks from Paystack');

        $banks = Http::withHeaders([
            "Authorization: Bearer ". config('services.paystack.test_key'),
            "Cache-Control: no-cache",
        ])->get("https://api.paystack.co/bank?country=nigeria")['data'];


        $this->info('Storing banks into DB');

        foreach ($banks as $bank) {
            Bank::updateOrCreate(
                ['name' => $bank['name']],
                [
                    'name' => $bank['name'],
                    'code' => $bank['code'],
                ]
            );
        }


        $this->info('Done storing banks into DB');
    }
}
