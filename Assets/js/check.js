function IsNumber(con, msg) {

    if (isNaN(document.getElementById(con).value) || document.getElementById(con).value < 0) {
        msg = "Numbers Only are allowed and Number must be Greater then 0"
        alert(msg);
        document.getElementById(con).focus();
        return false;
    }
    else {
        return true;
    }
}

function IsEmpty(con, msg) {
    if (document.getElementById(con).value == "") {
        alert(msg);
        document.getElementById(con).focus();
        return false;
    }
    return true;
}
function printthis() {
    $('tr').css({
        'display': 'table-row',

    });
    window.print();
    $('#next').removeClass('disabled');
    $('#next2').removeClass('disabled');
    MakePages();
}


function MakePages() {
    var maxRows = 10;
    $('#tblIncomeStatementReport').each(function () {
        var cTable = $(this);
        var cRows = cTable.find('tr:gt(0)');
        var cRowCount = cRows.size();
        if (cRowCount < maxRows) {
            return;
        }

        cRows.each(function (i) {
            $(this).find('td:first').text(function (j, val) {
                return val;
            });
        });

        cRows.filter(':gt(' + (maxRows - 1) + ')').hide();


        var cPrev = cTable.siblings('.prev');
        var cNext = cTable.siblings('.next');

        cPrev.addClass('disabled');

        cPrev.click(function () {
            var cFirstVisible = cRows.index(cRows.filter(':visible'));

            if (cPrev.hasClass('disabled')) {
                return false;
            }

            cRows.hide();
            if (cFirstVisible - maxRows - 1 > 0) {
                cRows.filter(':lt(' + cFirstVisible + '):gt(' + (cFirstVisible - maxRows - 1) + ')').show();
            } else {
                cRows.filter(':lt(' + cFirstVisible + ')').show();
            }

            if (cFirstVisible - maxRows <= 0) {
                cPrev.addClass('disabled');
            }

            cNext.removeClass('disabled');

            return false;
        });

        cNext.click(function () {
            var cFirstVisible = cRows.index(cRows.filter(':visible'));

            if (cNext.hasClass('disabled')) {
                return false;
            }

            cRows.hide();
            cRows.filter(':lt(' + (cFirstVisible + 2 * maxRows) + '):gt(' + (cFirstVisible + maxRows - 1) + ')').show();

            if (cFirstVisible + 2 * maxRows >= cRows.size()) {
                cNext.addClass('disabled');
            }

            cPrev.removeClass('disabled');

            return false;
        });

    });
}

