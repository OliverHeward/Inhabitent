"use strict";
! function(t) {
    t(function() {
        t(".fa-search").on("click", function(e) {
            e.preventDefault();
            var i = t(this).siblings("label");
            i.animate({
                width: "toggle"
            }), i.children('[type="search"]').focus()
        }), t(".search-field").on("blur", function() {
            "" === t(this).val() && t(".header-search label").animate({
                width: "hide";
            })
        })

}(jQuery);