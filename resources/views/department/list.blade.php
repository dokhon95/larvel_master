@extends('master')
@section('controller','Department')
@section('action','List DepartMent')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>#</th>
            <th>Department</th>
            <th>Phone Number</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1; ?>
        @foreach($department as $item)
        <tr class="odd gradeX" align="center">
            <td><?php echo $stt++ ?></td>
            <td>{!! $item['name']!!}</td>
            <td>0{!! $item['phone']!!}</td>

            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn chắc chắn muốn xóa')"
                                                                      href="{!! URL::route('department.destroy',$item['id']) !!}">Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('department.edit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop()