@extends('layouts.app')

@section('pageHeader', 'Data Source')

@section('isi')
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Basic Form</h4>
                    </div>
                    
                        <form class="form-horizontal" action="{{ route('datasource.sementara') }}" method="POST">
                    	{{ csrf_field() }}
                          <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Nama Datasource</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Datasource">
                            </div>
                          </div>
                          <div class="form-group">
	                          	<label class="col-sm-2 control-label">Pilih Tabel</label>
	                          	<div class="col-sm-10">
		                          		@foreach($tables as $table)
	                          			<div >
							                <input type="checkbox" name="tabel" value="{{ $table->Tables_in_db_pdf }}">{{ $table->Tables_in_db_pdf }}
								        </div>
	                                    @endforeach
	                      	     </div>
	                        </div>
	                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success" style="margin-top:10px;margin-bottom:-14px;">Simpan</button>
                            </div>
                          </div>
                        </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Horizontal Form</h4>
                    </div>
                	@if(!empty($hasilSementara) && !empty($tabelPilihan))
		            <form class="form-horizontal" action="{{ route('datasource') }}" method="POST">
		            	{{ csrf_field() }}
		            	<input type="text" hidden="" name="nama" value="{{ $hasilSementara->nama }}">
		            	<input type="text" hidden="" name="tabel[]" value="{{ $hasilSementara->tabel }}">
                		<div class="panel-body">
                			@foreach($tabelPilihan as $pilihan)
                  			<div>
				                <input type="checkbox" name="field[]" value="{{ $pilihan }}">{{ $pilihan }}
					        </div>
                            @endforeach
	                    </div>
	                    <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-success" style="margin-top:10px;margin-bottom:-14px;">Simpan</button>
                            </div>
                          </div>
	                </form>
                	@else
	                    <div class="panel-body">
	                    </div>
                	@endif
                </div>
            </div>
        </div>
    </div>
@stop