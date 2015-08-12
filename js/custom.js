$(document).ready(function() {
    $('#summernote').summernote({
        lang: 'es-ES',
        height: 302,
        minHeight: 289,
        maxHeight: 302,
        toolbar: [
            ['style',['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['misc', ['undo','redo']],
        ]
    });
});
