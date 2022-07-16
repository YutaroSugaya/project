function checkSubmit() {
    if (window.confirm('登録してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
};

function loadPageBaseAjax(url, updateElementId, pageCode) {
    base.loadingShow();

    $.ajax({
        type: "GET",
        url: url,
        timeout: 190000,
        cache: false
    })
    .always(function () {
        base.loadingClose();
    })
    .done(function (jsonData) {
        if(isNotEmpty(jsonData.errCode)) {
            callbackLoadAjaxError(jsonData);
            return false;
        }
        var elementId = "#" + updateElementId;
        $(elementId).html(jsonData);
    })
    .fail(function () {
        callbackLoadAjaxFail();
    })
}

function loadJsonAjax(url, reqData, doneCallback, loadFlg, asyncFlg) {
    if (asyncFlg === undefined) {
        asyncFlg = true;
    }
    if (loadFlg === undefined) {
        base.loadingShow();
    }

    $.ajax({
        type: "GET",
        url: url,
        data: reqData,
        timeout: 190000,
        cache: false,
        async: asyncFlg
    })
    .always(function () {
        base.loadingClose();
    })
    .done(function (jsonData) {
        if(isNotEmpty(jsonData.errCode)) {
            callbackLoadAjaxError(jsonData);
            return false;
        }
        if (isNotEmpty(doneCallback)) {
            doneCallback(jsonData);
        }
    })
    .fail(function () {
        callbackLoadAjaxFail();
    });
}
