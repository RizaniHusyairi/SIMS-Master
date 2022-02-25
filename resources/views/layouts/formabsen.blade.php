<th scope="row">{{ $siswa->siswa->NISN }}</th>
                            <td>{{ $siswa->siswa->user->name }}</td>
                            <td>
                                {!! Form::radio($siswa->siswa_id,'Hadir',null,['class'=>'form-check-input','id'=>'H'.$siswa->siswa_id]) !!}
                                <label for="H{{ $siswa->siswa_id }}">H</label>
                            </td>
                            <td>
                                {!! Form::radio($siswa->siswa_id,'Sakit',null,['class'=>'form-check-input','id'=>'S'.$siswa->siswa_id]) !!}
                                <label for="S{{ $siswa->siswa_id }}">S</label>
                            </td>
                            <td>
                                {!! Form::radio($siswa->siswa_id,'Izin',null,['class'=>'form-check-input','id'=>'I'.$siswa->siswa_id]) !!}
                                <label for="I{{ $siswa->siswa_id }}">I</label>
                            </td>
                            <td>
                                {!! Form::radio($siswa->siswa_id,'Terlambat',null,['class'=>'form-check-input','id'=>'T'.$siswa->siswa_id]) !!}
                                <label for="T{{ $siswa->siswa_id }}">T</label>
                            </td>
                            <td>
                                {!! Form::radio($siswa->siswa_id,'Alpa',null,['class'=>'form-check-input','id'=>'A'.$siswa->siswa_id]) !!}
                                <label for="B{{ $siswa->siswa_id }}">A</label>
                            </td>