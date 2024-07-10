(function () {
    "use strict"; // Start of use strict

    instantiatingInputMask();
})(); // End of use strict

function instantiatingInputMask() {
    try {
        $("[data-mask]").each(function (index) {
            let inputmask = $(this);
            let options = {
                clearIncomplete: false,
                placeholder: "_",
            };
            let op = {};
            switch (inputmask.data("mask")) {
                case "integer":
                    options.allowMinus = false;
                    inputmask.inputmask("integer", options);
                    break;
                case "numeric":
                    options.allowMinus = false;
                    inputmask.inputmask("numeric", options);
                    break;
                case "decimal":
                    op = {
                        radixPoint: ",",
                        groupSeparator: ".",
                        allowMinus: false,
                        prefix: "",
                        digits: 2,
                        digitsOptional: false,
                        rightAlign: true,
                        unmaskAsNumber: true,
                    };
                    inputmask.inputmask("decimal", op);
                    break;
                case "phone":
                    options.greedy = false;
                    options.removeMaskOnSubmit = true;
                    Inputmask("(99) 9999[9]-9999", {
                        onBeforeMask: function (value, opts) {
                            if (null === value) {
                                value = "*";
                            }
                            return value;
                        },
                    }).mask(
                        '[data-mask="phone"]'
                    );
                    break;
                case "money":
                    $(inputmask).maskMoney({
                        thousands: ".",
                        decimal: ",",
                        allowZero: true,
                        precision: 2,
                    });
                    $(inputmask).attr("maxlength", "14");
                    $(inputmask).addClass("text-right");
                    break;
                case "real":
                    op = {
                        radixPoint: ",",
                        groupSeparator: ".",
                        allowMinus: false,
                        prefix: "",
                        digits: 2,
                        digitsOptional: false,
                        rightAlign: true,
                        unmaskAsNumber: true,
                    };
                    inputmask.inputmask("currency", op);
                    break;
                case "cpf":
                    Inputmask("999.999.999-99", {
                        onBeforeMask: function (value, opts) {
                            if (null === value) {
                                value = "*";
                            }
                            return value;
                        },
                    }).mask(
                        '[data-mask="cpf"]'
                    );
                    break;
                case "cnpj":
                    Inputmask({ mask: "99.999.999/9999-99", options }).mask(
                        '[data-mask="cnpj"]'
                    );
                    break;
                case "cpfcnpj":
                    options.keepStatic = true;
                    options.mask = ["999.999.999-99", "99.999.999/9999-99"];
                    inputmask.inputmask(options);
                    break;
                case "cep":
                    Inputmask({ mask: "99999-999", options }).mask(
                        '[data-mask="cep"]'
                    );
                    break;
                default:
                    console.log(
                        "Tipo de máscara '" +
                            inputmask.data("mask") +
                            "' não implementado!"
                    );
            }
        });
    } catch (e) {
        console.log(e.message);
    }
}
