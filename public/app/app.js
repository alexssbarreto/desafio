$.ApplicationRootUrl = window.location.origin;
$.ApplicationCurrentUrl = window.location.href;

/**
 * Prepara os dados para submit do form
 * @param form
 * @returns {*|jQuery}
 * @constructor
 */
$.FormData = function(form) {
    return $(form).serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {})
};

$.Loading = function (show) {
    if (show) {
        $('body').append('<div class="loading"><div class="circle-loader loader"></div></div>');
    } else {
        $(".loading").remove();
    }
};

$.Ajax = function (url, paramObj, successFunction, errorFunction, method, contextDefault, loading, timeout, contentType) {
    if (errorFunction == undefined)
        errorFunction = null

    if (method == undefined)
        method = 'POST';

    if (contextDefault == undefined)
        contextDefault = null;

    if (loading == undefined)
        loading = true;

    if (timeout == undefined)
        timeout = 0;

    console.log(method)
    console.log(contentType)

    if (contentType == undefined)
        contentType = "application/x-www-form-urlencoded;charset=UTF-8";

    $.ajax({
        type: method,
        dataType: "json",
        contentType: contentType,
        url: url,
        timeout: timeout,
        context: contextDefault,
        processData: false,
        data: paramObj,
        beforeSend: function(){
            if (loading)
                $.Loading(true);
        },
        success: function (data) {
            successFunction(data);

            if (loading)
                $.Loading(false);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            if (loading)
                $.Loading(false);

            switch (xhr.status) {
                case 302:
                    return $.Alerta('Formato da requisição é inválido.');
                    break;
                case 401:
                case 403:
                    window.location = $.ApplicationRootUrl + '/not-authorized';
                    break;
                case 404:
                    return $.Alerta('Página inválida.');
                    break;
                case 500:
                    return $.Alerta('Contate o Administrador. Houve um erro de sistema.', 'Erro', 'error');
                    break;
            }
        },
        complete: function (data) {
            if (loading)
                $.Loading(false);
        },

        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            console.log(myXhr)
            return myXhr;
        },
    });
};


$.AjaxDownload = function (url, paramObj, errorFunction, method, contextDefault) {
    if (errorFunction == undefined)
        errorFunction = null

    if (method == undefined)
        method = 'POST';

    if (contextDefault == undefined)
        contextDefault = this;

    $.ajax({
        cache: false,
        type: method,
        url: url,
        contentType: "application/x-www-form-urlencoded;charset=UTF-8",
        // headers: {Range: "bytes=0-1152681522"},
        // processData: false,
        context: contextDefault,
        data: paramObj,
        //xhrFields is what did the trick to read the blob to pdf
        xhrFields: {
            responseType: 'blob',
        },
        beforeSend: function(){
            $.Loading(true);
            $.ProcessDownload.status = true;
        },
        success: function (response, status, xhr) {
            $.Loading(false);
            $.ProcessDownload.status = false;

            if (typeof response !== 'object')
                return $.Alerta('Arquivo inválido.');

            var filename = "";
            var disposition = xhr.getResponseHeader('Content-Disposition');

            if (disposition) {
                var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                var matches = filenameRegex.exec(disposition);
                if (matches !== null && matches[1]) filename = matches[1].replace(/['"]/g, '');
            }

            var contentType = xhr.getResponseHeader('Content-type');

            var linkelem = document.createElement('a');
            try {
                var blob = new Blob([response], { type: contentType });
                // Trata quando for Internet Explorer
                if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                    window.navigator.msSaveOrOpenBlob(blob);
                } else {
                    var URL = window.URL || window.webkitURL;
                    var downloadUrl = URL.createObjectURL(blob);

                    if (filename) {
                        // use HTML5 a[download] attribute to specify filename
                        var a = document.createElement("a");

                        // safari doesn't support this yet
                        if (typeof a.download === 'undefined') {
                            window.location = downloadUrl;
                        } else {
                            a.href = downloadUrl;
                            a.download = filename;
                            document.body.appendChild(a);
                            a.target = "_blank";
                            a.click();
                        }
                    } else {
                        window.location = downloadUrl;
                    }
                }

            } catch (ex) {
                $.alerta('Erro ao realizar download.');;
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            $.Loading(false);
            $.ProcessDownload.status = false;

            if (!errorFunction) {
                $.Alerta('Error ao fazer download.', 'Falha', 'error');
                return;
            }

            errorFunction();
        },
        complete: function (data) {
            $.Loading(false);
            $.ProcessDownload.status = false;
        }
    });
};

$.Confirmar = function (msg, functionCancel, functionConfirm) {
    swal(msg, {
        buttons: {
            cancel: "Cancelar",
            confirmar: true,
        },
    }).then(function (value) {
        switch (value) {
            case "confirmar":
                functionConfirm();
                break;

            default:
                functionCancel();
        }
    });
};

// icon: "warning"; "error"; "success"; "info"
$.Alerta = function (msg, title, icon, functionConfirm) {
    if (title == undefined)
        title = 'Alerta';

    if (icon == undefined)
        icon = 'warning';

    if (functionConfirm == undefined)
        functionConfirm = undefined

    const wrapper = document.createElement('div');
    wrapper.innerHTML = msg;

    if (functionConfirm != undefined) {
        swal({
            title: title,
            content: wrapper,
            icon: icon,
            buttons: {
                cancel: "OK"
            },
        }).then(function (value) {
            functionConfirm();
        });
    } else {
        swal({
            title: title,
            content: wrapper,
            icon: icon
        });
    }
};