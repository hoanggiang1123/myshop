@php
    use App\Helper\Template;
@endphp
<form id="formpost" action="" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
    <thead>
        <tr role="row">
            <th> 
                <button type="button" class="btn btn-default btn-sm checkbox-toggle" id="cb-toogle"><i class="far fa-square"></i>
                </button>
            </th>
            <th>Id</th>
            <th>Thumb</th>
            <th>Cateogry Infor</th>
            <th>Is Home</th>
            <th>Display</th>
            <th>Ordering</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($items) > 0)
            @foreach($items as $key => $item)
            @php
                $thumb = Template::showItemThumb($controllerName,$item->Thumb,$item->Name);
                $isHome = Template::showIsHome($controllerName,$item->isHome,$item->Id);
                $display = Template::showSelectDisplay($controllerName,$item->Display,$item->Id,'display');
                $class = ($key%2 == 0)? "even" : "odd";
                $id = $item ->Id;
                $name = $item->Name;
                $description = $item->Description;
                $status = Template::showStatusButton($controllerName,$item->Status,$item->Id);
                $created_at = Template::showItemHistory(null,$item->created_at);
                $updated_at = Template::showItemHistory(null,$item->updated_at);
                $btnAction = Template::showButtonAction($controllerName,$id);
                $ordering = Template::showItemOrdering($item->Stt,$item->Id);
                $checkbox = Template::showItemCheckbox($item->Id);
            @endphp
                <tr role="row" class="odd">
                    <td>{!! $checkbox !!}</td>
                    <td class="sorting_1">{{$id}}</td>
                    <td>{!! $thumb !!}</td>
                    <td>
                        <div class="myshop-title">
                            Name: {{$name}}
                        </div>
                        <div class="myshop-des">
                            Description: {{ $description }}
                        </div>
                    </td>
                    <td>{!! $isHome !!}</td>
                    <td> {!! $display !!}</td>
                    <td width="10%">{!! $ordering !!}</td>  
                    <td>{!! $status !!}</td>
                    <td>{!! $created_at !!}</td>
                    <td>{!! $updated_at !!}</td>
                    <td>{!! $btnAction !!}</td>
                </tr>
            @endforeach
        @else
            <tr role="row" class="odd" colspan=9>
                <h3>Dữ Liệu Đang Được Cập Nhật</h3>
            </tr>
        @endif
    </tbody>
</table>
</form>