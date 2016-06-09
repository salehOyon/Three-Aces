var $calzone = {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addCalzone').click(function(){
    $('#addItem').modal('show');
});

$('.editCalzone').click(function(){
    $('#addItem').modal('show', {
        backdrop: 'static'
    });

    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        price : $(this).closest('tr').find('td').eq(2).text().split(' ')[2],
        type : $(this).closest('tr').find('td').eq(3).find('span').text()
    };

    $('#itemName').val($edit.name);
    $('#itemPrice').val($edit.price);
    $('#type').val($edit.type);
});

$('.dltCalzone').click(function(){
    var $dlt = {
        confirm : confirm("Are you want to delete the selected item ?"),
        key : $(this).closest('tr').find('td').eq(3).find('span').text()
    };
    if($dlt.confirm){
        $.ajax({
            type: 'POST',
            url: $calzone.submitURL,
            data: {
                deleteKey : $dlt.key
            },
            error: function(){
                alert('An Error Occured');
            },
            success: function(){
                alert('Data has been deleted !!');
                location.reload();
            }
        });
    }else{
        alert('Your data is safe !');
    }
});

$('#addbtn').click(function(){
    var $add = {
        name : $('#itemName').val(),
        cost : $('#itemPrice').val(),
        type : $('#type').val()
    };

    if($add.name == '' || $add.cost == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $calzone.submitURL,
            data: {
                calzoneName: $add.name,
                calzoneCost: $add.cost,
                calzoneAction: $add.type
            },
            cache: false,
            error: function(){
                alert('An Error Occured !!');
            },
            success: function(){
                alert('Successfully Saved !!');
                $('#addClose').click();
                location.reload();
            }
        });
    }
});