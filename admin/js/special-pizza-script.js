var $sppizza = {
    submitURL : $url.root() + '/controller/changeController',
    updatedTable : function (response) {
        $('.datatable').DataTable().destroy();
        $('.dataTable-tbody').html('');
        var $small = '';
        for(i=0; i<response.length; ++i){
            $small = (response[i].sp_pizza_small_price != null) ? '$ ' + response[i].sp_pizza_small_price : '';
            var content = '<tr class="tableRow" data-id="' + response[i].sp_pizza_id + '">' +
                '<td>' + (i+1) + '</td>' +
                '<td>' + response[i].sp_pizza_name + '</td>' +
                '<td>' + $small + '</td>' +
                '<td>$ ' + response[i].sp_pizza_large_price + '</td>' +
                '<td>' +
                '<div class="text-center">' +
                '<button class="btn btn-info editSpPizza" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                '<button class="btn btn-danger dltSpPizza" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
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

$('button#addSpPizza').click(function () {
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

    if($add.name =='' || $add.costSmall == '' || $add.costLarge == ''){
        alert('All fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $sppizza.submitURL,
            data: {
                spPizzaName: $add.name,
                spPizzaCostSmall: $add.costSmall,
                spPizzaCostLarge: $add.costLarge,
                spPizzaAction: $add.type
            },
            cache: false,
            error: function(){
                $('.addItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $sppizza.updatedTable(response);
                $('.addItem').modal('hide');
                $('.saveItem').modal('show');
            }
        });
    }
});

$(document).on('click', '.editSpPizza', function(){
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

$(document).on('click', '.dltSpPizza', function(){
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
            url: $sppizza.submitURL,
            data: {
                deleteSpPizzaKey : $dlt.key
            },
            error: function(){
                $('.deleteItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $sppizza.updatedTable(response);
                $('.deleteItem').modal('hide');
                $('.dltSuccess').modal('show');
            }
        });
    });
});