{!! Form::open(['route' => ['pages.bestsellers.save'], 'name' => 'bestsellers', 'method' => 'post']) !!}
    <table class="table table-responsive" id="bestsellers-table">
        <thead>
        <tr>
            <th>Title</th>
            <th colspan="2">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>
                    <select name="bestseller[{{$key+1}}][product_id]" class="form-control">
                        <option value="-1"></option>
                        @foreach($septics as $septic)
                            <option value="{{$septic->id}}"
                                    @if($septic->id == $product['product_id']) selected @endif>{{$septic->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <button class="btn btn-danger btn-xs" onclick="$(this).parent().parent().remove();"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
            </tr>
        @endforeach
        <tr id="addRow">
            <td>

            </td>
            <td>
                <div class='btn-group'>
                    <button class="btn btn-primary btn-xs" onclick="addRow(); return false;"><i
                                class="glyphicon glyphicon-plus-sign"></i></button>
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
            </td>
        </tr>
        <tr id="cleanRow" style="display: none">
            <td>
                <select class="form-control">
                    <option value="-1"></option>
                    @foreach($septics as $septic)
                        <option value="{{$septic->id}}">{{$septic->name}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <button class="btn btn-danger btn-xs" onclick="$(this).parent().parent().remove();"><i class="glyphicon glyphicon-trash"></i></button>
            </td>
        </tr>
        </tbody>
    </table>
{!! Form::close(); !!}