@foreach($tbllogistik as $datalogistik)
<tr>
<td>{{$datalogistik->no_seri}}</td>
<td>{{$datalogistik->nama_brg}}</td>
<td>{{$datalogistik->id_vendor}}</td>
<td>{{$datalogistik->istatus}}</td>
<td>{{$datalogistik->wilayah}}</td>
<td>{{$datalogistik->kondisi}}</td>
<td>{{$datalogistik->created_at}}</td>
<td>{{$datalogistik->updated_at}}</td>
<td><a onclick="inquiryitemdelete(1076211)" id="open-modal-mfb" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash-alt"></i></a></td><td> 
    <a href="https://backoffice.dretail.id/admin/c_item/popupingredient/1076211/QXlhbStBc2FtK01hbmlzJTJGcGVkYXM%3D" onclick="clickloading()" class="btn-primary btn btn-xs" title="Edit Ingredient Ayam Asam Manis/pedas"><i class="fa fa-edit"></i></a></td>

</tr>
@endforeach