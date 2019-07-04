//$(document).ready(function() {});
function addToBasket(id) {
        var str="path=basket/addToBasket/"+id;
        $.ajax({
            type: "GET",
            url: "engine/addToCart.php",
            data: str,
            success : function(answer){
               //$('#answer').text(answer);
               // console.log(answer);
            }
        })
        
}
