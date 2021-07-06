//
// Need to specify $model and $orderableBlock
//
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(orderableBlock).sortable({
        handle: '.handle',
        placeholder: 'sort-highlight',
        zIndex: 999999,
        stop: function (event, ui) {
            $.ajax({
                url: '/update/order',
                data: {
                    model: model,
                    id: ui.item.attr('data-id'),
                    newOrder: $('tr').index(ui.item)
                },
                type: 'post'
            })
        }
    });

});