var $sideorder= {
    submitURL : $url.root() + '/controller/changeController',
    updatedtable : function (response) {
        $('.datatable').DataTable().destroy();
        $('.dataTable-tbody').html('');
        var $small = '';
        for(i=0; i<response.length; ++i){
            $small = (response[i].so_small_price != null) ? '$ ' + response[i].so_small_price : '';
            var content = '<tr class="tableRow" data-id="' + response[i].so_id + '">' +
                '<td>' + (i+1) + '</td>' +
                '<td>' + response[i].so_name + '</td>' +
                '<td>' + $small + '</td>' +
                '<td>$ ' + response[i].so_large_price + '</td>' +
                '<td>' +
                '<div class="text-center">' +
                '<button class="btn btn-info editSideOrders" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                '<button class="btn btn-danger dltSideOrders" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
                '</div>' +
                '</td>' +
                '</tr>';
            $('.dataTable-tbody').append(content);
        }
        initDataTable();
    }
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('#addSideOrder').click(function () {
    $('#itemName').val('');
    $('#itemPriceSmall').val('');
    $('#itemPriceLarge').val('');
    $('#type').val('add');

    $('.addItem').modal('show');
});

$('#addbtn').click(function(){
    var $add = {
        name : $('#itemName').val(),
        costSmall : $('#itemPriceSmall').val(),
        costLarge : $('#itemPriceLarge').val(),
        type : $('#type').val()
    };

    if($add.name =='' || $add.costLarge == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $sideorder.submitURL,
            data: {
                sideOrderName: $add.name,
                sideOrderCostSmall: $add.costSmall,
                sideOrderCostLarge: $add.costLarge,
                sideOrderAction: $add.type
            },
            cache: false,
            error: function(){
                $('.addItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $sideorder.updatedtable(response);
                $('.addItem').modal('hide');
                $('.saveItem').modal('show');
            }
        });
    }
});

$(document).on('click', '.editSideOrders', function(){
    $('.addItem').modal('show', {
        backdrop: 'static'
    });

    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        pricesmall : $(this).closest('tr').find('td').eq(2).text().split(' ')[1],
        pricelarge : $(this).closest('tr').find('td').eq(3).text().split(' ')[1],
        id : $(this).closest('tr').data('id')
    };

    $('#itemName').val($edit.name);
    $('#itemPriceSmall').val($edit.pricesmall);
    $('#itemPriceLarge').val($edit.pricelarge);
    $('#type').val($edit.id);
});

$(document).on('click', '.dltSideOrders', function(){
    var $dlt = {
        key : $(this).closest('tr').data('id')
    };

    $('.deleteItem').modal('show', {
        backdrop: 'static'
    });

    $(document).on('click', '.yes', function(){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $sideorder.submitURL,
            data: {
                deleteSideOrderKey : $dlt.key
            },
            error: function(){
                $('.deleteItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $sideorder.updatedtable(response);
                $('.deleteItem').modal('hide');
                $('.dltSuccess').modal('show');
            }
        });
    });
});