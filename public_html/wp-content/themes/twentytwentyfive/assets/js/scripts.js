$(function (){
    $('.copy_link').on('click', function (){
        var copyText = $(this).data('link');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(copyText).select();
        document.execCommand("copy");
        $temp.remove();
        toastr.success('Link copied to clipboard');
    })

    $('.no_refined:first-child').addClass('show');
    for (let i = 1;i < 9; i++) {
        let no = document.getElementById("N0" + i);
        // Add hover effect by toggling the class
        if (no) {
            no.addEventListener("mouseenter", () => {
                $('.no_refined ').removeClass('show');
                $('.no_refined_1 ').addClass('show');
                no.classList.add("hovered");
            });
            no.addEventListener("mouseleave", () => {
                no.classList.remove("hovered");
            });
        }
    }

    // if($('.main_home_page').length){
    //     $.ajax({
    //         type: "GET",
    //         url: "/assets/data/refined.html",
    //         dataType: "text",
    //         success: function(data) {
    //             // remove class loading v.v.v
    //             $('.refined_svg').html(data);
    //         }
    //     });
    // }
});