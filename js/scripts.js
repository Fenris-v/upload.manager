$(document).ready(() => {

    let files;
    $('#images').on('change', () => {
        files = $('#images').prop('files');
    });

    $('#upload').on('click', (e) => {
        e.preventDefault();

        if (typeof files === 'undefined') {
            return;
        }

        let data = new FormData();

        $.each(files, (key, item) => {
            data.append(key, item);
        });

        data.append('upload', 1);

        $.ajax({
            url: '/include/upload.php',
            type: 'POST',
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            error: (jqXHR, textStatus) => {
                console.error(textStatus, jqXHR);
            }
        });
    });

    $('#remove').on('click', (e) => {
        e.preventDefault();

        let checkedItems = $('.item input[type=checkbox]:checked');
        let listItems = {};

        checkedItems.each((key, item) => {
            listItems['item' + key] = $(item).parents('.item').children('p').text();
        });

        $.ajax({
            type: 'POST',
            url: '/include/removeImages.php',
            data: $.param(listItems),
            success: () => {
                checkedItems.each((key, item) => {
                    item.closest('.item').remove();
                })
            },
            error: (jqXHR, textStatus) => {
                console.error(textStatus);
            }
        });
    });
});