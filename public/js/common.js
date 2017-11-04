// 判断方法是否存在
function isExistsFunction(funcName){
    try {
        if(typeof(eval(funcName))=="function") {
            return true;
        }
    }catch(e) {
        return false;
    }
}

// confirm
function layerComfirm(tip, url, token){
    layer.msg(tip, {
        time: 0 //不自动关闭
        ,icon: 3 //不自动关闭
        ,btn: ['确定', '取消']
        ,yes: function(index){
            executeGet(url, token);
        }
    });
}

//删除
function executeGet(url, token){
    $.get(url,{'_token':token},function(res){
        if(res.status){
            layerAlertSuccess(res.msg);
            refresh();
        }else{
            layerAlertFail(res.msg);
        }
    },'json');
}

// alert success
function layerAlertSuccess(msg) {
    layer.msg(msg, {icon: 1});
}

// alert fail
function layerAlertFail(msg) {
    layer.msg(msg, {icon: 2});
}

// refresh 刷新当前页面
function refresh(){
    setTimeout(function(){
        location.reload()
    },1000);
}

// 页面跳转
function go(url){
    setTimeout(function(){
        window.location.href = url;
    },1000);
}

// open
function layerOpen(title,url) {
    var isRefresh = arguments[2] ? arguments[2] : true;
    layer.open({
        type: 2,
        title: title,
        area: ['800px', '500px'],
        content: url,
        btn:['保存','关闭'],
        yes:function(index, layero){
            // var body = layer.getChildFrame('#dataForm', index);
            var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：iframeWin.method();
            if(isExistsFunction(iframeWin.doSubmit)){
                if(isRefresh){
                    iframeWin.doSubmit(refresh);
                }else{
                    iframeWin.doSubmit();
                }
            }else{
                layer.close(index);
            }
        },
        cancel:function(index){
            layer.close(index);
        }
    });
}

function doSubmitPost(obj) {
    var obj = $(obj);
    var objDataForm = obj.parents("#dataForm");
    var url = objDataForm.attr('action');
    alert(url)
    console.log(objDataForm.serialize())

    $.post(url, objDataForm.serialize(), function(res){
        console.log(res);
        if(res.status){
            layerAlertSuccess(res.msg)
        }else{
            layerAlertFail(res.msg)
        }
    },'json');
}

function doSearch(id){
    var formObj = $("#"+id);
    formObj.submit();
}