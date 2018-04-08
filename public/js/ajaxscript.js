
$(document).ready(function(){

    //get base URL *********************
    var url = $('#url').val();


    //display modal form for creating new product *********************
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmProducts').trigger("reset");
        $('#myModal').modal('show');
    });

    //display modal form for product EDIT ***************************
    $(document).on('click','.open_modal',function(){
        var menu_id = $(this).val();
        var links = url + '/' + menu_id;
        // Populate Data in Edit Modal Form
        $.ajax({
            type: "GET",
            url: links,
            success: function (data) {
                console.log(data);
                $('#menu_id').val(data.id);
                $('#controller').val(data.controller);
                $('#menu').val(data.namamenu);
                $('#icon').val(data.icon);
                $('#type').val(data.type);
                $('#menulevel').val(data.menulevel);
                $('#publish').val(data.publish);
                $('#btn-save').val("update");
                $('#myModal').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });



    //create new product / update existing product ***************************
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault();
        var formData = {
            controller: $('#controller').val(),
            menu: $('#menu').val(),
            icon: $('#icon').val(),
            types: $('#type').val(),
            menulevel: $('#menulevel').val(),
            publish: $('#publish').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var menu_id = $('#menu_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "POST"; //for updating existing resource
            links = '/administrator/updatemenu/' + menu_id;
        }

        alert(state);
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                window.location.href = '/administrator/configmenu';
                console.log(data);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    //delete product and remove it from TABLE list ***************************
    $(document).on('click','.delete-product',function(){
        var menu_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + menu_id,
            success: function (data) {
              window.location.href = '/administrator/configmenu';
                console.log(data);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
