

function addToCart(id) {
    var str="id_good="+id;
    $.ajax({
        type: "POST",
        url: "../controllers/cart.php",
        data: str,
        success : function(){
        }
    })
}

function editGood(){
    //var data = $('#edit_form').serialize();
    var data = new FormData($('#edit_form').get(0))
    $.ajax({
        type: "POST",
        url: "../controllers/edit.php",
        processData: false,
        contentType: false,
        //cache:false,
        //dataType: 'json',
        data: data,
        success : function(response){
            //console.log(response);
            try{
                var result = $.parseJSON(response);
            }
            catch(e){
                alert('Ошибка при работе с изображением.\n Возможно такой файл уже существует или слишком большой.');
            }
            for(var key in result){
                 $('#edit_'+key).val(result[key]);
            }      
        },
        error: function(req, text, error){alert("ошибка :"+text+error+req);}
    })
    return  false;
}

function buy(){
    var name = $('#form_buy_name').val();
    var email = $('#form_buy_email').val();
    var adres = $('#form_buy_adres').val();
    var phone = $('#form_buy_phone').val();
    var regPhone = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
    var res = regPhone.test(phone);
    var deliveryArr=$('.delivery');
    for(item of deliveryArr){
        if(item.checked){
           var delivery  = item.value;
        }
    }
    if (!name||!adres||!phone){
        alert("Заполните обязательные поля.");
    } else {
        if(!res){
            alert("Неправильный формат телефоннго номера.");
        } else {
            var str = "buy=true&name="+name+"&email="+email+"&adres="+adres+"&phone="+phone+"&delivery="+delivery;
            $.ajax({
                type: "POST",
                url: "../controllers/cart.php",
                data: str,
                success : function(answer){
                    var answer = "<p>Заказ успешно оформлен.</p><p>С вами скоро свяжется оператор.</p><a href='index.php'>Вернуться</a>";
                    $('#user_cart').html(answer);
                },
                error: function(text, error){
                    var message = "<p>"+text+"</p>";
                    message = "<p>"+error+"</p>";
                    message+="<p>Ошибка при заказе товара. Свяжитесь с администрацией магазина по телефону .....</p>";
                    $('#user_cart').html(message);
                }
            })
        }
    }
    
    return  false;
}


function deleteGood(id){
    if(confirm("Выточно хотите удалить товар?")){
        var str = "id_good="+id+"&delete=1";
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: str
        })
    }  
}

function changeStatus(val,index){
    var str = "indexToChange="+index+"&status="+val;
    $.ajax({
        type: "POST",
        data: str,
        url: "../controllers/orders.php",
        success: function(answer){
            $('#actual_status_'+index).text(answer);
            $('#actual_status_'+index).val(answer);
        }
    })
}

function count_change(znak,id){
    var str = znak+"="+id;
    $.ajax({
        type: "POST",
        data: str,
        url: "../controllers/changeCountGood.php",
        success: function(response){
            var result = $.parseJSON(response);
            var priceAll=0;
            for(var item of result){
                if (item.id_good==id){
                    $('#count-display-'+id).val(item.good_count);
                    $('#price-display-'+id).text(item.good_price);
                }
                priceAll += item.good_price;
            }
            $('#user-cart-price').text("Общая цена заказа : "+priceAll);
        },
        error: function(error){
            alert("Ошибка при добавлении товара: "+error);
        }
    })
}

function showMore(begin,countShow,headerName) {
    var str = "beginShow="+begin+"&countShow="+countShow;
    $.ajax({
        type: "POST",
        data: str,
        url: "../controllers/showMore.php",
        success: function(response){
            try {
                var result = $.parseJSON(response);
                var render = "<h2 class='headerName'>"+headerName+"</h2>";
                for (let item of result) {
                    render +=  "<div class='item flex_row'>";
                    render += "<h3 class='item-name  flex_row'>";
                    render += "<a href='item.php?id="+item.id+"'>"+item.title+"</a></h3>";
                    render += "<div class='image'>";
                    render += "<a href='item.php?id="+item.id+"'>'><img src='img/uploads/prev/"+item.img+"' alt='"+item.title+"' title='"+item.title+"'></a></div>";
                    render += "<div class='characteristic'>"+item.info+"</div>";  
                    render += "<div class='add-to-basket flex_col'>";
                    render += "<p class='price font_norm'>Цена : "+item.price+" р.</p>";
                    render += "<p><a  href='item.php?id="+item.id+"'><button class='button'> Просмотреть</button></a></p></div>";
                    render += " </div>";      
                }
                var renderButton = " <button class='button' onclick=\"showMore("+(begin+result.length)+","+countShow+", \'"+headerName+"\')\">Показать еще</button>";
            } 
            catch (e) {
                console.log('картинки кончились');
                renderButton = " <button class='button'><a href = 'index.php'>Вернуться</a></button>";
            }
            render += renderButton;   
            $('section').html(render);  
        },
        error: function(error){
            alert("Ошибка : "+error);
        }
    })
}