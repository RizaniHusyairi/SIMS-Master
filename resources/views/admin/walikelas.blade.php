{!! Form::model($wali,['url'=>'/admin/walikelas/'.$wali->id,'method' => 'put']) !!}
        <div class="modal-body" >
          <div class="form-floating">
            {!! Form::select('guru_id',$guru,null,['placeholder'=>'Pilih wali kelas','class'=>'form-select','id'=>"floatingSelect","required"]) !!}
          <label for="floatingSelect">Wali kelas</label> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary tutup-form" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
{!! Form::close() !!}