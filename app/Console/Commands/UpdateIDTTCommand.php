<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Mail;

class UpdateIDTTCommand extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'app:update-i-d-t-t-command';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

    // Tên của command (sử dụng để lên lịch)
    protected $signature = 'tinthuexe:update-status';

    protected $thongbao = 'thongbao:denngaytra';
       // Mô tả về command
    protected $description = 'Cập nhật trạng thái tin đã hết hạn trong bảng tinthuexe';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Cập nhật trạng thái
        DB::table('tinthuexe')
            ->where('TGTRA', '<', now())
            ->update(['IDTTT' => 5]);

        // In thông báo ra console
        $this->info('Cập nhật trạng thái tin đã hết hạn thành công.');
    }
    public function updateTT(){
        $results= DB::table('orders')
        ->join('taikhoan_sinhvien','taikhoan_sinhvien.IDTK','=','orders.IDTK')
        ->where('orders.ID_TT', 2)
        ->where('orders.TGTRA' ,'<=',now()->addDays(2))
        ->orwhere('orders.TGTRA' ,'<=',now()->addDays(1))
        ->select('taikhoansinhvien.EMAIL','orders.TGTRA')
        ->get();

        foreach ($results as $result) {
            // Thực hiện các thao tác, ví dụ gửi email
            $email = $result->EMAIL;
            $tgTra = $result->TGTRA;
        
            // Gửi email (ví dụ)
            Mail::raw(
                "Thời gian trả xe của bạn là $tgTra. Vui lòng kiểm tra lại đơn hàng và trả xe đúng hạn bạn nhé!",
                function ($message) use ($email) {
                    $message->to($email)->subject('Thông báo trạng thái đơn hàng');
                }
            );
        }
    }


    
}
