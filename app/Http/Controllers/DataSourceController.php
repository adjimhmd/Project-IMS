<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class DataSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tables = DB::select('SHOW TABLES');
        $tabelPilihan = '';
        $hasilSementara = '';
        return view('datasource.index', compact('tables', 'hasilSementara', 'tabelPilihan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sementara(Request $request)
    {
        $tables = DB::select('SHOW TABLES');
        $hasilSementara = $request;
        $dataTabelSementara = $request->input('tabel');
            $tabelPilihan = \DB::connection()->getSchemaBuilder()->getColumnListing($dataTabelSementara);
            return view('datasource.index', compact('tables', 'hasilSementara', 'tabelPilihan'));
        foreach($dataTabelSementara as $tabelkuSementara){
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idDatasource = DB::table('tb_datasource')->insertGetId(['nama' => $request->nama]);

        $dataTabel = $request->input('tabel');
        foreach($dataTabel as $tabelku){
            $idDatatabel = DB::table('tb_dtl_tbl_datasource')->insertGetId(['id_datasouce' => $idDatasource, 'nama_tabel' => $tabelku]);

            $dataField = $request->input('field');
            foreach($dataField as $fieldku){
                DB::table('tb_dtl_field_datasource')->insertGetId(['id_dtl_tbl_datasource' => $idDatatabel, 'nama_field' => $fieldku]);
            }
        }        

        $tables = DB::select('SHOW TABLES');
        $tabelPilihan = '';
        $hasilSementara = '';
        return view('datasource.index', compact('tables', 'hasilSementara', 'tabelPilihan'));

        // return Input::get('field');

        // $dataField = implode(',', Input::get('field'));
        // $isi = array('field',$dataField);
        // DB::table('tb_dtl_field_datasource')->insert($isi);

        // DB::table('tb_dtl_field_datasource')->insertGetId(
        // ['field' => $request->field]);

    }
}
