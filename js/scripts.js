$(document).ready(() => {
    let files;
    $('#images').on('change', () => {
        files = $('#images').prop('files');
    });

    $('#uploadForm').on('submit', (e) => {
        e.preventDefault();

        if (typeof files === 'undefined') {
            return;
        }

        let data = new FormData();

        $.each(files, (key, item) => {
            data.append(key, item);
        });

        data.append('upload', '1');

        $.ajax({
            url: '/include/upload.php',
            type: 'POST',
            cache: false,
            data: data,
            processData: false,
            contentType: false,
            success: (json) => {
                $('.log').html(json);
            },
            error: (jqXHR, textStatus) => {
                console.error(textStatus, jqXHR);
            }
        });
    });

    let removeForm = $('#removeFiles');
    removeForm.on('submit', (e) => {
        e.preventDefault();

        let checkedItems = removeForm.find('.item input[type=checkbox]:checked');
        let listItems = {};

        checkedItems.each((key, item) => {
            listItems['item' + key] = $(item).parents('.item').find('.imageName span').text();
        });
        console.log(listItems);

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