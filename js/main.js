window.onload = (function(){

    
    $('input[name="calc"]').on('click',function(){
        //var message = 
                post_ahd_get();
        

    });

});


function post_ahd_get(){
        var elem = $('input[name="not"]'), query = elem.val().replace('+', '`');
        
        $.ajax({
        type: 'POST',
        url: 'index.php?C=resp&not=' + query,
        data: 'not=' + query,
        success: function(data){
//        console.log(data);
        var result = JSON.parse(data);
            if(result) {
                elem.val(result);    
            }
            else{
                elem.val('');    
            }
        }
    });
    
    
}

