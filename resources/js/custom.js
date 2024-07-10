$(function () {
    $(".table-responsive").on("show.bs.dropdown", function () {
        $(".table-responsive").css("overflow", "inherit");
    });

    $(".table-responsive").on("hide.bs.dropdown", function () {
        $(".table-responsive").css("overflow", "auto");
    });

    const deleteButtons = document.querySelectorAll(".btn-delete");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            const id = event.target.getAttribute("data-id");
            swal({
                title: "Você está certo?",
                text: "Uma vez deletado, você não poderá recuperar esse item novamente!",
                icon: "warning",
                buttons: true,
                buttons: ["Cancelar", "Excluir"],
                dangerMode: true,
            }).then((isConfirm) => {
                if (isConfirm) {
                    document.getElementById(`form-delete-${id}`).submit();
                }
            });
        });
    });

    $(".select2").select2({
        language: "pt-BR",
        placeholder: "Selecione...",
        width: "100%",
        theme: "bootstrap-5",
    });

    $(".city").select2({
        minimumInputLength: 3,
        language: "pt-BR",
        placeholder: "Selecione..",
        width: "100%",
        theme: "bootstrap-5",
        ajax: {
            cache: true,
            url: "/api/v1/cities",
            dataType: "json",
            data: function (params) {
                var query = {
                    search: params.term,
                };
                return query;
            },
            processResults: function (data) {
                var results = [];
                var data = data.data;

                $.each(data, function (i, v) {
                    var o = {};
                    o.id = v.id;
                    o.text = v.title + " - " + v.letter;
                    o.value = v.id;
                    results.push(o);
                });
                return {
                    results: results,
                };
            },
        },
    });

    $("input[required], select[required], textarea[required]")
        .siblings("label")
        .addClass("required");

    var url = window.location;

    var element = $(".menu-item a").filter(function () {
        return this.href == url || url.href.indexOf(this.href) == 0;
    });

    $(element).closest("li").addClass("active");

    $(element.parents()).each(function () {
        if (this.className.indexOf("menu-item") != -1) {
            $(this).addClass("open");
        }
    });
});
