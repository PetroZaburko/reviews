
$(document).ready(function() {
    var popup_btn = $('.popup-btn');
    popup_btn.magnificPopup({
        type : 'image',
        gallery : {
            enabled : true
        }
    });
});

$(document).ready(function () {
    $('#reviewForm').submit(function () {
        addReview();
        return false;
    });

    function addReview() {
        let data = new FormData();
        let form = $('#reviewForm').serializeArray();
        $.each(form, function () {
            data.append($(this)[0].name, $(this)[0].value);
        });

        $.each($("#photos")[0].files, function(key, input){
            data.append('photos[]', input);
        });

        $.ajax ({
            type: "POST",
            url: "/add",
            dataType: 'json',
            contentType: false,
            processData: false,
            data: data,
            success: function (response) {
                $('#addReviewModalWindow').modal('hide');

                let divPros = $('#pros').val() ?
                    "                    <div class=\"d-flex flex-row\">\n" +
                    "                        <h4 class=\"font-weight-bold text-danger mr-2\">\n" +
                    "                            <i class=\"fas fa-plus\"></i>\n" +
                    "                        </h4>\n" +
                    "                        <div class=\"text-justify\">\n" +
                    "                            <p>\n" + $('#pros').val() +
                    "                            </p>\n" +
                    "                        </div>\n" +
                    "                    </div>\n"
                    : '';

                let divCons = $('#cons').val() ?
                    "                    <div class=\"d-flex flex-row\">\n" +
                    "                        <h4 class=\"font-weight-bold text-primary mr-2\">\n" +
                    "                            <i class=\"fas fa-minus\"></i>\n" +
                    "                        </h4>\n" +
                    "                        <div class=\"text-justify\">\n" +
                    "                            <p>\n" + $('#cons').val() +
                    "                            </p>\n" +
                    "                        </div>\n" +
                    "                    </div>\n"
                    : '';

                let divRecommended = $('#recommended').prop('checked') ?
                    "                <div class=\"recommended d-flex flex-row\">\n" +
                    "                    <h4 class=\"text-success mr-2\">\n" +
                    "                        <i class=\"fas fa-check\"></i>\n" +
                    "                    </h4>\n" +
                    "                    <p>\n" +
                    "                        I would recommend this to a friend\n" +
                    "                    </p>\n" +
                    "                </div>\n"
                    : '';


                let divPhotos = '';
                if (response.photos) {
                    let allPhotos = '';
                    $.each(response.photos, function (key, value) {
                        allPhotos +=
                            "                    <div class=\"item col-md-2\">\n" +
                            "                        <a href=\"/img/reviews/"+ value +"\" class=\"fancylight popup-btn\" data-fancybox-group=\"light\">\n" +
                            "                            <img class=\"img-thumbnail\" src=\"/img/reviews/"+ value +"\" alt=\"\">\n" +
                            "                        </a>\n" +
                            "                    </div>\n" ;
                    });
                    divPhotos =
                        "            <div class=\"review-photo\">\n" +
                        "                <div class=\"portfolio-item row\">\n"+
                        allPhotos +
                        "                </div>\n" +
                        "            </div>\n"
                    ;
                }

                let date = new Date();
                // let now = date.toLocaleString('en-us', { month: 'long' }) + ' ' + date.getDate() + ',' + date.getFullYear();
                let now = date.toLocaleString('en-us', { month: 'long', day: '2-digit', year: 'numeric'});

                let divNewReview = "<div class=\"review pb-4\">\n" +
                    "    <div class=\"row\">\n" +
                    "        <div class=\"col-md-1 p-0\">\n" +
                    "            <div class=\"avatar\">\n" +
                    "                <img src=\"img/no_avatar.png\" alt=\"...\" class=\"img-thumbnail mr-3\">\n" +
                    "            </div>\n" +
                    "        </div>\n" +
                    "        <div class=\"col-md-11\">\n" +
                    "            <div class=\"review-user mb-3\">\n" +
                    "                <div class=\"font-weight-bold \">\n" + $('#nickname').val() +
                    "                </div>\n" +
                    "                <div>\n" +
                    now +
                    "                </div>\n" +
                    "            </div>\n" +
                    "            <div class=\"review-body\">\n" +
                    "                <h5 class=\"font-weight-bold\">\n" + $('#title').val() +
                    "                </h5>\n" +
                    "                <div class=\"text-justify\">\n" +
                    "                    <p>\n" + $('#review').val() +
                    "                    </p>\n" +
                    "                </div>\n" +
                    "                <div id=\"pros+cons\">\n" +
                    divPros +
                    divCons +
                    "                </div>\n" +
                    divRecommended +
                    "            </div>\n" +
                    divPhotos +
                    "        </div>\n" +
                    "    </div>\n" +
                    "</div>\n" +
                    "<hr>\n"
                ;
                $('#all_reviews').append(divNewReview);
            },
            error: function (reject) {
                let errors = $.parseJSON(reject.responseText);
                $('.modal-message-info').html('<div class="alert alert-danger">' + errors + '</div>');
                $('.modal-message-info').slideDown(1000).delay(5000).slideUp(1000);
            }
        });
    }
});