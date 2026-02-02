$(document).ready(function() {
    $(".scheduledBtn").on('click',function(){
        var html  = '<div class="row pl-3">'+
                        '<div class="col-md-12 py-3  mt-1 border border-secondary">'+
                        '<a href="'+baseUrl+'assets/assetItems/schedule1.pdf" target="_blank" class="btn w-100"><i class="fas fa-calendar-alt"></i> CSEET</a>'+
                        '</div>'+
                        '<div class="col-md-12 py-3 border my-1 border-secondary">'+
                        '<a href="' + baseUrl +'assets/assetItems/schedule2.pdf" target="_blank" class="btn w-100"><i class="fas fa-calendar-alt"></i> CS Executive</a>'+
                        '</div>'+
                        '<div class="col-md-12 py-3 border mb-1 border-secondary">'+
                        '<a href="'+baseUrl+'assets/assetItems/schedule3.pdf" target="_blank" class="btn w-100"><i class="fas fa-calendar-alt"></i> CS Professional</a>'+
                        '</div>'+
                    '</div>';
        bootbox.alert({
            title: 'Schedule List',
            message:html,
            size:'medium',
        });
    })
});