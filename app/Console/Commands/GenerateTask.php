<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Task;
use Carbon\Carbon;

class GenerateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kita:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //ubah status delay jika task sudah melewati hari / delay maka akan generate task baru
        $delay = Task::whereIn('status',[4,1,0])->where('status_check',0)->where('delay',0)->where('tanggal','<=',Carbon::yesterday())->get();
        foreach($delay as $datas){
            $data_new = new Task();
            $data_new->tanggal = $tanggal;
            $data_new->id_user = $datas->id_user;
            $data_new->task = $datas->task;
            $data_new->jam_mulai = '08:15';
            $data_new->jam_selesai = '08:15';
            $data_new->project_id = $datas->project_id;
            $data_new->status = '0';
            if ($data_new->save()) {
                //update to delay task
                $update_delay = Task::find($datas->id);
                $update_delay->status = 4;
                $update_delay->delay = 1;
                $update_delay->save();

                $this->info('berhasil');
            }else{
                $this->info('gagal');
            }
        }
        $this->info('berhasil');
    }
}
