$(function () {

    $('.del-btn').on("click", function(){
        if (!confirm('削除します')) {
            return false;
        }
    });
});
