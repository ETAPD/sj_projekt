$(document).ready(function(){
    $('.edit-link').click(function(){
        var row = $(this).data('row');
        
        $('#editPostModal input[name="post_title"]').val(row.title);
        $('#editPostModal textarea[name="content"]').val(row.content);
        $('#editPostModal select[name="category"]').val(row.category_id);
        $('#editPostModal input[name="edit_id"]').val(row.post_id);
        
        // Initialize CKEditor after setting form values
        CKEDITOR.replace('content', {
            width: '100%',
            height: 'auto'
        });

        $('#editPostModal').modal('show');
    });
});