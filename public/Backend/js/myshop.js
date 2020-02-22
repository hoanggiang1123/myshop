jQuery(document).ready(function($) {
    
    var check = false
    $('#cb-toogle').click(function() {
       if(check == false) {
           $(this).children().removeClass('fa-square').addClass('fa-check-square');
           $('.cball').each(function() {
               $(this).prop("checked", true );
           });
           check = true;
       } else {
            $(this).children().removeClass('fa-check-square').addClass('fa-square');
            $('.cball').each(function() {
                $(this).prop("checked", false );
            });
            check = false;
       }
    });

    $('#bulkaction').change(function() {
        resetNameAttr();
        if($(this).val() != '') {
            $('#submit_bulk').attr('disabled',false);
            var link = $(this).val();
            $('#formpost').attr('action',link);
            

        } else {
            $('#submit_bulk').attr('disabled',true);
        }
    });
    $('#submit_bulk').click(function() {
        var checks = $('input.cball:checked');
        var link = $('#formpost').attr('action');
        var className = getClassOfInput(link);
        if(checks.length) {
            checks.each(function() {
                var input = $(this).parent().parent().parent().find(`.${className}`)[0];
                $(input).attr('name', className+"[]");
            })
        }
        $('#formpost').submit();
    });
    $('#customSwitch1').click(function() {
        console.log($(this).val());
    })
    function getClassOfInput(link) {
        var path = link.split('/').pop();
        var className = '';
        switch(path) {
            case 'change-display-multi':
                className = 'display';
                break;
            case 'change-status-multi':
                className = 'status';
                break;
            case 'change-ordering-multi':
                className = 'ordering';
                break;
            case 'change-ishome-multi':
                className = 'ishome';
                break;
            case 'delete-multi':
                className = 'del';
                break;
        }
        return className;
    }
    function resetNameAttr() {
        $('.commom').each(function() {
            $(this).removeAttr('name');
        })
    }
})