(function (window, document) {

    var layout = document.getElementById('layout'),
        menu = document.getElementById('menu'),
        menuLink = document.getElementById('menuLink');

    function toggleClass(element, className) {
        var classes = element.className.split(/\s+/),
            length = classes.length,
            i = 0;

        for (; i < length; i++) {
            if (classes[i] === className) {
                classes.splice(i, 1);
                break;
            }
        }
        // The className is not found
        if (length === classes.length) {
            classes.push(className);
        }

        element.className = classes.join(' ');
    }

    menuLink.onclick = function (e) {
        var active = 'active';

        e.preventDefault();
        toggleClass(layout, active);
        toggleClass(menu, active);
        toggleClass(menuLink, active);
    };

}(this, this.document));

$(document).ready(function () {

    $("a.main-category").click(function () {

        var category_id = $(this).attr("data-category-id");
        var link = $(this).attr('href');

        if ($("ul#category-list-" + category_id).hasClass('hide')) {
            $("li.pure-menu-item ul").addClass('hide');
            $("ul#category-list-" + category_id).removeClass('hide');
        }
        else {
            $("li.pure-menu-item ul").addClass('hide');
            link = 'http://' + location.hostname;
        }

        console.log(link);
        history.pushState('', '', link);


        //console.log(url);

        return false;
    });

    $("a.item-category").click(function () {

        var category_id = $(this).attr("data-category-id");
        var link = $(this).attr('href');
        var ai = $(this).find('i');
        var icon = ai.attr('class');
        var check_class = 'fa fa-check-square-o';
        var uncheck_class = 'fa fa-square-o';
        var upload_class = 'fa fa-spinner fa-spin';
        var ajax_url = $('#ajax_url').html();
        var token = $('#token').html();
        var category_url = $('#category_url').html();

        $("a.item-category i").attr('class', '');
        $("a.item-category i").addClass(uncheck_class);

        if (icon != uncheck_class) {
            ai.attr('class', '');
            ai.addClass(uncheck_class);
            history.pushState('', '', category_url);
            return false;
        }

        history.pushState('', '', link);

        ai.attr('class', '');
        ai.addClass(upload_class);

        $.ajax({
            url: ajax_url,
            dataType: "json",
            type: 'POST',
            data: {
                '_token': token,
                'category_id': category_id
            },
            success: function (data) {
                /*
                 if (!data || typeof data.status == "undefined") {
                 $.notify("Unknown error", {
                 autoHide: true,
                 autoHideDelay: 2000,
                 });
                 return false;
                 }

                 $.notify("Translation has been saved", {
                 autoHide: true,
                 autoHideDelay: 2000,
                 className: "success",
                 });

                 delete self.edit_blocks[id];

                 $("tr[data='" + id + "'] td button").html(data.block.status + ' <span class="caret"></span>');

                 if (data.isSubmit)
                 $("a#tm_submit_text_button").removeClass('disabled');
                 else
                 $("a#tm_submit_text_button").addClass('disabled');
                 */
            },
            complete: function () {
                ai.attr('class', '');
                ai.addClass(check_class);
            }
        });

        return false;
    });

});

//main-category