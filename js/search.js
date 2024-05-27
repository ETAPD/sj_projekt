$(document).ready(function(){
    $('#search').on('input', function(){
        var searchQuery = $(this).val();
        if (searchQuery === '') {
            $.ajax({
                url: 'action/default_search.php', 
                type: 'POST',
                success: function(data){
                    $('#results').html(data);
                }
            });
        } else {
            $.ajax({
                url: 'action/search.php',
                type: 'POST',
                data: {query: searchQuery},
                success: function(data){
                    $('#results').html(data);
                }
            });
        }
    }).trigger('input');
});

$(document).ready(function(){
    $('.search').on('focus', function(){
        if ($(this).val() === '') {
            $(this).css('width', '420px');
        }
    });

    $('.search').on('blur', function(){
        if ($(this).val() === '') {
            $(this).css('width', '40px');
        }
    });
});

$(document).ready(function(){
    $('.search').on('focus', function(){
        $(this).attr('placeholder', 'Ako hrať....');
        $(this).prev('.placeholder-image').remove(); 
    });

    $('.search').on('blur', function(){
        if ($(this).val() === '') {
            $(this).attr('placeholder', '');
            $(this).before('<img src="media/img/lens.png" class="placeholder-image" />'); 
        }
    });

    $('.search').trigger('blur'); 
});