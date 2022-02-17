<?php

namespace App\Http\Controllers;

use App\Diem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RetestController extends Controller
{
    public function index(){
        return view('retest.index');
    }
    public function datajson(Request $request){
        $where = [];
//        if (isset($request->search['custom']['typesearch'])){
//            if(($request->search['custom']['typesearch'])=="0"){
//                if($request->search['custom']['malop']){
//                    $where[]= ['malop','like', '%' . trim($request->search['custom']['malop']) . '%'];
//                }
//                if($request->search['custom']['mamh']){
//                    $where[]= ['mamon','like', '%' . trim($request->search['custom']['mamh']) . '%'];
//                }
//                if($request->search['custom']['masv']){
//                    $where[]= ['masv','like', '%' . trim($request->search['custom']['masv']) . '%'];
//                }
//            }
//            if (($request->search['custom']['typesearch'])=="1"){
//                if($request->search['custom']['malop']){
//                    $where[]= ['malop',trim($request->search['custom']['malop'])];
//                }
//                if($request->search['custom']['mamh']){
//                    $where[]= ['mamon',trim($request->search['custom']['mamh']) ];
//                }
//                if($request->search['custom']['masv']){
//                    $where[]= ['masv',trim($request->search['custom']['masv'])];
//                }
//            }
//        }
        DB::statement(DB::raw('set @rownum=0'));
        $diem = DB::table('diems')->join('sinhviens', 'diems.sinhvien_id', '=', 'sinhviens.id')
            ->join('monhocs', 'diems.monhoc_id', '=', 'monhocs.id')
            ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'sinhviens.id',
                'masv',
                'hosv',
                'tensv',
                'malop',
                'mamon',
                'diemcc',
                'diemthilai',
                'diemgk',
                'diemck',
                'tenmon',
                
                DB::raw('(40*diemcc+20*diemgk+40*((30*diemck+70*diemthilai)/100))/100 as diemtb'),
                
            ])
            ->where('diemcc', '>', 3)
            ->where('diemcc', '<', 5)
            ->orWhere('diemck', '<', 5)
            
            
            
            ->get();
            // dd($diem);
        $datatables = DataTables::of($diem)
            ->addColumn('hotensv', function ($data) {
                return $data->hosv . " " . $data->tensv;
            })
            ->addColumn('diemtb', function ($data) {
                if ($data->diemtb < 5) {
                    $diemtb[] = "qua mon";
                }
               return $data->diemtb;
            })
            ->addColumn('lydo', function ($data) {
                $dem = 0;
                if ($data->diemcc > 3) {
                    $dem++;
                }
                if ($data->diemcc < 5) {
                    $lydo[] = "Điểm Chuyên cần dưới 5";
                }
                
                if ($data->diemck < 5) {
                    $lydo[] = "Điểm Cuối kỳ dưới 5";
                }
                
                
                
                if ($data->diemcc == 0  || $data->diemgk == 0 || $data->diemck == 0) {
                    $lydo[] = "Có 1 cột điểm bằng 0";
                }
                
                
                return $lydo;
            })
            ->rawColumns(['rownum', 'hotensv','diemtb','lydo']);
        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum  + 1 like ?', ["%{$keyword}%"]);
        }
        return $datatables->make(true);
    }
}

