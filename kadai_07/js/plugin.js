// モーダルウィンドウ用

; (function ($) {
    "use strict";
    $.fn.modals = function(option) {
        var o = $.extend({
            target: "#modal",
            width: 500,
            height: 500
        }, option);
        return this.each(function() {
            if ($(this).get(0) && !$(o.target).get(0)) {
                $("body").append("<div id='modal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='modal' aria-hidden='true'><div class='modal-dialog modal-dialog-centered' role='document'><div class='modal-content'/></div></div>");
                $("body").append("<button type='button' id='modal-close' class='modal-close' data-dismiss='modal'/>");
            }
            $(document).on("click", "[data-dismiss=modal]", function(event) {
                if (!$(o.target).get(0)) {
                    $("#modal-close", window.parent.document).trigger("click");
                } else {
                    $(o.target).modal("hide");
                }
            });
            $(document).on("click", "[data-toggle=modal]", function(event) {
                // eventじゃなくthisで取得できる
                // var a = $(event.target).attr("href");
                var a = $(this).attr("href");
                if (typeof a !== "undefined" && a !== false) {
                    var b = $(o.target).find(".modal-content");
                    b.empty();
                    b.append("<iframe src='"+a+"' class='modal-frame' width='"+o.width+"' height='"+o.height+"'></iframe>");
                    $(o.target).modal();
                }
            });
        });
    }
})(jQuery);